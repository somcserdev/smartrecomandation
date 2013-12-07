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
        $this->load->database();
    }

    public function get_apps($imei) {
        return $this->mock_get_apps();
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
