<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expander extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load("url",$this->config->item('language'));
        $this->lang->load("theme",$this->config->item('language'));
        $this->load->database();
        $this->load->model('UrlExpander');
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert-danger">', '</div>');
        $this->load->library('session');
    }

    public function expand()
    {
        // Meta SEO
        $seo["title"] = $this->lang->line("title_expand_page");

        // Theme Language
        $theme["back_top"] = $this->lang->line("back_top");
        $theme["created_with"] = $this->lang->line("created_with");
        $theme["by"] = $this->lang->line("by");

        // Language
        $data["url_expander_msg"] = $this->lang->line("url_expander");
        $data["placeholder_msg"] = $this->lang->line("past_your_link_to_expand");
        $data["last_urls_msg"] = $this->lang->line("last_urls_expanded");
        $data["expand_msg"] = $this->lang->line("expand");
        $data["long_url_msg"] = $this->lang->line("long_url");
        $data["short_url_msg"] = $this->lang->line("short_url");
        $data["copy_msg"] = $this->lang->line("copy");
        $data["url_copied_msg"] = $this->lang->line("url_copied");
        $data["url_not_redirected_msg"] = $this->lang->line("url_not_redirected");

        // Get last 10 urls expanded
        $data['lastUrls'] = $this->UrlExpander->getLastUrls($this->config->item('nb_last_urls'));

        $this->form_validation->set_rules('urlAddress', 'text ', 'required|valid_url');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('header', $seo);
            $this->load->view('urls/expander', $data);
            $this->load->view('footer', $theme);
        }
        else
        {

            $postUrl = htmlspecialchars($this->input->post('urlAddress'));
            $verifyUrl = filter_var($postUrl, FILTER_VALIDATE_URL);
            $verifyUrl = $this->form_validation->valid_url($verifyUrl);

            if($verifyUrl != FALSE) {
                // Define variables
                $data['urlAddress'] = $postUrl;
                $data['getHeaders'] = get_headers($data['urlAddress'], 1);
                //Get Response Code. Delete first chars with substr
                $data['getCodeHeaders'] = substr($data['getHeaders'][0], 9);
                //Get Url Host (website.com)
                $urlParse = parse_url($data['urlAddress']);
                $urlHost = $urlParse['host'];
                $data['location'] = '';

                if(isset($data['getHeaders']['Location']) AND !empty($data['getHeaders']['Location'])):
                    // Check if array (multiple redirects) & Insert Database
                    if(is_array($data['getHeaders']['Location'])):
                        $data['location'] = current($data['getHeaders']['Location']);
                        // Insert URL in Database
                        $this->UrlExpander->insertUrl($data['urlAddress'], $data['location']);
                    else:
                        $data['location'] = $data['getHeaders']['Location'];
                        // Insert URL in Database
                        $this->UrlExpander->insertUrl($data['urlAddress'], $data['location']);
                    endif;
                endif;

                $this->load->view('header', $seo);
                $this->load->view('urls/expander', $data);
                $this->load->view('footer', $theme);
            }
            else {
                redirect(base_url());
            }

        }

    }


}
