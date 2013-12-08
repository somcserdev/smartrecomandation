<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'base.php';
class Html_controller extends Base_controller{
    protected function _initialize() {
        parent::_initialize();
    }
    
    public function _before() {
        parent::_before();
       $this->load->view('templates/header');
    }
    
    public function _after() {
        parent::_after();
        $this->load->view('templates/footer');
    }
    
}