<?php
require 'comm/ajax.php';
class Smart_recommendation extends Ajax_controller {

    protected function _initialize() {
        parent::_initialize();
        $this->load->model('Recommendation_model');
    }

    public function index($imei = FALSE) {
        $apps = $this->Recommendation_model->get_apps($imei);
        $this->output2Json($apps);
    }

}
