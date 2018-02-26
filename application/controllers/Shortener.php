<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shortener extends CI_Controller {

    /**
     * Shortener constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->lang->load("url",$this->config->item('language'));
        $this->lang->load("theme",$this->config->item('language'));
        $this->load->database();
        $this->load->model('UrlShortener');
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert-danger">', '</div>');
        $this->load->library('session');
    }

    /**
     * Index Function
     */
    public function index()
	{
        // Meta SEO
        $seo["title"] = $this->lang->line("title_shortener_page");

        // Theme Language
        $theme["back_top"] = $this->lang->line("back_top");
        $theme["created_with"] = $this->lang->line("created_with");
        $theme["by"] = $this->lang->line("by");

        // Url Language
        $data["url_shortener_msg"] = $this->lang->line("url_shortener");
        $data["placeholder_msg"] = $this->lang->line("past_your_link_to_shorten");
        $data["last_urls_msg"] = $this->lang->line("last_urls_shorten");
        $data["shorten_msg"] = $this->lang->line("shorten");
        $data["long_url_msg"] = $this->lang->line("long_url");
        $data["short_url_msg"] = $this->lang->line("short_url");
        $data["copy_msg"] = $this->lang->line("copy");
        $data["url_copied_msg"] = $this->lang->line("url_copied");

        // Get last 10 urls generated
        $data['lastUrls'] = $this->UrlShortener->getLastUrls($this->config->item('nb_last_urls'));

        $this->load->view('header', $seo);
		$this->load->view('urls/generate', $data);
        $this->load->view('footer', $theme);
	}

    /**
     * Generate Shortener Url Function
     */
    public function generate()
    {
        // Meta SEO
        $seo["title"] = $this->lang->line("title_shortener_page");

        // Theme Language
        $theme["website_name"] = $this->config->item('website_name');
        $theme["back_top"] = $this->lang->line("back_top");
        $theme["created_with"] = $this->lang->line("created_with");
        $theme["by"] = $this->lang->line("by");

        // Language
        $data["url_shortener_msg"] = $this->lang->line("url_shortener");
        $data["placeholder_msg"] = $this->lang->line("past_your_link_to_shorten");
        $data["last_urls_msg"] = $this->lang->line("last_urls_shorten");
        $data["shorten_msg"] = $this->lang->line("shorten");
        $data["long_url_msg"] = $this->lang->line("long_url");
        $data["short_url_msg"] = $this->lang->line("short_url");
        $data["copy_msg"] = $this->lang->line("copy");
        $data["url_copied_msg"] = $this->lang->line("url_copied");

        // Get last 10 urls generated
        $data['lastUrls'] = $this->UrlShortener->getLastUrls($this->config->item('nb_last_urls'));

        $this->form_validation->set_rules('urlAddress', 'text ', 'required|valid_url');
        //echo '<pre>'; var_dump($ff); echo '</pre>'; exit;
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('header', $seo);
            $this->load->view('urls/generate', $data);
            $this->load->view('footer', $theme);
        }
        else
        {

            // Generate Random Short Code
            $data['shortCode'] = strtolower(random_string($this->config->item('type_shorten_code'), $this->config->item('nb_chars_shorten')));
            $postUrl = htmlspecialchars($this->input->post('urlAddress'));
            $verifyUrl = filter_var($postUrl, FILTER_VALIDATE_URL);
            $verifyUrl = $this->form_validation->valid_url($verifyUrl);

            if($verifyUrl != FALSE) {
                // Define variables
                $data['urlAddress'] = $this->input->post('urlAddress');

                $verifyShortCode = $this->UrlShortener->getShortCode($data['urlAddress']);

                // Check if URL exist
                if (!empty($verifyShortCode)) {
                    // Get Short Code from Url
                    $data['shortCode'] = $verifyShortCode['0']->short_code;
                }
                else {
                    // Insert URL in Database
                    $this->UrlShortener->insertUrl($data['shortCode'], $data['urlAddress']);
                }

                $this->load->view('header', $seo);
                $this->load->view('urls/generate', $data);
                $this->load->view('footer', $theme);
            }
            else {
                redirect(base_url());
            }

        }
    }

    /**
     * Redirect Url Function
     */
    public function redirect()
    {
        echo '<pre>'; var_dump(get_headers('https://tiurl.xyz/pah0')); echo '</pre>';  exit;
        if (!$this->uri->segment(1)) {
            redirect(base_url());
        }
        else {
            // Get second segment of url
            $shortCode = $this->uri->segment(1);
            $query = $this->UrlShortener->getUrl($shortCode);

            // Check if Url is not empty
            if (!empty($query['0']->url)) {
                $urlAddress = $query['0']->url;
            }
            // Redirect Short to Long
            redirect($urlAddress, 'auto', 301);
        }
    }

}
