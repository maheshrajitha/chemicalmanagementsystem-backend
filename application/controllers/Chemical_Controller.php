<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chemical_Controller extends CI_Controller{
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

    public function index($pageNo){
        $data['nav_items'] = $this->nav_items;
        $data['chemical_list'] = $this->Chemical_Model->get_all_chemicals($pageNo);
        $data['pages'] = $this->Chemical_Model->get_supplier_count();
        $data['title'] = 'Available Chemicals';
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/chemicals/chemicals');
        $this->load->view('control_panel/partials/_footer');
    }

    public function search_fixed_chemicals($chemical_name){
        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->Chemical_Model->search_fixed_chemicals($chemical_name)));
    }
}