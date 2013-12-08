<?php

/**
 * Description of documentation
 *
 * @author jiaoyan
 */
class Documentation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('documentation');
        $this->load->view('templates/footer');
    }
}
