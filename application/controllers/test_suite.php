<?php

require_once 'comm/html.php';

class Test_suite extends Html_Controller {

    protected function _initialize() {
        parent::_initialize();
        $this->load->library('unit_test');
        $this->load->helper('Cipher_helper');
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

    public function test_get_req_url() {
        $server_url = '';
        $query_map = array('name' => 'sasa', 'age' => '32', 'comment' => '你好');

        $this->load->library('http');
        $query_str = '';
        foreach ($query_map as $key => $value) {
            if ($key == "comment" || $key == "keyword" || $key == "Message") {
                $value = urlencode($value);
            }
            $query_str .= $key . '=' . $value . '&';
        }
        $query_str .= 'sig=' . signature($query_map);
        $response = $this->http->get($server_url . '?' . $query_str);
        $this->output->set_output($response);
    }

}
