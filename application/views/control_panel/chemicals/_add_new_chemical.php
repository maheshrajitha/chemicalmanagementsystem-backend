<div class="mt-5 mb-3">
    <button class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="addNewChemical" data-target="#addNewChemical"><i class="fas fa-vial"></i>&nbsp;&nbsp;Add New Chemical</button>
</div>
<div class="collapse mb-3 mt-5" id="addNewChemical">
    <form action="<?php echo base_url(); ?>Chemical_Controller/add_chemicals_to_store" class="card shadow round" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="col-sm">
                    <label for="chemicalName">Chemical Name</label>
                    <input type="text" name="chemicalName" id="chemicalName" class="form-control" placeholder="Type Chemical Name" required>
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
                        <label for="grnDate">GRN Date</label>
                        <input type="date" name="grnDate" id="grnDate" class="form-control" required>
                    </div>
                    <div class="col-sm">
                        <label for="fileNo">File Number</label>
                        <input type="text" name="fileNo" id="fileNo" class="form-control" placeholder="File Number" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" id="addToStoreButton" class="btn btn-secondary">Add to Store</button>
        </div>
    </form>
</div>