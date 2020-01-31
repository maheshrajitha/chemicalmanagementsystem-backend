<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sales_Model extends CI_Model
{
    public function create_an_order($order_data){
        $chemical_details = $this->Chemical_Model->get_chemical_by_id($order_data->post('orderChemicalId'));
        if(!empty($chemical_details)){
            if($chemical_details->stored_count >= $order_data->post('orderQuantity')){
                $this->Chemical_Model->update_by_id(array('stored_count'=>$chemical_details->stored_count - $order_data->post('orderQuantity')),$order_data->post('orderChemicalId'));
                return $this->db->insert('orders',array(
                    'id'=>uuid(),
                    'chemical_id'=>$order_data->post('orderChemicalId'),
                    'quantity'=>$order_data->post('orderQuantity'),
                    'order_sales_person'=>$order_data->post('orderSalesPerson'),
                    'product_manager'=>$order_data->post('orderProductManager'),
                    'po_date'=>$order_data->post('orderPoDate'),
                    'po_rec_date'=>$order_data->post('orderPoRecDate'),
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
                    'current_status'=>'Shipment In Progress',
                    'delivery_deadline'=>$order_data->post('orderDeliveryDeadline'),
                    'hs_code'=>$order_data->post('orderHsCode'),
                    'licence_type'=>$order_data->post('orderLicenceType'),
                ));
            }
        }
    }
}