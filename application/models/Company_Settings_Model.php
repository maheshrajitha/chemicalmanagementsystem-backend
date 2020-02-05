<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company_Settings_Model extends CI_Model
{
    public function get_branches(){
        $this->db->distinct();
        $this->db->select('branches');
        return $this->db->get('company_settings')->result();
    }
}