<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <?php $this->load->view('control_panel/chemicals/_add_new_chemical'); ?>
        <h5 class="text-center text-primary">Available Chemicals In Your Store</h5>
        <?php if(empty($chemical_list)): ?>
            <h5 class="text-center text-muted font-pt-sans">There is no chemicals in your store</h5>
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
                <tr class="pointer-hand" onClick="window.location='<?php echo base_url().'admin/sales/chemical/'.$chemical->id?>'">
                    <td><?php echo $chemical->chemical_name; ?></td>
                    <td><?php echo $chemical->pack_size; ?></td>
                    <td><?php echo $chemical->stored_count < 0? 0: $chemical->stored_count ; ?></td>
                    <td><?php echo $chemical->grn_date; ?></td>
                    <td><?php echo $chemical->stored_count > 0 ? intval(abs(strtotime(date('Y-m-d')) - strtotime($chemical->grn_date)) / 86400) : 0; ?></td>
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