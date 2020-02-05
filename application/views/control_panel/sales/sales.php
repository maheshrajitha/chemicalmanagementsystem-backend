<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <h5 class="text-center text-muted font-weight-bold">Put A New Order</h5>
        <div class="d-flex align-items-center justify-content-center">
            <input type="text" name="chemicalNameSearchKeyword" id="chemicalNameSearchKeyword" class="form-control w-50 text-center round font-weight-bold shadow" placeholder="Type Chemical Name">
        </div>

        <table class="table table-responsive table-light table-bordered mt-5 display-hide mt-5" id="chemicalNameSearchResultTable">
            <thead>
                <tr>
                    <th class="w-25">Item</th>
                    <th>Pack Size</th>
                    <th>Physical Stock</th>
                    <th>GRN Date</th>
                    <th>Aging Date</th>
                    <th>Manufacture Date</th>
                    <th>Expire Date</th>
                    <th>Unit Price (without VAT)</th>
                    <th>Order</th>
                </tr>
            </thead>
            <tbody id="chemicalNameSearchResultTableBody"></tbody>
        </table>
        <div class="row mt-5">
            <div class="col-sm">
                <div class="dropdown show">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php for($i = 0 ; $i < $pages ; $i++): ?>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>admin/sales/<?php echo $i+1?>"><?php echo $i + 1?></a>
                    <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="text-primary text-center mt-5 mb-3">Undelivered Orders</h5>
        <table class="table table-responsive table-light table-bordered mt-5" id="chemicalNameSearchResultTable">
            <thead>
                <tr>
                    <th>Order No</th>
                    <th>Sales Person</th>
                    <th>Product Manager</th>
                    <th>PO Date</th>
                    <th>PO Rec Date</th>
                    <th>Product</th>
                    <th>Customer</th>
                    <th>Decison Of Meeting</th>
                    <th>Reply From Relevent Person</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders_list as $order): ?>
                    <tr>
                        <td><a href="<?php echo base_url().'admin/orders/order/'.$order->order_number; ?>"><?php echo $order->order_number;?></a></td>
                        <td><?php echo explode(' ',$order->order_sales_person)[0];?></td>
                        <td><?php echo explode(' ',$order->product_manager)[0];?></td>
                        <td><?php echo date('y-m-d',strtotime($order->po_date));?></td>
                        <td><?php echo date('y-m-d',strtotime($order->po_rec_date));?></td>
                        <td><?php echo $order->product;?></td>
                        <td><?php echo $order->customer; ?></td>
                        <td><?php if (empty($order->decision_of_meeting)): ?> <span class="badge badge-pill badge-primary">No Decisions</span><?php else:?><span class="badge badge-pill badge-warning">Decision Took</span><?php endif;?></td>
                        <td>
                            <?php if(empty($order->decision_of_meeting)) : ?>
                                <span class="badge badge-pill badge-primary">No Decisions Took</span>
                            <?php else: ?>
                                <?php if(empty($order->reply_from_relevent_person)): ?>
                                    <span class="badge badge-pill badge-warning">No Reply</span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <select name="orderCurrentStatus" id="orderCurrentStatus" class="form-control">
                                    <option value=""><?php echo $order->current_status; ?></option>
                                    <option value="delivered">Order Delivered</option>
                                    <option value="Shipment in progress">Shipment In Progress</option>
                                    <option value="Delivey in Progress">Delivery In Progress</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
