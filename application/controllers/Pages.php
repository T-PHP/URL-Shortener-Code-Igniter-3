<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->lang->load("installation",$this->config->item('language'));
        $this->lang->load("theme",$this->config->item('language'));
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->library('session');
    }

    public function view($page = 'installation')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            show_404();
        }

        // Meta SEO
        $seo["title"] = $this->lang->line("title");

        // Theme Language
        $theme["back_top"] = $this->lang->line("back_top");
        $theme["created_with"] = $this->lang->line("created_with");
        $theme["by"] = $this->lang->line("by");

        // Language
        $data["installation_msg"] = $this->lang->line("installation");
        $data["what_is_it_msg"] = $this->lang->line("what_is_it");
        $data["description_msg"] = $this->lang->line("description");
        $data["download_url_shortener_msg"] = $this->lang->line("download_url_shortener");
        $data["download_msg"] = $this->lang->line("download");
        $data["step_1_msg"] = $this->lang->line("step_1");
        $data["step_2_msg"] = $this->lang->line("step_2");
        $data["step_3_msg"] = $this->lang->line("step_3");
        $data["step_4_msg"] = $this->lang->line("step_4");
        $data["step_4_description_msg"] = $this->lang->line("step_4_description");

        $this->load->view('header', $seo);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('footer', $theme);
    }
}
