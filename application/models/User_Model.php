<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model{
    public function get_user_by_email($email){
        $this->db->where('email',$email);
        $this->db->from('users');
        return $this->db->get()->row();
    }
}