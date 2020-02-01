<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employees_Model extends CI_Model
{
    public function get_employee_by_contact_number($contact_number){
        $this->db->where('contact_number',$contact_number);
        return $this->db->get('employees')->row();
    }
    public function get_user_by_email($email){
        $this->db->where('email',$email);
        return $this->db->get('employees')->row();
    }
}