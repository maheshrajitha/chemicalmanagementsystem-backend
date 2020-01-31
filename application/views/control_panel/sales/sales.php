<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <h5 class="text-center text-muted font-weight-bold">Put An Order</h5>
        <div class="d-flex align-items-center justify-content-center">
            <input type="text" name="chemicalNameSearchKeyword" id="chemicalNameSearchKeyword" class="form-control w-50 text-center round font-weight-bold shadow" placeholder="Type Chemical Name">
        </div>
        <table class="text-center font-weight-bold text-dark display-hide mt-5" id="chemicalNameSearchResultTable">
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
    </div>
</div>