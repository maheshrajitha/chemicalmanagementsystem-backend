<div class="col-sm">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="nav-item active"><a class="nav-link" data-toggle="tab" href="#home">Working Employees</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Resigned Employees</a></li>
        </ul>
        <?php $this->load->view('control_panel/employees/_new_employee'); ?>
        <div class="tab-content">
            <div id="home" class="tab-pane active in">
                <h5 class="text-center text-primary mt-5">Working Employees</h5>
                <?php if(!empty($working_employees)): ?>
                    <table class="table table-responsive table-light table-bordered mt-5">
                        <thead>
                            <tr>
                                <th>Employee Number</th>
                                <th>Employee Name</th>
                                <th>Joined Date</th>
                                <th>Designation</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                                <th>Update</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($working_employees as $employee): ?>
                                <tr>
                                    <td><?php echo $employee->emp_no; ?></td>
                                    <td><?php echo $employee->emp_name; ?></td>
                                    <td><?php echo $employee->joined_date; ?></td>
                                    <td><?php echo $employee->designation; ?></td>
                                    <td><?php echo $employee->contact_number; ?></td>
                                    <td><?php echo $employee->email; ?></td>
                                    <td><button data-toggle="modal" data-target="#updateEmployeeDetails" class="btn btn-dark btn-update-emp" data-emp="<?php echo $employee->id; ?>"><i class="fas fa-users-cog"></i></button></td>
                                    <td><button value="<?php echo $employee->id; ?>" class="btn btn-info btn-resign"><i class="fas fa-user-minus"></i></button></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h5 class="text-center text-muted">There Is No Working Employees In Your Company</h5>
                <?php endif; ?>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h5 class="text-primary text-center mt-5">Resigned Employees</h5>
                <?php if(!empty($resigned_employees_list)):?>
                <table class="table table-responsive table-light table-bordered mt-5">
                    <thead>
                        <tr>
                            <th>Employee Number</th>
                            <th>Employee Name</th>
                            <th>Joined Date</th>
                            <th>Designation</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resigned_employees_list as $resigned_employee): ?>
                            <tr>
                                <td><?php echo $resigned_employee->emp_no ?></td>
                                <td><?php echo $resigned_employee->emp_name; ?></td>
                                <td><?php echo $resigned_employee->joined_date; ?></td>
                                <td><?php echo $resigned_employee->designation; ?></td>
                                <td><?php echo $resigned_employee->contact_number; ?></td>
                                <td><?php echo $resigned_employee->email; ?></td>
                                <td><button value="<?php echo $resigned_employee->id?>" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                    <h5 class="text-muted text-center">There Is No Resigned Employees</h5>
                <?php endif;?>
            </div>
        </div>
        <?php $this->load->view('control_panel/employees/_update_employee_details');?>
    </div>
</div>