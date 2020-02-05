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
        $this->db->select('chemical_name');
        $this->db->like('chemical_name', str_replace('%20',' ',$chemical_name));
        return $this->db->get('chemical_storage')->result();
    }
    public function add_new_chemicals_to_store($chemical_data , $chemical_quantity){
        $this->db->insert('chemical_storage',array(
            'id'=>uuid(),
            'chemical_name'=>$chemical_data->post('chemicalName'),
            'unit_price'=>$chemical_data->post('unitPrice'),
            'exp_date'=>$chemical_data->post('expDate'),
            'manufacture_date'=>$chemical_data->post('manufactureDate'),
            'grn_date'=>$chemical_data->post('grnDate'),
            'pack_size'=>$chemical_data->post('packSize'),
            'stored_count'=>$chemical_quantity,
            'file_no'=>$chemical_data->post('fileNo'),
            'supplier_name'=>$chemical_data->post('supplierName')
        ));
    }
    public function add_existing_chemicals_to_store($chemical_data,$chemical_id , $stored_count){
        // $this->db->set(array(
        //     'chemical_name'=>$chemical_data->post('chemicalName'),
        //     'exp_date'=>$chemical_data->post(''),
        //     'manufacture_date'=>$chemical_data->post('chemicalName'),
        //     'grn_date'=>$chemical_data->post('chemicalName'),
        //     'pack_size'=>$chemical_data->post('chemicalName'),
        //     'stored_count'=>$chemical_data->post('chemicalName'),
        // ));
        $updating_data = array(
            'exp_date'=>$chemical_data->post('expDate'),
            'manufacture_date'=>$chemical_data->post('manufactureDate'),
            'grn_date'=>$chemical_data->post('grnDate'),
            'pack_size'=>$chemical_data->post('packSize'),
            'stored_count'=>$stored_count,
        );
        $this->db->where('id',$chemical_id);
        $this->db->update('chemical_storage',$updating_data);
    }
    public function check_chemical_availability($chemical_name){
        // return $this->db->where(array(
        //     'chemical_name'=>$chemical_data->post('chemicalName'),
        //     'pack_size'=>$chemical_data->post->post('packSize'),
        //     'stored_count >='=>$chemical_data->post('count')
        // ))->result();
        $this->db->like('chemical_name', str_replace('%20',' ',$chemical_name));
        return $this->db->get('chemical_storage')->result();
    }
    public function get_chemical_by_id($chemical_entry_id){
        $this->db->where('id',$chemical_entry_id);
        //$this->db->where('stored_count >=',0);
        $this->db->from('chemical_storage');
        return $this->db->get()->row();
    }
    /**
     * chemical update by id
     * this will provide a query like update chemical_storage set [update_details] where id='1';
     */
    public function update_by_id($update_details,$chemical_id){
        $this->db->where('id',$chemical_id);
        $this->db->update('chemical_storage',$update_details);
    }
    /**
     * get chemical by pack_size id and chemical_name
     * this will provide a query like select * from chemical_storage where chemical_name='HCl' and id='1' and pack_size='501';
     */
    public function get_chemical_by_store_count_less_zero_pack_size_and_chemical_name($chemical_name , $chemical_pack_size){
        //$this->db->where('id',$chemical_id);
        $this->db->where('stored_count <=',0);
        $this->db->where('pack_size',$chemical_pack_size);
        $this->db->where('chemical_name',$chemical_name);
        return $this->db->get('chemical_storage')->row();
    }
    /**
     * delete chemical by id
     * this method will provide a query like delete chemical_storage where id=1;
     */
    public function delete_chemical_by_id($chemical_id){
        $this->db->delete('chemical_storage', array('id' => $chemical_id));
    }
}