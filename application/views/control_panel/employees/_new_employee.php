<div class="mt-5 mb-3">
    <button class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="addNewEmployee" data-target="#addNewEmployee"><i class="fas fa-user-alt"></i>&nbsp;&nbsp;Add New Employee</button>
</div>
<div class="collapse mb-3 mt-5" id="addNewEmployee">
    <form action="<?php echo base_url(); ?>Chemical_Controller/add_chemicals_to_store" class="card shadow round" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="col-sm">
                    <label for="empNo">Employee NO</label>
                    <input type="text" name="empNo" id="empNo" class="form-control" placeholder="Type Employee Number" required>
                    <small id="employeeNameHelper" class="text-muted font-weight-bold"></small>
                </div>
                <div class="col-sm">
                    <label for="employeeName">Employee Name</label>
                    <input type="text" name="employeeName" id="employeeName" class="form-control" placeholder="Type Employee's Name">
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-sm">
                        <label for="empJoinedDate">Joined Date</label>
                        <input type="date" name="empJoinedDate" id="empJoinedDate" class="form-control" placeholder="Enter Employee Joined Date" required>
                    </div>
                    <div class="col-sm">
                        <label for="employeeDesignation">Designation</label>
                        <input type="text" name="employeeDesignation" id="employeeDesignation" class="form-control" placeholder="Type Employee's Designation" required>
                        <select name="employeeDesignationList" id="employeeDesignationList" class="form-control display-hide"></select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-sm">
                        <label for="empAddrLine1">Address Line 1</label>
                        <input type="text" name="empAddrLine1" id="empAddrLine1" class="form-control" placeholder="Type Employee's Address Line 1" required>
                    </div>
                    <div class="col-sm">
                        <label for="empAddrLine2">Address Line 2</label>
                        <input type="text" name="empAddrLine2" id="empAddrLine2" class="form-control" placeholder="Type Employee's Address Line 2" required>
                    </div>
                    <div class="col-sm">
                        <label for="empAddrLine3">Unit Price</label>
                        <input type="text" name="empAddrLine2" id="empAddrLine2" class="form-control" placeholder="Type Employee's Address Line 3" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="empContactNumber">Contact Number</label>
                <input type="text" name="empContactNumber" id="empContactNumber" class="form-control" placeholder="Type Employee's Contact Number" required>
                <small class="text-muted font-weight-bold" id="empContactNumberHelper"></small>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" id="addToStoreButton" class="btn btn-secondary">Add to Store</button>
        </div>
    </form>
</div>