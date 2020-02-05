<div class="col-sm">
    <?php $this->load->view('control_panel/partials/_top_nav_bar');?>
    <div class="container-fluid">
        <div class="row card-deck mb-5">
            <div class="col-sm-4">
                <div class="card round shadow">
                    <div class="card-body round bg-light">
                        <span class="float-right"><i class="fab fa-4x fa-opencart text-muted"></i></span>
                        <h3 class="text-secondary font-weight-bold" id="epfEarnings">0</h3>
                        <p class="text-dark font-weight-bold">Sales</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card round shadow">
                    <div class="card-body round bg-light">
                        <span class="float-right"><i class="fas fa-4x fa-coins text-muted"></i></span>
                        <h3 class="text-secondary font-weight-bold" id="epfEarnings">0</h3>
                        <p class="text-dark font-weight-bold">EPF Earnings</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card round shadow">
                    <div class="card-body round bg-light">
                        <span class="float-right"><i class="fas fa-4x fa-warehouse text-muted"></i></span>
                        <h3 class="text-secondary font-weight-bold" id="epfEarnings">0</h3>
                        <p class="text-dark font-weight-bold">Total Items In Stocks</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card w-100 mt-5 rounded shadow">
            <div class="card-body w-100">
                <canvas class="w-100" id="salesChart"></canvas>
            </div>
        </div>
    </div>
</div>