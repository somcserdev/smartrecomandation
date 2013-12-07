<?php

class Questionaire extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Preference_model');
    }

    public function index() {

        $this->load->view('questionaire_form');
    }

    public function create() {
        $this->form_validation->set_rules('imei', 'IMEI', 'required');
        $this->form_validation->set_rules('hobby', 'HOBBY', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('questionaire_form');
        } else {
            $this->Preference_model->insert_new_preference();
            preference_list();
        }
    }
    
    public function preference_list() {
        $data['user_preference'] = $this->Preference_model->get_preference();
        $this->load->view('preference_list', $data);
    }

}
