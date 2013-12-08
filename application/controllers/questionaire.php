<?php
require_once 'comm/html.php';
class Questionaire extends Html_controller {
    protected function _initialize() {
        parent::_initialize();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Preference_model');
    }

    public function index() {
        $this->load->view('questionaire_form');
    }

    public function create_via_webpage() {
        //$this->form_validation->set_rules('imei', 'IMEI', 'required');
        //$this->form_validation->set_rules('hobby', 'HOBBY', 'required');
//        if ($this->form_validation->run() === FALSE) {
//            $this->load->view('templates/header');
//            $this->load->view('questionaire_form');
//            $this->load->view('templates/footer');
//        } else {
        $this->Preference_model->insert_new_preference();
        $this->preference_list();
//        }
    }

    public function create_via_client() {
        $this->Preference_model->insert_new_preference();
        $this->output->set_output(json_encode(array('result' => 'ok')));
    }

    public function preference_list() {
        $data['user_preference'] = $this->Preference_model->get_preference();
        $this->load->view('preference_list', $data);
    }

}
