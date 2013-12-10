<?php

require 'comm/ajax.php';

class Test extends Ajax_controller {

    protected function _initialize() {
        parent::_initialize();
        $this->load->helper('Cipher_helper');
    }

    public function index() {
        $map = array('name' => 'jiaoyan', 'age' => '32');
        $this->output2Json(signature($map));
    }

}
