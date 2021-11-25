<section class="mi my-4 mx-5">
	<div class="container">
		<a href="" class="btn btn-primary float-end mt-4" id="tm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i></a>
		<h1>Layanan Pelanggan</h1>
		<h6>Informasi mengenai pencatatan data Layanan Pelanggan</h6>
		<hr>

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
				foreach ($masuk as $ms) : ?>
					<tr>
						<td><?= $n ?></td>
						<td><?= $ms->no_agenda ?></td>
						<td><?= $ms->tgl_surat ?></td>
						<td><?= $ms->pengirim ?></td>
						<td><?= $ms->claim ?></td>
						<td><?= $ms->catatan ?></td>
						<td>
							<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?= $ms->id ?>"><i class="fa fa-info-circle"></i> </button>
							<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edtModal<?= $ms->id ?>"><i class="fa fa-pencil"></i></button>
							<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('home/hapusM/') . $ms->id ?>"> <i class="fa fa-trash"></i> </a>
						</td>
					</tr>
				<?php $n++;
				endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
<?php
$data['masuk'] = $masuk;
$t = 0;
if ($total == null) {
	$t += 1;
} else {
	$t = $total->no_urut + 1;
}
$data['dlist'] = $dlist;
$data['total'] = $t;
$this->load->view('user/modal', $data); ?>
