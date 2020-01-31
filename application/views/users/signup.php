<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--bootstrap-->
	<link rel='stylesheet' href="<?php echo base_url(); ?>node_modules/bootstrap/dist/css/bootstrap.min.css"/>
	<!--site css-->
    <link rel='stylesheet' href='<?php echo base_url(); ?>assets/neochem.css'/>
	<title>Neochem | Signup</title>
</head>
<body>
	<div class="container-fluid full-size-container bg-dark">
		<div class="row">
			<div class="col-sm-6 login-side-bar-start d-flex align-items-center justify-content-center bg-light vh100-height" id="sideBar">
				<form action="<?php echo base_url();?>Auth_Controller/login" method="post">
                    <h1 class="font-weight-bold text-center">Signup</h1>
                    <div class="form-group">
                        <label for="signupEmployeeId">Employee ID</label>
                        <input type="text" name="signupEmployeeId" id="signupEmployeeId" placeholder="Type Your Employee ID" class="form-control font-weight-bold round shadow-text-box" required>
                    </div>
					<div class="form-row ">
						<div class="col-sm">
                            <div class="form-group">
                                <label for="signupEmail">Email</label>
						        <input type="email" name="signupEmail" id="signupEmail" placeholder="Type Your Email Address" class="form-control font-weight-bold round shadow-text-box" required>
                            </div>
                        </div>
                         <div class="col-sm">
                            <div class="form-group">
                                <label for="signupReTypeEmail">Re-type Email</label>
                                <input type="email" name="signupReTypeEmail" id="signupReTypeEmail" placeholder="Re-Type Your Email Address" class="form-control font-weight-bold round shadow-text-box" required>
                            </div>
                        </div>
					</div>
					<div class="form-row">
						<div class="col-sm">
                            <div class="form-group">
                                <label for="signupPassword">Password</label>
						        <input type="password" name="signupPassword" id="signupPassword" placeholder="Type Your Password" class="form-control font-weight-bold round shadow-text-box" required>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="signupRetypePassword">Re-type Password</label>
						        <input type="password" name="signupRetypePassword" id="signupRetypePassword" placeholder="Re-Type Your Password" class="form-control font-weight-bold round shadow-text-box" required>
                            </div>
                        </div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary round btn-block" id="signupButton">Signup</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--jquery-->
	<script src="<?php echo base_url(); ?>node_modules/jquery/dist/jquery.min.js"></script>
	<!--bootstrap js-->
	<script src="<?php echo base_url(); ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<!--site js-->
	<script src="<?php echo base_url(); ?>assets/neochem.js"></script>
</body>
</html>