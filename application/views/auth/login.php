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
	<title>Login</title>
</head>
<body>
	<div class="container-fluid full-size-container bg-dark">
		<div class="row">
			<div class="col-sm-3 login-side-bar-start d-flex align-items-center justify-content-center bg-light vh100-height" id="sideBar">
				<form action="<?php echo base_url();?>Auth_Controller/login" method="post">
				<?php if(!empty($this->session->flashdata('auth_error'))): ?>
						<div class="alert alert-warning text-center">
							<?php echo $this->session->flashdata('auth_error'); ?>
						</div>
					<?php endif; ?>
					<h1 class="font-weight-bold text-center">Login</h1>
					<div class="form-group ">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" placeholder="Type Your Email Address" class="form-control font-weight-bold round shadow-text-box" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" placeholder="Type Your Password" class="form-control font-weight-bold round shadow-text-box" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary round btn-block" id="loginButton">Login</button>
						<div class="alert alert-secondary text-center mt-5 shadow">
							New User
						</div>
						<a class="btn btn-warning btn-block mt-2 round" href="<?php echo base_url(); ?>user/signup">Signup</a>
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