<div class="col-sm">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm">
                <div class="dropdown show">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php for($i = 0 ; $i < $supplier_count ; $i++): ?>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>admin/suppliers/<?php echo $i+1?>"><?php echo $i + 1?></a>
                    <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <button type="button" id="addNewSupplierButton" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-primary" data-target="#collapseExample"><i class="fas fa-plus"></i> &nbsp; &nbsp;Add New Supplier</button>
            </div>
        </div>
        <div class="collapse mt-3" id="collapseExample">
            <div class="card shadow round">
                <div class="card-header">
                    Add New Supplier
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url() ?>admin/suppliers/save-new-supplier" method="post">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm">
                                    <label for="supplierName">Supplier Name</label>
                                    <input type="text" name="supplierName" id="supplierName" class="form-control" placeholder="Type Supplier's Name" required>
                                </div>
                                <div class="col-sm">
                                    <label for="supplierEmail">Supplier Email Address</label>
                                    <input type="email" name="email" id="supplierEmail" class="form-control" placeholder="Type Supplier's Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">Website Url</label>
                            <input type="text" name="website" id="website" class="form-control w-50" placeholder="Type Supplier's Website URL">
                        </div>
                        <div class="form-group">
                            <button type="submit" id="suppliesSubmitButton" class="btn btn-outline-dark">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?php echo $supplier->supplier_name; ?></td>
                    <td><?php echo $supplier->email; ?></td>
                    <td><?php echo $supplier->website; ?></td>
                    <td><?php echo $supplier->payments; ?></td>
                    <td><?php echo $supplier->credits; ?></td>
                    <td><button type="button" data-id="<?php echo $supplier->id?>" class="btn btn-warning" id="deleteButton">Delete</button></td>
                    <td><button type="button" class="btn btn-primary" id="updateButton">Update</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>