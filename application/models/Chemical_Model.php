<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chemical_Model extends CI_Model
{
    public function get_all_chemicals($pageNo){
        if($pageNo !== 'all'){
            $offSet = (10 * $pageNo)-10;
            return $this->db->get('chemical_storage',10,$offSet)->result();
        }else{
            return $this->db->get('chemical_storage')->result();
        }
    }
    public function get_supplier_count(){
        return $this->db->count_all_results('chemical_storage'); 
    }

    public function search_fixed_chemicals($chemical_name){
        $this->db->like('chemical_name', str_replace('%20',' ',$chemical_name));
        return $this->db->get('chemicals')->result();
        //return $res->result();
    }
}