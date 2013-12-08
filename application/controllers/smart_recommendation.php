<?php
require 'comm/ajax.php';
class Smart_recommendation extends Ajax_controller {

    private $smart_recommend_driver;
    protected function _initialize() {
        parent::_initialize();
        $this->load->model('Recommendation_model');
        $this->load->config('services/smart_recommend');
        $this->smart_recommend_driver = $this->config->item('recommendation_driver');
    }

    public function index($imei = FALSE) {
        $apps = $this->Recommendation_model->get_apps($imei,  $this->smart_recommend_driver);
        $this->output2Json($apps);
    }

}
