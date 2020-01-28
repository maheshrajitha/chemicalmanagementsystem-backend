<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="mt-5 mb-3">
    <button class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="addNewCustomer" data-target="#addNewCustomer"><i class="fas fa-user-tie"></i>&nbsp;&nbsp;Add New Customer</button>
</div>
<div class="collapse mb-4" id="addNewCustomer">
    <form action="" class="card round shadow" method="post">
        <div class="card-body">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-sm">
                        <label for="customerName">Customer Name</label>
                        <input type="text" name="customerName" id="customerName" class="form-control" placeholder="Type Customer's Name" required>
                    </div>
                    <div class="col-sm">
                        <label for="customerName">Customer Email</label>
                        <input type="text" name="customerName" id="customerName" class="form-control" placeholder="Type Customer's Name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="customerPhoneNumber">Customer Phone Number</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">+94</div>
                    </div>
                    <input type="text" name="customerPhoneNumber" id="customerPhoneNumber" class="form-control" placeholder="Type Customer's Phone Number">
                </div>
            </div>
        </div>
    </form>
</div>