<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UrlExpander extends CI_Model {

    private $table = 'url_ci_expander';

    function __construct() {
        parent::__construct();
    }

    public function getLastUrls($nbUrls)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->limit($nbUrls);
        $this->db->order_by('id_url','desc');
        $query = $this->db->get();

        return $query->result();
    }

    function insertUrl($shortUrl, $longUrl) {

        $query = "INSERT INTO $this->table (`short_url`, `long_url`) VALUES (?,?) ";
        $result = $this->db->query($query, array($shortUrl, $longUrl));

    }

}
