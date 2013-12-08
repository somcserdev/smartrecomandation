<?php

/**
 * Description of documentation
 *
 * @author jiaoyan
 */
require_once 'html.php';
class Documentation extends Html_controller {
    public function index() {
        $this->load->view('documentation');
    }
}
