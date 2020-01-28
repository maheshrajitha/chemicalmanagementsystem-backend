<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier_Controller extends CI_Controller{
    private $decoded_token;
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
     public function index($pageNo){
        $data['suppliers'] = $this->Suppliers_Model->get_all_suppliers($pageNo);
        $data['nav_items'] = $this->nav_items;
        $data['supplier_count'] = $this->Suppliers_Model->get_supplier_count() / 10;
        $data['title'] = 'Suppliers';
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/suppliers/suppliers');
        $this->load->view('control_panel/partials/_footer');
    }

    public function save_new_supplier(){
        if(!empty($this->input->post('supplierName')) && !empty($this->input->post('email'))){
            $this->Suppliers_Model->save_new_supplier($this->input);
            redirect(base_url().'admin/suppliers/1');
        }else{
            show_error('UNAUTHORIZED',500,'UNAUTHORIZED');
        }
    }

    public function search_supplier_name($supplier_name){
        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->Suppliers_Model->search_supplier_name($supplier_name)));
    }
}