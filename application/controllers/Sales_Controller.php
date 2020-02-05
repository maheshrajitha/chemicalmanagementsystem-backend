<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sales_Controller extends CI_Controller{
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

    public function index($pageN0){
        $data['orders_list'] = $this->Sales_Model->get_all_orders($pageN0);
        $data['pages'] = $this->Sales_Model->get_orders_count() / 5;
        $data['title'] = 'Sales';
        $data['nav_items'] = $this->nav_items;
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/sales/sales');
        $this->load->view('control_panel/partials/_footer');
    }

    public function put_an_order($chemical_entry_id){
        $chemical_data = $this->Chemical_Model->get_chemical_by_id($chemical_entry_id);
        if(empty($chemical_data)){
            $this->session->set_flashdata('sales_error','There is no chemicals with this ID');
            redirect(base_url().'admin/sales/1');
        }else{
            $data['title'] = 'Order';
            $data['chemical_details'] = $chemical_data;
            $data['nav_items'] = $this->nav_items;
            $this->load->view('control_panel/partials/_dashboard',$data);
            $this->load->view('control_panel/sales/_put_order');
            $this->load->view('control_panel/partials/_footer');
        }
    }

    public function save_order(){
        if(!empty($this->input->post('orderChemicalId'))){
            //
            if($this->Sales_Model->create_an_order($this->input)){
                redirect(base_url().'admin/sales/1');
            }
        }else{
            redirect(base_url());
        }
    }

    public function get_month_and_sales(){
        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->Sales_Model->get_month_and_sales_by_branch()));
    }

    public function get_order_by_order_number($order_no){
        if(!empty($order_no)){
            $order = $this->Sales_Model->get_order_by_order_number($order_no);
            if(!empty($order)){
                $data['order_details'] = $order;
                $data['nav_items'] = $this->nav_items;
                $data['title'] = 'Order Details';
                $this->load->view('control_panel/partials/_dashboard',$data);
                $this->load->view('control_panel/sales/_update_order');
                $this->load->view('control_panel/partials/_footer');
            }
        }else{
            redirect(base_url());
        }
    }

    public function put(){
        //print_r(array_values($this->input->post('packSizes')));
        print_r( $this->Sales_Model->get_products_by_pack_size($this->input->post('orderItems'),$this->input->post('packSizes')));
    }
}