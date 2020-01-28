<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-sm">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <h6 class="text-center font-weight-bold text-dark">Available Chemicals In Your Store</h6>
        <?php $this->load->view('control_panel/chemicals/_add_new_chemical'); ?>
        <?php if(empty($chemical_list)): ?>
            <h6 class="text-center font-weight-bold text-primary font-pt-sans">There is no chemicals in your store</h6>
        <?php else: ?>
            <?php $date_today = new DateTime(); ?>
            <table class="table table-responsive table-light table-bordered mt-5">
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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chemical_list as $chemical): ?>
                <tr>
                    <td><?php echo $chemical->chemical_name; ?></td>
                    <td><?php echo $chemical->pack_size; ?></td>
                    <td><?php echo $chemical->stored_count; ?></td>
                    <td><?php echo $chemical->grn_date; ?></td>
                    <td><?php echo intval(abs(strtotime(date('Y-m-d')) - strtotime($chemical->grn_date)) / 86400); ?></td>
                    <td><?php echo $chemical->manufacture_date ?></td>
                    <td><?php echo $chemical->exp_date?></td>
                    <td>Rs <?php echo $chemical->unit_price?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>