<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function valid_url($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        }
        else {
            return false;
        }
    }

}
