<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sales_Model extends CI_Model
{
    /**
     * create new order
     * this will provide a query like insert into orders values('val1','val2'......);
     */
    public function create_an_order($order_data){
        $chemical_details = $this->Chemical_Model->get_chemical_by_id($order_data->post('orderChemicalId'));
        if(!empty($chemical_details)){
            $this->Chemical_Model->update_by_id(array('stored_count'=>$chemical_details->stored_count - $order_data->post('orderQuantity')),$order_data->post('orderChemicalId'));
            $employee = $this->Employees_Model->get_employee_by_id($order_data->post('orderSalesPersonList'));
            $order_id = rand(1000,45000);
            $order_db_data = array(
                'id'=>uuid(),
                'chemical_id'=>$order_data->post('orderChemicalId'),
                'quantity'=>$order_data->post('orderQuantity'),
                'order_sales_person'=>$order_data->post('orderSalesPerson'),
                'product_manager'=>$order_data->post('orderProductManager'),
                'po_date'=>date('Y-m-d H:i:s',strtotime($order_data->post('orderPoDate'))),
                'po_rec_date'=>date('Y-m-d H:i:s',strtotime($order_data->post('orderPoRecDate'))),
                'product'=>$order_data->post('orderProduct'),
                'customer'=>$order_data->post('orderCustomer'),
                'department'=>$order_data->post('orderDepartment'),
                'customer_po'=>$order_data->post('orderCustomerPo'),
                'way_of_getting_po'=>$order_data->post('orderWayOfGettingPo'),
                'customer_quotation_referance'=>$order_data->post('orderCustomerQuotationReferance'),
                'cat_number'=>$order_data->post('orderCatNumber'),
                'pack_size'=>$order_data->post('orderPackSize'),
                'unit_price_without_vat'=>$order_data->post('orderUnitPriceWithoutVat'),
                'total_price_without_vat'=>$order_data->post('orderTotalPriceWithoutVat'),
                'unit_price_with_vat'=>$order_data->post('orderUnitPriceWithVat'),
                'total_price_with_vat'=>$order_data->post('orderTotalPriceWithVat'),
                'origin'=>$order_data->post('orderOrigin'),
                'month'=>date('F',strtotime($order_data->post('orderPoDate'))),
                'branch'=> !empty($employee)? $employee->branch : 'resigned Employee',
                'order_sales_person_id' => !empty($employee)? $employee->id : 'resigned Employee',
                'order_number'=>$order_id
            );
            if($chemical_details->stored_count < $order_data->post('orderQuantity')){
                $this->Delivery_Model->save_order_to_delivery_table(array('order_id'=>$order_id,'current_status'=>'Shipment in progress','delivery_deadline'=>date('Y-m-d',strtotime(date('Y-m-d').'+ 56 days'))));
            }else
                $this->Delivery_Model->save_order_to_delivery_table(array('order_id'=>$order_id,'current_status'=>'Delivery in progress','delivery_deadline'=>date('Y-m-d',strtotime(date('Y-m-d').'+ 56 days'))));
            $this->db->insert('orders',$order_db_data);
            return true;
        }else{
            return false;
        }
    }

    /**
     * get new orders
     * this will provide a query like select * from orders limit 10,offSet;
     */
    public function get_all_orders($pageNo){
        if($pageNo !== 'all'){
            $offSet = (5* $pageNo) - 5;
            $this->db->select('*');
            //$this->db->from('orders');
            $this->db->join('order_delivery','order_delivery.order_id = orders.order_number');
            //$this->db->limit(10,$offSet);
            return $this->db->get('orders',5,$offSet)->result();
        }else{
            return $this->db->get('orders')->result();
        }
    }
    /**
     * get count from orders table
     * select count(*) from orders;
     */
    public function get_orders_count(){
        return $this->db->count_all_results('orders');
    }
    /**
     * get sales by month
     */
    public function get_month_and_sales_by_branch(){
        $branches = $this->Company_Settings_Model->get_branches();
        $this->db->select('branch');
        $this->db->select('sum(total_price_with_vat) as total');
        $this->db->where('branch in (select branch from company_settings)');
        $this->db->group_by('branch');
        return $this->db->get('orders')->result();
        //return $branches;
    }

    public function get_order_by_order_number($order_no){
        $this->db->select('*');
        $this->db->join('order_delivery','order_delivery.order_id = orders.order_number');
        $this->db->where('order_number',$order_no);
        return $this->db->get('orders')->row();
    }

    public function update_delivery_status_by_order_no($order_no,$delivery_status){
        $this->db->where('order_id',$order_no);
        $this->db->update('order_delivery',array('current_status'=>$delivery_status));
    }

    public function get_order_no_by_product_name_and_size($product,$pack_size){
        // $this->db->select('order_number');
        // $this->db->join('order_delivery','order_delivery.order_id = orders.order_number');
        // $this->db->where(array('orders.product'=>$product,'orders.pack_size'=>$pack_size,'order_delivery.current_status'=>'Shipment in progress'));
        // return $this->db->get('orders')->row();
        $this->db->where('current_status','Shipment in progress');
        $this->db->where('IN (SELECT order_number from orders where product="'.$product.'" AND pack_size="'.$pack_size.'")');
        $this->db->update('order_delivery',array(''));
    }

    public function get_products_by_pack_size($products,$pack_size){
        $this->db->where_in('pack_size',$pack_size);
        $this->db->where_in('chemical_name',$products);
        return $this->db->get('chemical_storage')->result();
    }
}