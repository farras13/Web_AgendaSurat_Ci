<?php if($this->uri->segment(2) == 'register'): ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-0">
	<h1 class="h3 mb-0 text-gray-800">Tambah Anggota Asabri</h1>
</div>
<div class="my-3">
	<hr>
	<small>Informasi mengenai data serta akun Anggota Asabri</small>
</div>
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-12 col-md-12 mb-4">
		<div class="card border-left-primary shadow">
			<div class="card-body">
				<form action="<?= base_url('Auth/pros_reg') ?>" method="post" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="username">
						</div>
						<div class="form-group col-md-6">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
						</div>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="********">
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-control">
							<option value="0">Admin</option>
							<option value="1">User</option>
						</select>
					</div>
			</div>
			<div class="card-footer">
				<div class="form-group float-right">
					<a class="btn btn-danger" href="<?= base_url('Anggota') ?>"> Cancel </a>
					<button class="btn btn-primary" type="submit"> Simpan </button>
				</div>
			</div>
				</form>
		</div>
	</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php else: ?>
	<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-0">
	<h1 class="h3 mb-0 text-gray-800">Tambah Anggota Asabri</h1>
</div>
<div class="my-3">
	<hr>
	<small>Informasi mengenai data serta akun Anggota Asabri</small>
</div>
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-12 col-md-12 mb-4">
		<div class="card border-left-primary shadow">
			<div class="card-body">
				<form action="<?= base_url('Anggota/pros_edt/').$edit->id ?>" method="post" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" value="<?= $edit->username ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" value="<?= $edit->email ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" value="<?= $edit->password ?>">
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-control">
							<option value="0" <?php if($edit->role == 0) echo 'selected'; ?>>Admin</option>
							<option value="1" <?php if($edit->role == 1) echo 'selected'; ?>>User</option>
						</select>
					</div>
			</div>
			<div class="card-footer">
				<div class="form-group float-right">
					<a class="btn btn-danger" href="<?= base_url('Anggota') ?>"> Cancel </a>
					<button class="btn btn-primary" type="submit"> Simpan </button>
				</div>
			</div>
				</form>
		</div>
	</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php endif; ?>
