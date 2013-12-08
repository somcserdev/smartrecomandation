<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of recommendation_model
 *
 * @author jiaoyan
 */
class Recommendation_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_apps($imei, $driver_name = 'database') {
        $user_preference = $this->_get_user_preference($imei);
        $cates = $this->_analysis_user_preference($user_preference);
        $class_name = ucfirst($driver_name) . '_model';
        $this->load->model('smart_recommendation_drivers/' . $class_name, $class_name);
        $apps = $this->$class_name->get_apps($cates);
        if (empty($apps)) {
            return array();
        }
        return $apps;
    }

    private function _analysis_user_preference($user_preference) {
        $categories = array();
        if($user_preference->gender == 'male' ){
            if($user_preference->age<=10){
                $categories[] = 4;
                $categories[] = 15;
            }elseif($user_preference->age>10 &&$user_preference->age<=30 ){
                $categories[] = 4;
                $categories[] = 11;
                $categories[] = 13;
                $categories[] = 17;
                $categories[] = 21;
            }  else {
                $categories[] = 4;
                $categories[] = 3;
                $categories[] = 5;
                $categories[] = 20;
                $categories[] = 12;
            }
        }else{
            if($user_preference->age<=10){
                $categories[] = 2;
                $categories[] = 4;
                $categories[] = 15;
            }elseif($user_preference->age>10 &&$user_preference->age<=30 ){
                $categories[] = 2;
                $categories[] = 4;
                $categories[] = 8;
            }  else {
                $categories[] = 14;
                $categories[] = 23;
            }
        }
//        if ($user_preference->gender == 'male') {
//           $categories[] = 4;
//        } else {
//            $categories[] = 4;
//            $categories[] = 5;
//            $categories[] = 8;
//            $categories[] = 22;
//        }
//        if ($user_preference->age <= 10) {
//            $categories[] = 14;
//            $categories[] = 18;
//        } elseif ($user_preference->age > 10 and $user_preference->age <= 30) {
//            $categories[] = 19;
//            $categories[] = 17;
//            $categories[] = 22;
//        } else {
//            $categories[] = 22;
//        }
        if ($user_preference->hobby) {
            $hobies = json_decode($user_preference->hobby);
        }
        return $categories;
    }

    private function _get_user_preference($imei) {
        $this->db->select('*');
        $this->db->from('user_preference');
        $this->db->where("imei", $imei);
        $this->db->order_by("id", 'desc');
        $this->db->limit(1);
        $query =  $this->db->get();
        if($query->num_rows > 0){
            return $result = $query->first_row() ;
        }  else {
            return new stdClass();
        }
    }

    private function mock_get_apps() {
        $app1 = array('Id' => 102,
            'Name' => '经典方块1',
            'PackageName' => 'jdfk.apk',
            'Size' => 1024,
            'Grade' => 4.5,
            'SmallIcon' => ' http://xxx/1.jpg',
            'IsFree' => True,
            'Price' => 0,
            'VersionCode' => 2,
            'VersionName' => '1.0',
            'Publisher' => '第九城市',
            'Description' => '这是经典方块',
            'Type' => 'game');
        $app2 = array('Id' => 103,
            'Name' => '经典方块2',
            'PackageName' => 'jdfk2222.apk',
            'Size' => 1024,
            'Grade' => 3.5,
            'SmallIcon' => ' http://xxx/2222.jpg',
            'IsFree' => True,
            'Price' => 0,
            'VersionCode' => 2,
            'VersionName' => '1.0',
            'Publisher' => '第九城市11111',
            'Description' => '这是经典方块111111',
            'Type' => 'app');


        $array = array('ResultCode' => 1, 'TotalCount' => 2,
            'AppInfoList' => array($app1, $app2));
        return $array;
    }

}
