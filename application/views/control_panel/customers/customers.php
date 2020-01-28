<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-sm">
    <div class="container-fluid">
        <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
        <h6 class="text-center font-weight-bold text-dark">Available Customers</h6>
        <?php if($user_level == 1)$this->load->view('control_panel/customers/_add_new_customer');?>
        <?php if(empty($custmers_list)): ?>
            <h6 class="text-center font-weight-bold text-primary">There are no custmers available in your company</h6>
        <?php else :?>
        <table class="table table-responsive table-dark table-bordered mt-5">
            <thead>
                <tr>
                <th>Name</th>
                <th class="w-25">Email</th>
                <th class="w-50">Website</th>
                <th>Payments</th>
                <th>Credits</th>
                <th>Delete</th>
                <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($custmers_list as $customer): ?>
                <tr>
                    <td><?php echo $customer->supplier_name; ?></td>
                    <td><?php echo $customer->email; ?></td>
                    <td><?php echo $customer->website; ?></td>
                    <td><?php echo $customer->payments; ?></td>
                    <td><?php echo $customer->credits; ?></td>
                    <td><button type="button" data-id="<?php echo $supplier->id?>" class="btn btn-warning" id="deleteButton">Delete</button></td>
                    <td><button type="button" class="btn btn-primary" id="updateButton">Update</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>