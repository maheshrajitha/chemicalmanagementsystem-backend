<div class="col-md">
    <button type="button" id="" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample5" class="btn btn-outline-primary" data-target="#collapseExample5"><i class="fas fa-plus"></i> &nbsp; &nbsp;Add New Supplier</button>
    <div class="collapse mt-5" id="collapseExample5">
        <form action="">
            <table class="table table-responsive table-light table-bordered mt-5 display-hide mt-5">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Pack Size</th>
                        <th>Unit</th>
                        <th>QTY</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                        <th>Cost</th>
                        <th>GPM</th>
                        <th>Delivery Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 1; $i < 6; $i++): ?>
                        <tr>
                            <td><input type="text" name="item<?php echo $i?>" id="item<?php echo $i?>" placeholder="Enter Item <?php echo $i; ?> Name" class="form-control"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </form>
    </div>
</div>