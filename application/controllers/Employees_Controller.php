<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees_Controller extends CI_Controller{
    private $active_user;
    private $nav_items;
    public function __construct() {
        parent::__construct();
        $this->active_user = check_token_cookies();
        if(empty($this->active_user) || $this->active_user->role > 2){
            $this->session->set_flashdata('auth_error','Please Login Again');
            redirect(base_url());
        }else{
            $this->nav_items = $this->Admin_Model->load_dashboard_items(check_token_cookies()->role);
        }
    }

    public function index($page){
        $data['title'] = 'Employees';
        $data['nav_items'] = $this->nav_items;
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/employees/employees');
        $this->load->view('control_panel/partials/_footer');
    }

    public function check_employee_by_contact_number($contact_number){
        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->Employees_Model->get_employee_by_contact_number($contact_number)));
    }
}