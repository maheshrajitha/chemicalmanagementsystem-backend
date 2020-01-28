<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Controller extends CI_Controller{
    private $active_user;
    private $nav_items;
    public function __construct() {
        parent::__construct();
        $this->active_user = check_token_cookies();
        if(empty($this->active_user)){
            $this->session->set_flashdata('auth_error','Please Login Again');
            redirect(base_url());
        }else{
            $this->nav_items = $this->Admin_Model->load_dashboard_items(check_token_cookies()->role);
        }
    }
    public function index($pageNo){
        $data['nav_items'] = $this->nav_items;
        $data['title'] = 'Add New Customer';
        $data['user_level'] = $this->active_user->role;
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/customers/customers');
        $this->load->view('control_panel/partials/_footer');
    }
}