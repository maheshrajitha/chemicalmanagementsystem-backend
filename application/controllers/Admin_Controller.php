<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Controller extends CI_Controller{
    private $active_user;
    private $nav_items;
    public function __construct() {
        parent::__construct();
        if(empty(check_token_cookies())){
            $this->session->set_flashdata('auth_error','Please Login Again');
            redirect(base_url());
        }else{
            $this->nav_items = $this->Admin_Model->load_dashboard_items(check_token_cookies()->role);
        }
    }
    public function index(){
        $data['nav_items'] = $this->nav_items;
        $data['title'] = 'Home';
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/home');
        $this->load->view('control_panel/partials/_footer');
    }

   
}