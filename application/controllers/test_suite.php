<?php

//require_once 'comm/html.php';

class Test_suite extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->helper('Cipher_helper');
        $this->load->config('security');
    }

    public function index() {
        $this->test_signature();
        $this->output->set_output($this->unit->report());
    }

    private function test_signature() {
        $map = array('name' => 'sasa', 'age' => '32');
        $result = signature($map);

        $expected_result = sha1('namesasaage32security_key705582a3db9bd2ee');
        $this->unit->run($result, $expected_result, 'signature');
    }

    public function get_req_url($query_map) {
        $server_url = $this->config->item('server_url');
        $this->load->library('http');
        $query_str = '';
        foreach ($query_map as $key => $value) {
            $query_str .= $key . '=' . $value . '&';
        }
        $query_str .= 'sig=' . signature($query_map);
        $server_url .= '?' . $query_str;
        return $this->http->get($server_url);
    }

    public function test_get_categary_list() {
        $query_map = array('appkey' => $this->config->item('app_key'),
            'machineType' => 'LT26i',
            'method' => 'app.getCategoryList',
            'returnNum' => '10',
            'startIndex' => '0',
            'type' => '1');
        $response = $this->get_req_url($query_map);
        $this->output->set_output($response);
    }

    public function test_get_categary_data_list($categoryId) {
        $query_map = array('appkey' => $this->config->item('app_key'),
            'categoryId' => $categoryId,
            'machineType' => 'LT26i',
            'method' => 'app.getCategoryDetailList',
            'returnNum' => '3',
            'startIndex' => '0');
        $response = $this->get_req_url($query_map);
        return $response;
//        $this->output->set_output($response);
    }

    public function test_json_array() {
        $recommendation_list = array();
        $json = $this->test_get_categary_data_list(1);
        $obj = json_decode($json);

        $json = $this->test_get_categary_data_list(2);
        $obj1 = json_decode($json);

        $json = $this->test_get_categary_data_list(3);
        $obj2 = json_decode($json);
//        $new_arr = array();
//        $arr = $obj->{'AppInfoList'};
//        foreach ($arr as $item) {
//            array_push($new_arr, $item);
//        }
//        $arr1 = $obj1->{'AppInfoList'};
//        foreach ($arr1 as $item1) {
//            array_push($new_arr, $item1);
//        }
//        $new_arr = array_merge($recommendation_list, $obj1->{'AppInfoList'});
        $new_arr = array_merge($recommendation_list, $obj->{'AppInfoList'}, $obj1->{'AppInfoList'}, $obj2->{'AppInfoList'});
//        $this->output->set_output(json_encode(array_combine($obj->{'AppInfoList'}, $obj1->{'AppInfoList'})));
        $this->output->set_output(json_encode($new_arr));
    }

}
