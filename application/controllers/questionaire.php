<?php

class Questionaire extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->helper('form');
        $this->load->view('questionaire_form');
    }

    public function record() {
        $gender = $this->input->post('gender');
        $age = $this->input->post('age');
        echo $gender . " " . $age;

        $array = $_POST['hobby'];
        print_r($array);
    }

}
