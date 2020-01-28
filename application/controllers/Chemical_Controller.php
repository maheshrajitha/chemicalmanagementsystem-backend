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
        $data['pages'] = $this->Chemical_Model->get_chemical_storage_count();
        $data['title'] = 'Available Chemicals';
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/chemicals/chemicals');
        $this->load->view('control_panel/partials/_footer');
    }

    //search is oing by this method 
    public function search_fixed_chemicals($chemical_name){
        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->Chemical_Model->search_fixed_chemicals($chemical_name)));
    }
    //add new chemicals to the store
    public function add_chemicals_to_store(){
        if(empty($this->input->post('fixChemicalName'))){
            if(!empty($this->input->post('chemicalName')) && !empty($this->input->post('expDate'))){
                $this->Chemical_Model->add_new_chemicals_to_store($this->input);
                redirect(base_url().'admin/chemicals/1');
            }else{
                show_error('UNAUTHORIZED',500,'UNAUTHORIZED');
            }
        }
    }
}