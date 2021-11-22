<section class="mi my-4 mx-5">
	<div class="container">
		<a href="" class="btn btn-primary float-end mt-4" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i></a>
		<h1><?= $judul ?></h1>
		<h6>Informasi mengenai pencatatan data <?= $judul ?></h6>
		<hr>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(3) == null): echo 'active'; endif; ?>" aria-current="page" href="<?= base_url('home/keluar/') ?>">Nota dinas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(3) == 2): echo 'active'; endif; ?>" href="<?= base_url('home/keluar/2') ?>">Surat Perintah</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(3) == 3): echo 'active'; endif; ?>" href="<?= base_url('home/keluar/3') ?>">Surat Perintah perjalanan dinas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(3) == 4): echo 'active'; endif; ?>" href="<?= base_url('home/keluar/4') ?>">Berita acara</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(3) == 5): echo 'active'; endif; ?>" href="<?= base_url('home/keluar/5') ?>">SPKS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(3) == 6): echo 'active'; endif; ?>" href="<?= base_url('home/keluar/6') ?>">Surat Keluar Yanggan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(3) == 7): echo 'active'; endif; ?>" href="<?= base_url('home/keluar/7') ?>">Surat keluar Adum</a>
			</li>
		</ul>

		<table class="table table-hover table-responsive-md" id="myTable">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">No Agenda</th>
					
					<th scope="col">Tanggal Surat</th>
					<th scope="col">Tujuan</th>
					<th scope="col">Perihal</th>
					<th scope="col">Catatan</th>
					<th scope="col">action</th>
				</tr>
			</thead>
			<tbody>
				<?php $n = 1;
				foreach ($keluar as $k) : ?>
					<tr>
						<th scope="row"><?= $n++ ?></th>
						<td><?= $k->kode_surat.' / '. $k->no_surat ?></td>
						
						<td><?= $k->tgl_surat ?></td>
						<td><?= $k->tujuan ?></td>
						<td><?= $k->perihal ?></td>
						<td><?= $k->catatan ?></td>
						<td>
							<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?= $k->id ?>"><i class="fa fa-info-circle"></i> </button>
							<a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edtModal<?= $k->id ?>"><i class="fa fa-pencil"></i></a>
							<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('home/hapusK/') . $k->id ?>"> <i class="fa fa-trash"></i> </a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
<?php $data['keluar'] = $keluar;
$data['total'] = $total;
$data['claim'] = $this->uri->segment(3);
$data['judul'] = $judul;
$this->load->view('keluar/modal', $data); ?>
