<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Model extends CI_Model{
    public function load_dashboard_items($role){
        return $this->db->where('access_role >=',$role)->get('dashboard_items')->result();
    }
}