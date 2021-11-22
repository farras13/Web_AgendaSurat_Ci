<section class="mi my-4 mx-5">
	<div class="container">
		<a href="" class="btn btn-primary float-end mt-4" id="tm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i></a>
		<h1>Surat Masuk</h1>		
		<h6>Informasi mengenai pencatatan data surat masuk</h6>		
		<hr>
		<table class="table table-hover table-responsive-md" id="myTable">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">No Agenda</th>
					<th scope="col">No Surat</th>
					<th scope="col">Tanggal Surat</th>
					<th scope="col">Pengirim</th>
					<th scope="col">Jenis Klaim</th>
					<th scope="col">Catatan</th>
					<th scope="col">action</th>
				</tr>
			</thead>
			<tbody>		
				<?php $n=1; foreach($masuk as $m): ?>		
				<tr>
					<th scope="row"><?= $n++ ?></th>
					<td><?= $m->no_agenda ?></td>
					<td><?= $m->no_surat ?></td>
					<td><?= $m->tgl_surat ?></td>
					<td><?= $m->pengirim ?></td>
					<td><?= $m->jenis_klaim ?></td>
					<td><?= $m->catatan ?></td>
					<td>
						<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?= $m->id ?>"><i class="fa fa-info-circle"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edtModal<?= $m->id ?>"><i class="fa fa-pencil"></i></button>
						<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('home/hapusM/').$m->id ?>" > <i class="fa fa-trash"></i> </a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</section>
<?php $data['masuk']=$masuk; $data['total'] = $total;  $this->load->view('masuk/modal', $data); ?>
