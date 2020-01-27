<div class="col-sm">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid mt-5">
        <h6 class="text-center font-weight-bold text-dark">Available Chemicals In Your Store</h6>
        <div class="mt-5 mb-3">
            <button class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="addNewChemical" data-target="#addNewChemical">Add New Chemical</button>
        </div>
        <div class="collapse mb-3 mt-5" id="addNewChemical">
            <form action="" class="card shadow round" method="post">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm">
                            <label for="chemicalName">Chemical Name</label>
                            <input type="text" name="chemicakName" id="chemicalName" class="form-control" placeholder="Type Chemical Name" required>
                            <select multiple name="fixChemicalName" id="fixChemicalName" class="form-control d-none"></select>
                        </div>
                        <div class="col-sm">
                            <label for="supplierName">Supplier Name</label>
                            <input type="text" name="supplierName" id="supplierName" class="form-control" placeholder="Type Supplier's Name">
                            <select multiple name="supplierNameList" id="supplierNameList" class="form-control d-none"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm">
                                <label for="expDate">Expire Date</label>
                                <input type="date" name="expDate" id="expDate" class="form-control" placeholder="Enter Expiration Date" required>
                            </div>
                            <div class="col-sm">
                                <label for="manufactureDate">Manufacture Date</label>
                                <input type="date" name="manufactureDate" id="manufactureDate" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm">
                                <label for="packSize">Pack Size</label>
                                <input type="text" name="packSize" id="packSize" class="form-control" placeholder="Pack Size" required>
                            </div>
                            <div class="col-sm">
                                <label for="count">Number of Packs</label>
                                <input type="number" name="numOfPacks" id="numOfPacks" class="form-control" placeholder="Number Of Packs" required>
                            </div>
                            <div class="col-sm">
                                <label for="unitPrice">Unit Price</label>
                                <input type="text" name="unitPrice" id="unitPrice" class="form-control" placeholder="Enter Unit Price" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm">
                                <label for="agingDate">Aging Date</label>
                                <input type="date" name="agingDate" id="agingDate" class="form-control" required>
                            </div>
                            <div class="col-sm">
                                <label for="grnDate">GRN Date</label>
                                <input type="date" name="grnDate" id="grnDate" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" id="addToStoreButton" class="btn btn-secondary">Add to Store</button>
                </div>
            </form>
        </div>
        <?php if(empty($chemical_list)): ?>
            <h6 class="text-center font-weight-bold text-primary font-pt-sans">There is no chemicals in your store</h6>
        <?php else: ?>
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
                <?php foreach ($chemical_list as $chemical): ?>
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
        <?php endif; ?>
    </div>
</div>