<?php

/**
 * Description of Preference_model
 *
 * @author jiaoyan
 */
class Preference_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_new_preference() {
        $data = array(
            'imei' => $this->input->get('imei'),
            'gender' => $this->input->get('gender'),
            'age' => $this->input->get('age'),
            'hobby' => json_encode($this->input->get('hobby'))
        );

        return $this->db->insert('user_preference', $data);
    }

    public function get_preference($imei = FALSE) {
        if ($imei === FALSE) {
            $query = $this->db->get('user_preference');
            return $query->result_array();
        }
        $query = $this->db->get_where('user_preference', array('imei' => $imei));
        return $query->result_array();
    }

}
