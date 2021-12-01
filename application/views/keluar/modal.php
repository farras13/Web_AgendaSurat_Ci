<!-- Modal -->

<!-- Modal Edit -->
<?php foreach ($keluar as $kl) : ?>
	<div class="modal fade" id="edtModal<?= $kl->id ?>" tabindex="-1" role="dialog" aria-labelledby="edtModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Surat Keluar</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('Dashboard/upd_keluar/') . $kl->id ?>" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="norut">No urut</label>
								<input type="text" class="form-control" id="norut" name="norut" value="<?= $kl->no_urut ?>" readonly>
							</div>
							<div class="form-group col-md-8">
								<label for="ks">Kode Surat</label>
								<input type="text" class="form-control" id="ks" name="ks" value="<?= $kl->kode_surat ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="nosur">Nomor Surat</label>
							<input type="text" class="form-control" id="nosur" name="nosur" value="<?= $kl->no_surat ?>">
						</div>
						<div class="form-group">
							<label for="inputAddress2">Jenis Surat</label>
							<input type="text" class="form-control" id="jns" name="jns" value="<?= $this->uri->segment(3) ?>" list="jns_srt" readonly>
							<datalist id="jns_srt">
								<?php foreach ($cm as $c) : ?>
									<option value="<?= $c->claim ?>"><?= $c->claim ?></option>
								<?php endforeach ?>
							</datalist>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tgl">Tanggal Surat</label>
								<input type="date" class="form-control" id="tgl" name="tgl" value="<?= $kl->tgl_surat ?>"">
						</div>
						<div class=" form-group col-md-6">
								<label for="tujuan">Tujuan</label>
								<input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $kl->tujuan ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="perihal">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $kl->alamat ?>">
						</div>
						<div class="form-group">
							<label for="perihal">Perihal</label>
							<input type="text" class="form-control" id="perihal" name="perihal" value="<?= $kl->perihal ?>">
						</div>
						<div class="form-group">
							<label for="dokumem">Dokumen</label>
							<input type="file" class="form-control" id="dokumen" name="file" accept="application/pdf">
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- detail -->
<?php foreach ($keluar as $kl) : ?>
	<div class="modal fade" id="detail<?= $kl->id ?>" tabindex="-1" role="dialog" aria-labelledby="edtModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail Surat Keluar</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('Dashboard/upd_keluar/') . $kl->id ?>" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="norut">No urut</label>
								<input type="text" class="form-control" id="norut" name="norut" value="<?= $kl->no_urut ?>" readonly>
							</div>
							<div class="form-group col-md-8">
								<label for="ks">Kode Surat</label>
								<input type="text" class="form-control" id="ks" name="ks" value="<?= $kl->kode_surat ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="nosur">Nomor Surat</label>
							<input type="text" class="form-control" id="nosur" name="nosur" value="<?= $kl->no_surat ?>" readonly>
						</div>
						<div class="form-group">
							<label for="inputAddress2">Jenis Surat</label>
							<input type="text" class="form-control" id="jns" name="jns" value="<?= $this->uri->segment(3) ?>" list="jns_srt" readonly>
							<datalist id="jns_srt">
								<?php foreach ($cm as $c) : ?>
									<option value="<?= $c->claim ?>"><?= $c->claim ?></option>
								<?php endforeach ?>
							</datalist>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tgl">Tanggal Surat</label>
								<input type="date" class="form-control" id="tgl" name="tgl" value="<?= $kl->tgl_surat ?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label for="tujuan">Tujuan</label>
								<input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $kl->tujuan ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="perihal">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $kl->alamat ?>" readonly>
						</div>
						<div class="form-group">
							<label for="perihal">Perihal</label>
							<input type="text" class="form-control" id="perihal" name="perihal" value="<?= $kl->perihal ?>" readonly>
						</div>
						<div class="form-group">
							<label for="dokumem">Dokumen</label>
							<?php if ($kl->dokumen != null) : ?>
								<iframe src="<?= base_url('assets/upload/') . $kl->dokumen ?>" width="100%" height="500"></iframe>
							<?php else : echo "<h5> Dokumen tidak ada </h5>";
							endif; ?>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a href="<?= base_url('Dashboard/printK/') . $kl->id ?>" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Surat Keluar</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="norut">No urut</label>
						<input type="text" class="form-control" id="norut" name="norut" value="<?= $total ?>" readonly>
					</div>
					<div class="form-group col-md-8">
						<label for="ks">Kode Surat</label>
						<input type="text" class="form-control" id="ks" name="k" placeholder="Kode Surat">
					</div>
				</div>
				<div class="form-group">
					<label for="nosur">Nomor Surat</label>
					<input type="text" class="form-control" id="nosur" name="nosur" placeholder="Nomor Surat">
				</div>
				<div class="form-group">
					<label for="inputAddress2">Jenis Surat</label>
					<input type="text" class="form-control" id="jns" name="jns" value="<?= $this->uri->segment(3) ?>" list="jns_srt" readonly>
					<datalist id="jns_srt">
						<?php foreach ($cm as $c) : ?>
							<option value="<?= $c->claim ?>"><?= $c->claim ?></option>
						<?php endforeach ?>
					</datalist>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="tgl">Tanggal Surat</label>
						<input type="date" class="form-control" id="tgl" name="tgl" value="<?= date("Y-m-d") ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="tujuan">Tujuan</label>
						<input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan Surat">
					</div>
				</div>
				<div class="form-group">
					<label for="perihal">Alamat</label>
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
				</div>
				<div class="form-group">
					<label for="perihal">Perihal</label>
					<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal Surat">
				</div>
				<div class="form-group">
					<label for="dokumem">Dokumen</label>
					<input type="file" class="form-control" id="dokumen" name="file" accept="application/pdf">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button class="btn btn-primary" type="submit">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>
