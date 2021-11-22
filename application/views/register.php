<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Disposisi Surat</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/favicon.ico" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		body{
			background: #2067a1;
		}
		.row{
			background: white;
			border-radius: 30px;
			box-shadow: 12px 12px 21px #1a3f79;
		}
		img{
			margin-top: 150px;
			border-top-left-radius: 30px;
			border-bottom-left-radius: 30px;
		}
		.btn1{
			border: none;
			outline: none;
			height: 50px;
			width: 100%;
			background-color: black;
			color: white;
			border-radius: 4px;
			font-weight: bold;
		}
		.btn1:hover{
			background: white;
			border: 1px solid;
			color: black;
		}		
	</style>
</head>

<body>
	<section class="Form my-4 mx-5">
		<div class="container">
			<div class="row g-0">
				<div class="col-lg-6">
					<img src="<?= base_url('assets/test.jpg') ?>" height="auto" width="100%" class="img-fluid" alt="">
				</div>
				<div class="kolom col-lg-6 px-5 py-5">
					<h1 class="font-weight-bold pt-5">Create Account</h1>
					<small>Register your account to join Asabri  </small>
					<form action="<?= base_url('Auth/pros_reg') ?>" method="POST">
						<div class="form-row">
							<div class="form-floating col-lg-8">
								<input type="text" name="username" id="username" placeholder="Username" class="form-control my-3">
								<label for="username">Username</label>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-8 form-floating">
								<input type="email" name="email" id="email" placeholder="Email Address" class="form-control my-3">
								<label for="email">Email</label>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-8 form-floating">
								<input type="password" name="password" id="password" placeholder="Password" class="form-control my-3">
								<label for="password">Password</label>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-8 form-floating">
								<select name="role" id="role" class="form-select my-3">
									<option value="0">admin</option>
									<option value="1">user</option>
								</select>
								<label for="role">Role</label>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-8">
								<button type="submit" class="btn1 mt-4 mb-3"> Register </button>
							</div>
						</div>
						<p>Have an account? <a href="<?= base_url('Auth') ?>">Login here</a> </p>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="<?= base_url() ?>assets/js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script>
		$(document).ready(() => {
			<?php if (isset($_SESSION['toast'])) { ?>
				toastr.options.closeButton = true;
				var toastvalue = "<?php echo $_SESSION['toast'] ?>";
				var status = toastvalue.split(":")[0];
				var message = toastvalue.split(":")[1];
				if (status === "success") {
					toastr.success(message, status);
				} else if (status === "error") {
					toastr.error(message, status);
				} else if (status == "warn") {
					toastr.warning(message, status);
				}
			<?php } ?>
		});
	</script>
</body>

</html>
