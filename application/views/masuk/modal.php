<!-- Modal -->
<div class="modal fade" id="addModalAdum" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Surat Masuk Adum</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Dashboard/ins_masuk') ?>" method="post" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="norut">No urut</label>
							<input type="text" class="form-control" id="norut" name="norut" value="<?= $total ?>" readonly>
						</div>
						<div class="form-group col-md-8">
							<label for="no">Nomor Agenda</label>
							<input type="text" class="form-control" id="no" name="no" placeholder="nomor agenda">
						</div>
					</div>
					<div class="form-group">
						<label for="nosur">Nomor Surat</label>
						<input type="text" class="form-control" id="nosur" name="nosur" placeholder="Nomor Surat">
					</div>
					<div class="form-group">
						<label for="inputAddress2">Jenis Surat</label>
						<input type="text" class="form-control" id="jns" name="jns" placeholder="jenis Surat" list="jns_srt">
						<datalist id="jns_srt">
							<?php foreach ($claim as $c) : ?>
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
							<label for="pengirim">Pengirim</label>
							<input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Pengirim Surat">
						</div>
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

<!-- Modal Edit -->
<?php foreach ($masuk as $ms) : ?>
	<div class="modal fade" id="editModalAdum<?= $ms->id ?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Surat Masuk Adum</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('Dashboard/upd_masuk/'). $ms->id ?>" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="norut">No urut</label>
								<input type="text" class="form-control" id="norut" name="norut" value="<?= $ms->no_urut ?>" readonly>
							</div>
							<div class="form-group col-md-8">
								<label for="no">Nomor Agenda</label>
								<input type="text" class="form-control" id="no" name="no" value="<?= $ms->no_agenda ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="nosur">Nomor Surat</label>
							<input type="text" class="form-control" id="nosur" name="nosur" value="<?= $ms->no_surat ?>">
						</div>
						<div class="form-group">
							<label for="inputAddress2">Jenis Surat</label>
							<input type="text" class="form-control" id="jns" name="jns" list="jns_srt" value="<?= $ms->jenis_surat ?>">
							<datalist id="jns_srt">
								<?php foreach ($claim as $c) : ?>
									<option value="<?= $c->claim ?>"><?= $c->claim ?></option>
								<?php endforeach ?>
							</datalist>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tgl">Tanggal Surat</label>
								<input type="date" class="form-control" id="tgl" name="tgl" value="<?= $ms->tanggal_surat ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="pengirim">Pengirim</label>
								<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $ms->pengirim ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="perihal">Perihal</label>
							<input type="text" class="form-control" id="perihal" name="perihal" value="<?= $ms->perihal ?>">
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
<?php foreach ($masuk as $ms) : ?>
	<div class="modal fade" id="dtlModalAdum<?= $ms->id ?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Surat Masuk Adum</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="norut">No urut</label>
								<input type="text" class="form-control" id="norut" name="norut" value="<?= $ms->no_urut ?>" readonly>
							</div>
							<div class="form-group col-md-8">
								<label for="no">Nomor Agenda</label>
								<input type="text" class="form-control" id="no" name="no" value="<?= $ms->no_agenda ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="nosur">Nomor Surat</label>
							<input type="text" class="form-control" id="nosur" name="nosur" value="<?= $ms->no_surat ?>" readonly>
						</div>
						<div class="form-group">
							<label for="inputAddress2">Jenis Surat</label>
							<input type="text" class="form-control" id="jns" name="jns" readonly value="<?= $ms->claim ?>">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tgl">Tanggal Surat</label>
								<input type="date" class="form-control" id="tgl" name="tgl" value="<?= $ms->tanggal_surat ?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label for="pengirim">Pengirim</label>
								<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $ms->pengirim ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="perihal">Perihal</label>
							<input type="text" class="form-control" id="perihal" name="perihal" value="<?= $ms->perihal ?>" readonly>
						</div>
						<div class="form-group">
							<label for="dokumem">Dokumen</label>
							<?php if ($ms->dokumen != null) : ?>
								<iframe src="<?= base_url('assets/upload/') . $ms->dokumen ?>" width="100%" height="500"></iframe>
							<?php else : echo "<h5> Dokumen tidak ada </h5>";
							endif; ?>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			
			</div>
		</div>
	</div>
<?php endforeach; ?>


<!-- detail yanggan -->
<?php foreach ($masuk as $ms) : ?>
	<div class="modal fade" id="dtlModalYang<?= $ms->id ?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail Yanggan</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="norut">No urut</label>
								<input type="text" class="form-control" id="norut" name="norut" value="<?= $ms->no_urut ?>" readonly>
							</div>
							<div class="form-group col-md-8">
								<label for="no">Nomor Agenda</label>
								<input type="text" class="form-control" id="no" name="no" value="<?= $ms->no_agenda ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="inputAddress2">Jenis Klaim</label>
							<input type="text" class="form-control" id="jns" name="jns" readonly value="<?= $ms->jenis_klaim ?>">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="tgl">Tanggal Surat</label>
								<input type="date" class="form-control" id="tgl" name="tgl" value="<?= $ms->tgl_surat ?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label for="pengirim">Pengirim</label>
								<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $ms->pengirim ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="perihal">Nama Peserta</label>
							<input type="text" class="form-control" id="perihal" name="perihal" value="<?= $ms->nama_peserta ?>" readonly>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="norut">NRP</label>
								<input type="text" class="form-control" id="norut" name="norut" value="<?= $ms->no_urut ?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label for="no">Nomor KTPA</label>
								<input type="text" class="form-control" id="no" name="no" value="<?= $ms->no_agenda ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="perihal">Keterangan</label>
							<input type="text" class="form-control" id="perihal" name="perihal" value="<?= $ms->catatan ?>" readonly>
						</div>
						<div class="form-group">
							<label for="dokumem">Dokumen</label>
							<?php if ($ms->dokumen != null) : ?>
								<iframe src="<?= base_url('assets/upload/') . $ms->dokumen ?>" width="100%" height="500"></iframe>
							<?php else : echo "<h5> Dokumen tidak ada </h5>";
							endif; ?>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			
			</div>
		</div>
	</div>
<?php endforeach; ?>
