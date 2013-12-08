<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Base_controller extends MY_Controller{
     public function __construct() {
        parent::__construct();
    }
    
    protected function _initialize() {
        parent::_initialize();
        $this->load->helper('url');
    }
}