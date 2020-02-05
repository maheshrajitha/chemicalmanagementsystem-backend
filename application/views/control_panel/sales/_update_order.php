<div class="col-md">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <form class="card shadow" id="orderUpdateForm">
            <div class="card-body rounded">
                <div class="card-header text-muted">
                    <div class="row">
                        <div class="col-md-11">Order #<?php echo $order_details->order_number ?></div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-dark" id="orderEditButton">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderDeliveryDeadline">Order Delivery Deadline</label>
                            <input type="date" name="orderDeliveryDeadline" id="orderDeliveryDeadline" class="form-control update-order" disabled value="<?php echo date('Y-m-d',strtotime($order_details->delivery_deadline)); ?>"/>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderHsCode">Order HS code</label>
                            <input type="text" name="orderHsCode" id="orderHsCode" class="form-control update-order" placeholder="Enter HS Code" value="<?php echo $order_details->hs_code ?>" disabled />
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderLicenceType">Licence Type</label>
                            <input type="text" name="orderLicenceType" id="orderLicenceType" class="form-control update-order" placeholder="Enter Licence Type" value="<?php echo $order_details->licence_type ?>" disabled />
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderLicence">Licence Status</label>
                            <input type="text" name="orderLicenceStatus" id="orderLicenceStatus" class="form-control update-order" placeholder="Enter Licence Status" value="<?php echo $order_details->licence_status ?>" disabled />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="orderStatusRef">Status REF</label>
                    <input type="text" name="orderStatusRef" id="orderStatusRef" class="form-control update-order" placeholder="Enter Status Ref"/>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderNeoChemPoNDate">Neo Chem PO Number & Date</label>
                            <input type="text" name="orderNeoChemPoNDate" id="orderNeoChemPoNDate" placeholder="Enter PO Number & Date" class="form-control update-order" />
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderSupplierOrderConfirmationNumber">Supplier Order Confirmation Number</label>
                            <input type="text" name="orderSupplierOrderConfirmationNumber" id="orderSupplierOrderConfirmationNumber" placeholder="Enter Supplier Order Confirmation Number" class="form-control update-order" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="orderSupplierPiDate">Supplier PI Date</label>
                    <input type="date" name="orderSupplierPiDate" id="orderSupplierPiDate" class="form-control update-order">
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderModeOfShipment">Mode Of Shipment</label>
                            <select name="orderModeOfShipment" id="orderModeOfShipment" class="form-control update-order">
                                <option value="Air">Air</option>
                                <option value="Sea">Sea</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderPaymentDate">Payment Date</label>
                            <input type="date" name="orderPaymentDate" id="orderPaymentDate" class="form-control update-order">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderShipmentDate">Shipment Date</label>
                            <input type="date" name="orderShipmentDate" id="orderShipmentDate" class="form-control update-order">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderEstimatedDeliveryDate">Estimated Delivery Date</label>
                            <input type="date" name="orderEstimatedDeliveryDate" id="orderEstimatedDeliveryDate" class="form-control update-order">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderCustomerInvoiceNo">Customer Invoice NO</label>
                            <input type="text" name="orderCustomerInvoiceNo" id="orderCustomerInvoiceNo" placeholder="Enter Customer Invoice Number" class="form-control update-order" />
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderDeliverStatus">Order Deliver Status</label>
                            <input type="text" name="orderDeliverStatus" id="orderDeliverStatus" placeholder="Enter Order Deliver Status" class="form-control update-order" />
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderDeliveredDate">Deliverd Date</label>
                            <input type="date" name="orderDeliveredDate" id="orderDeliveredDate" class="form-control update-order" />
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="orderDecisionOfMeeting">Decision Of Meeting</label>
                            <textarea name="orderDecisionOfMeeting" id="orderDecisionOfMeeting" class="form-row text-area-not-resize"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>