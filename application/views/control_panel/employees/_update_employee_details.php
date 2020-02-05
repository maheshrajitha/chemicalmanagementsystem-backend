<div class="modal fade" id="updateEmployeeDetails" role="dialog" aria-labelledby="updateEmployeeDetailsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white h-25">
                <h5 class="modal-title">Update Employee</h5>
            </div>
            <form action="<?php echo base_url(); ?>Employees_Controller/update_employee" class="modal-body" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-sm">
                            <label for="updateEmpName">Employee Name</label>
                            <input type="text" name="updateEmpName" id="updateEmpName" class="form-control" placeholder="New Name" required/>
                        </div>
                        <div class="col-sm">
                            <label for="updateEmpDesignation">Designation</label>
                            <input type="text" name="updateEmpDesignation" id="updateEmpDesignation" placeholder="New Designation" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-sm">
                            <label for="updateEmpEmail">Email</label>
                            <input type="email" name="updateEmpEmail" id="updateEmpEmail" placeholder="New Email Address" class="form-control" required>
                            <small class="text-muted font-weight-bold" id="updateEmpEmailHelper"></small>
                        </div>
                        <div class="col-sm">
                            <label for="updateEmpContactNumber">Contact Number</label>
                            <input type="text" name="updateEmpContactNumber" id="updateEmpContactNumber" placeholder="New Contact Number" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-sm">
                            <label for="updateEmpAddress">Address</label>
                            <textarea name="updateEmpAddress" id="updateEmpAddress" rows="3" class="form-control text-area-not-resize" placeholder="New Address" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button name="updateEmployeeId" id="updateEmployeeId" type="submit" class="btn btn-dark"><i class="fas fa-sync"></i>&nbsp;&nbsp;Update</button>
                </div>
            </form>
        </div>
    </div>
</div>