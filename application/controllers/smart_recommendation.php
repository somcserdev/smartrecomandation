<?php

class Smart_recommendation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Recommendation_model');
    }

    public function index($imei = FALSE) {
        $apps = $this->Recommendation_model->get_apps($imei);
        $this->output->set_output(json_encode($apps));
    }

}
