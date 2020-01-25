<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Suppliers_Model extends CI_Model{
    public function get_all_suppliers($page){
        if($page !== 'all'){
            $offSet = (5 * $page) - 5;
            return $this->db->get('suppliers',5,$offSet)->result();
        }else{
            return $this->db->get('suppliers')->result();
        }
    }
    public function get_supplier_count(){
        return $this->db->count_all_results('suppliers'); 
    }
    public function save_new_supplier($supplier_input_data){
        $supplier_data = array(
            'id'=>uuid(),
            'supplier_name'=>$supplier_input_data->post('supplierName'),
            'email'=>$supplier_input_data->post('email'),
            'website'=>$supplier_input_data->post('website'),
            'credits'=>0,
            'payments'=>0
        );
        $this->db->insert('suppliers',$supplier_data);
    }
}