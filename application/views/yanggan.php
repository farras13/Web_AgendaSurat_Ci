<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-0">
	<h1 class="h3 mb-0 text-gray-800">Surat Masuk Layanan Pelanggan</h1>
</div>
<div class="my-3">
	<hr>
	<small>Informasi mengenai data surat masuk Layanan Pelanggan</small>
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
							<th scope="col">No Agenda</th>
							<th scope="col">Tanggal Surat</th>
							<th scope="col">Pengirim</th>
							<th scope="col">Jenis Klaim</th>
							<th scope="col">Keterangan</th>
							<th scope="col">action</th>
						</tr>
					</thead>
					<tbody>
						<?php $n = 1;
						foreach ($getdata as $m) : ?>
							<tr>
								<th scope="row"><?= $n++ ?></th>
								<td><?= $m->no_agenda ?></td>
								<td><?= $m->tgl_surat ?></td>
								<td><?= $m->pengirim ?></td>
								<td><?= $m->claim ?></td>
								<td><?= $m->catatan ?></td>
								<td>
								<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#dtlModalYang<?= $m->id ?>"><i class="fa fa-info"></i></a>
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

