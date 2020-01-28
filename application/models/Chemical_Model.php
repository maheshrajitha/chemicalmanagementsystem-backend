<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chemical_Model extends CI_Model
{
    public function get_all_chemicals($pageNo){
        if($pageNo !== 'all'){
            $offSet = (10 * $pageNo) -10;
            $this->db->distinct();
            $this->db->order_by('exp_date','ASC');
            return $this->db->get('chemical_storage',10,$offSet)->result();
        }else{
            return $this->db->get('chemical_storage')->result();
        }
    }
    public function get_chemical_storage_count(){
        return $this->db->count_all_results('chemical_storage'); 
    }

    public function search_fixed_chemicals($chemical_name){
        $this->db->distinct();
        $this->db->like('chemical_name', str_replace('%20',' ',$chemical_name));
        return $this->db->get('chemical_storage')->result();
    }
    public function add_new_chemicals_to_store($chemical_data){
        $this->db->insert('chemical_storage',array(
            'id'=>uuid(),
            'chemical_name'=>$chemical_data->post('chemicalName'),
            'unit_price'=>$chemical_data->post('unitPrice'),
            'exp_date'=>$chemical_data->post('expDate'),
            'manufacture_date'=>$chemical_data->post('manufactureDate'),
            'grn_date'=>$chemical_data->post('grnDate'),
            'pack_size'=>$chemical_data->post('packSize'),
            'stored_count'=>$chemical_data->post('numOfPacks'),
            'file_no'=>$chemical_data->post('fileNo')
        ));
    }
    public function add_existing_chemicals_to_store($chemical_data){
        $this->db->set(array(
            'chemical_name'=>$chemical_data->post('chemicalName'),
            'exp_date'=>$chemical_data->post(''),
            'manufacture_date'=>$chemical_data->post('chemicalName'),
            'grn_date'=>$chemical_data->post('chemicalName'),
            'pack_size'=>$chemical_data->post('chemicalName'),
            'stored_count'=>$chemical_data->post('chemicalName'),
        ));
    }
}