<div class="col-sm">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <form action="<?php echo base_url(); ?>Sales_Controller/save_order" class="card round shadow" method="post">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderSalesPerson">Sales Person</label>
                            <input type="text" name="orderSalesPerson" id="orderSalesPerson" placeholder="Enter Sales Person Name" class="form-control" required/>
                            <select name="orderSalesPersonList" id="orderSalesPersonList" class="form-control display-hide"></select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderProductManager">Product Manager</label>
                            <input type="text" name="orderProductManager" id="orderProductManager" class="form-control" placeholder="Enter Product Manager Name" required />
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderPoDate">PO Date</label>
                            <input type="date" name="orderPoDate" id="orderPoDate" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderPoRecDate">PO Rec Date</label>
                            <input type="date" name="orderPoRecDate" id="orderPoRecDate" class="form-control" required />
                        </div>
                    </div>
                </div>
                <dic class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderProduct">Product</label>
                            <input type="text" name="orderProduct" id="orderProduct" class="form-control" readonly value="<?php echo $chemical_details->chemical_name ?>" required />
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderCustomer">Customer</label>
                            <input type="text" name="orderCustomer" id="orderCustomer" class="form-control" placeholder="Enter Customer's Name" required/>
                            <select name="orderCustomer" id="orderCustomer" class="form-control display-hide"></select>
                        </div>
                    </div>
                </dic>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderDepartment">Department</label>
                            <input type="text" name="orderDepartment" id="orderDepartment" placeholder="Enter Department" class="form-control" required/>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderCustomerPo">Customer PO</label>
                            <input type="text" name="orderCustomerPo" id="orderCustomerPo" placeholder="Customer PO" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderWayOfGettingPo">Way Of Getting PO</label>
                            <input type="text" name="orderWayOfGettingPo" id="orderWayOfGettingPo" placeholder="Way Of Getting PO" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderCustomerQuotationReferance">Customer Quotation Referance</label>
                            <input type="text" name="orderCustomerQuotationReferance" id="orderCustomerQuotationReferance" placeholder="Enter Customer Quotation Referance" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderCatNumber">CAT Number</label>
                            <input type="text" name="orderCatNumber" id="orderCatNumber" placeholder="Enter CAT Number" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderPackSize">Pack Size</label>
                            <input type="text" name="orderPackSize" id="orderPackSize" class="form-control" value="<?php echo $chemical_details->pack_size ?>" readonly required />
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderQuantity">Quantity</label>
                            <input type="number" name="orderQuantity" id="orderQuantity" placeholder="Enter Order Quantity" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderUnitPriceWithoutVat">USP -VAT</label>
                            <input type="text" name="orderUnitPriceWithoutVat" id="orderUnitPriceWithoutVat" class="form-control" value="<?php echo $chemical_details->unit_price ?>" readonly required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderTotalPriceWithoutVat">TSP -VAT</label>
                            <input type="text" name="orderTotalPriceWithoutVat" id="orderTotalPriceWithoutVat" class="form-control" placeholder="Enter Total Price" required />
                            <small class="text-muted">*This is Auto Calculated Value Based On Your Unit Price</small>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderUnitPriceWithVat">UST +VAT</label>
                            <input type="text" name="orderUnitPriceWithVat" id="orderUnitPriceWithVat" placeholder="Enter Unit Price With VAT" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderTotalPriceWithVat">TSP +VAT</label>
                            <input type="text" name="orderTotalPriceWithVat" id="orderTotalPriceWithVat" placeholder="Enter Total Price With VAT" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="orderOrigin">Origin</label>
                    <input type="text" name="orderOrigin" id="orderOrigin" class="form-control w-50" readonly value="<?php echo $chemical_details->supplier_name ?>" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" value="<?php echo $chemical_details->id ?>" name="orderChemicalId" id="orderChemicalId" class="btn btn-primary">Put Order</button>
            </div>
        </form>
        
    </div>
</div>