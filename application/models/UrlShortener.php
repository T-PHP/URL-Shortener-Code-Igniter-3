<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UrlShortener extends CI_Model {

    private $table = 'url_ci_shortener';

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
        /*$query = $this->db->get($this->table, $nbUrls);
        $query    ->order_by('id_url', 'DESC');*/
        return $query->result();
    }

    public function getUrl($short_code)
    {
        $query = $this->db->get_where($this->table, array('short_code' => $short_code));
        return $query->result();
    }

    public function getShortCode($url)
    {
        $query = $this->db->get_where($this->table, array('url' => $url));
        return $query->result();
    }

    function insertUrl($shortCode, $url) {

        $query = "INSERT INTO $this->table (`short_code`, `url`) VALUES (?,?) ";
        $result = $this->db->query($query, array($shortCode, $url));

    }

    /*
    function fetch_url($short_code) {
        $query = "SELECT * FROM `urls` WHERE `short_code` = ? ";
        $result = $this->db->query($query, array($short_code));
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    */
}
