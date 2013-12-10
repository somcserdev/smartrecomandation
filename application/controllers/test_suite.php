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
        $map = array('name' => 'jiaoyan', 'age' => '32');
        $result = signature($map);

        $expected_result = sha1('namejiaoyanage32security_key705582a3db9bd2ee');
        $this->unit->run($result, $expected_result, 'signature');
    }

}
