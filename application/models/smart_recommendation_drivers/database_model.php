<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database_model extends CI_Model {

    private $playnow_db;

    public function __construct() {
        parent::__construct();
        $this->playnow_db = $this->load->database('playnow', TRUE);
    }

    public function get_apps($cates) {
        if (empty($cates)) {
            $cates = array(1);
        }
        $sql = "select * from pn_appinfo appinfo left join pn_appcategory appcategory on appinfo.Id=appcategory.AppId where appcategory.CategoryId in (" . implode(',', $cates) . ') order by DownloadTime desc limit 10';
        $query = $this->playnow_db->query($sql);
        if ($query->num_rows > 0) {
            return $query->result();
        }
        return new stdClass();
    }

}
