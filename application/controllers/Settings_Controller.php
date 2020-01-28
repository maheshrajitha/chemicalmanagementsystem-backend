<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_Controller extends CI_Controller{
    private $active_user;
    private $nav_items;

    public function __construct() {
        parent::__construct();
        $this->decoded_token = check_token_cookies();
        if(empty($this->decoded_token) || $this->decoded_token->role > 2){
            $this->session->set_flashdata('auth_error','Please Login Again');
            redirect(base_url());
        }else{
            $this->nav_items = $this->Admin_Model->load_dashboard_items(check_token_cookies()->role);
        }
    }
    public function index(){
        $data['nav_items'] = $this->nav_items;
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/settings/settings');
        $this->load->view('control_panel/partials/_footer');
    }
}