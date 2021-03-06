<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-0">
	<h1 class="h3 mb-0 text-gray-800">Surat Keluar <?= $claim =str_replace('%20', ' ', $this->uri->segment(3)); ?></h1>
	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
</div>
<div class="my-3">
	<hr>
	<small>Informasi mengenai data surat Keluar <?= $claim ; ?></small>
</div>
<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-12 col-md-12 mb-4">
		<div class="card border-left-primary shadow">
			<div class="card-header">
				<ul class="nav nav-tabs">
					<?php foreach ($tab as $k) : ?>
						<li class="nav-item">
							<a class="nav-link <?php if ($this->uri->segment(3) == $k->jenis_klaim) : echo 'active';
												endif; ?>" aria-current="page" href="<?= base_url('Dashboard/keluar/') . $k->jenis_klaim ?>"><?= $k->jenis_klaim ?></a>
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
							<th scope="col">Tanggal Surat</th>
							<th scope="col">Tujuan</th>
							<th scope="col">Perihal</th>
							<th scope="col">action</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1;
						foreach ($getdata as $k) : ?>
							<tr>
								<th scope="row"><?= $n++ ?></th>
								<td><?= $k->kode_surat . ' / ' . $k->no_surat ?></td>

								<td><?= $k->tgl_surat ?></td>
								<td><?= $k->tujuan ?></td>
								<td><?= $k->perihal ?></td>
								<td>
									<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detail<?= $k->id ?>"><i class="fa fa-info"></i></a>
									<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edtModal<?= $k->id ?>"><i class="fa fa-pen"></i></a>
									<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('Dashboard/hapusK/') . $k->id ?>"> <i class="fa fa-trash"></i> </a>
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
