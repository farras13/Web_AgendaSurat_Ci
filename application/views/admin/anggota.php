<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-0">
	<h1 class="h3 mb-0 text-gray-800">Anggota Asabri</h1>
	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addModaluser"><i class="fa fa-plus"></i></a>
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
				<table class="table table-hover table-responsive-md" id="myTable">
					<thead>
						<tr>
							<th scope="col">#</th>							
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Role</th>
							<th scope="col">action</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1;
						foreach ($getdata as $m) : ?>
							<tr>
								<th scope="row"><?= $n++ ?></th>
								<td><?= $m->username ?></td>
								<td><?= $m->email ?></td>
								<td><?= $m->role ?></td>
								<td>
								<a href="<?= base_url('anggota/edit/').$m->id ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
								<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('anggota/hapusM/') . $m->id ?>"> <i class="fa fa-trash"></i> </a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

