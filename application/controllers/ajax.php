<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'base.php';
class Ajax_controller extends Base_controller{
    protected function output2Json($data){
        $this->output->set_output(json_encode($data));
    }
}