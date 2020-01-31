<div class="col-md">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <button class="btn btn-light btn-block mb-2" data-toggle="collapse" aria-expanded="false" aria-controls="addNewBranch" data-target="#addNewBranch"><i class="fas fa-code-branch"></i>&nbsp; &nbsp;Add New Branch</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-light btn-block mb-2" href="#"><i class="far fa-building"></i>&nbsp;&nbsp; Add New Department</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm">
                <div class="collapse" id="addNewBranch">
                    <h2>hello</h2>
                </div>
            </div>
        </div>
    </div>
</div>