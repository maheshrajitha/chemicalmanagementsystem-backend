<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Delivery_Model extends CI_Model{
    /**
     * save order to delivery table
     * insert into order_delivery values('val1','val2'.....);
     */
    public function save_order_to_delivery_table($delivery_data){
        $this->db->insert('order_delivery',$delivery_data);
    }
}