<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-0">
	<h1 class="h3 mb-0 text-gray-800">Surat Masuk Administrasi Umum</h1>
	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addModalAdum"><i class="fa fa-plus"></i></a>
</div>
<div class="my-3">
	<hr>
	<small>Informasi mengenai data surat masuk Administrasi Umum</small>
</div>
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-12 col-md-12 mb-4">
		<div class="card border-left-primary shadow">
			<div class="card-header">
				<ul class="nav nav-tabs">
					<?php foreach ($tab as $k) : ?>
						<li class="nav-item">
							<a class="nav-link <?php if ($this->uri->segment(3) == $k->jenis_surat) : echo 'active';
												endif; ?>" aria-current="page" href="<?= base_url('Dashboard/masuk/') . $k->jenis_surat ?>"><?= $k->jenis_surat ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="card-body">
				<table class="table table-hover table-responsive-md" id="myTable">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">No Agenda</th>
							<th scope="col">No Surat</th>
							<th scope="col">Tanggal Surat</th>
							<th scope="col">Pengirim</th>
							<th scope="col">Jenis Surat</th>
							<th scope="col">Perihal</th>
							<th scope="col">action</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1;
						foreach ($getdata as $m) : ?>
							<tr>
								<th scope="row"><?= $n++ ?></th>
								<td><?= $m->no_agenda ?></td>
								<td><?= $m->no_surat ?></td>
								<td><?= $m->tanggal_surat ?></td>
								<td><?= $m->pengirim ?></td>
								<td><?= $m->jenis_surat ?></td>
								<td><?= $m->perihal ?></td>
								<td>
									<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#dtlModalAdum<?= $m->id ?>"><i class="fa fa-info"></i></a>
									<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editModalAdum<?= $m->id ?>"><i class="fa fa-pen"></i></a>
									<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('dashboard/hapusM/') . $m->id ?>"> <i class="fa fa-trash"></i> </a>
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
