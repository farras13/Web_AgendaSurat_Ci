<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Preview Print Surat Masuk Adum</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/favicon.ico" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- icon font -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>
		@page {
			size: 8.5in 5.5in;
			margin: auto;
		}

		body {
			height: 816px;
			width: 528px;
			margin-left: auto;
			margin-right: auto;
			/* to centre page on screen*/
			font-size: 14pt;
		}

		table {
			margin-left: auto;
			margin-right: auto;
		}
	</style>
</head>

<body>
	<div class="card" style="border: 0;">
		<h5 class="card-header">
			<img src="<?= base_url('assets/logo.png') ?>" alt="" width="70" height="70" class="d-inline-block align-text-top">
		</h5>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<p class="float-end" style="font-size: small;">Phone : (0274)869454, Call Center 0823 1403 4559 <br> E_mail kancab, yogyakarta@asabri.co.id </p>
				</div>

				<div class="my-4">
					<center><b>
							<h4 class="card-title"><?php $pm->jenis_klaim ?></h4>
						</b></center>
				</div>
			</div>

			<table class="table table-lg table-borderless" style="padding:0;">
				<tr>
					<td style="width: 30%;"><label for="inp1" class="col-form-label"><b>No Agenda&nbsp;:</b></label></td>
					<td><label class="col-form-label"> <?= $pm->no_agenda ?></label></td>
					<td><label for="inp2" class="col-form-label"><b>No Surat&nbsp;:</b></label></td>
					<td><label class="col-form-label"> <?= $pm->no_surat ?></label></td>
				</tr>
				<tr>
					<td><label for="inp1" class="col-form-label"><b>Jenis Surat&nbsp;:</b></label></td>
					<td><label class="col-form-label"> <?= $pm->jenis_surat ?></label></td>
				</tr>
				<tr>
					<td><label for="inp1" class="col-form-label"><b>Pengirim&nbsp;:</b></label></td>
					<td><label class="col-form-label"> <?= $pm->pengirim ?></label></td>
				</tr>
				<tr>
					<td><label for="inp1" class="col-form-label"><b>Perihal&nbsp;:</b></label></td>
					<td><label class="col-form-label"> <?= $pm->perihal ?></label></td>
				</tr>
			</table>


			<div class="row row-cols-2 row-cols-md-2 mt-5" style="text-align: center;">
				<div class="col-3">
					<p><b>Sleman, Yogyakarta</b></p><br>
					<h6><?= $user['username']; ?></h6>
				</div>
				<div class="col-2" style="vertical-align: text-bottom;">
					<p><b><?= date('d-M-y'); ?></b></p>
				</div>
			</div>
		</div>
	</div>


	<script>
		window.onload = function() {
			window.print();
		}
	</script>

</body>

</html>
