<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Add Surat Masuk</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Home/ins_masuk') ?>" method="POST" class="form" enctype="multipart/form-data">
					<div class="row g-2">
						<div class="col-md-3">
							<div class="form-floating">
								<input type="text" class="form-control" name="norut" id="floatingInputGrid" value="<?= $total ?>" readonly>
								<label for="floatingInputGrid">No Urut</label>
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-floating">
								<input type="text" class="form-control" name="no" id="floatingInputGrid">
								<label for="floatingInputGrid">No Agenda</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-floating">
								<input type="text" class="form-control" name="perihal" id="perihal" list="klaim">
								<datalist id="klaim">
									<?php foreach ($dlist as $l) : ?>
										<option value="<?= $l->id_claim ?>"><?= $l->claim ?></option>
									<?php endforeach; ?>
								</datalist>
								<label for="perihal">Jenis Klaim</label>
							</div>
						</div>
						<div class="row col-lg-12 mt-2">
							<div class="col-md-6">
								<div class="form-floating h-100">
									<input type="date" class="form-control input-lg h-100" name="tgl_surat" id="floatingInputGrid">
									<label for="floatingInputGrid">tgl surat</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<div class="form-floating">
										<input type="text" class="form-control" name="pengirim" id="floatingInputGrid">
										<label for="floatingInputGrid">Pengirim</label>
									</div>
								</div>
								<div class="col-md-12 mt-2">
									<div class="form-floating">
										<input type="text" class="form-control" name="peserta" id="floatingInputGrid">
										<label for="floatingInputGrid">Nama Peserta</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="nrp" id="floatingInputGrid">
								<label for="floatingInputGrid">NRP</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="ktpa" id="floatingInputGrid">
								<label for="floatingInputGrid">no ktpa</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="alamat" id="floatingInputGrid">
								<label for="floatingInputGrid">Alamat</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="telpon" id="floatingInputGrid">
								<label for="floatingInputGrid">no telpon</label>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-floating">
								<input type="file" class="form-control" name="file" id="file" accept="application/pdf">
								<label for="file">Dokumen</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<textarea class="form-control" id="Catatan" name="catatan" rows="4"> </textarea>
								<label for="Catatan">Catatan</label>
							</div>
						</div>
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<?php foreach ($masuk as $ms) : ?>
	<div class="modal fade" id="edtModal<?= $ms->id ?>" tabindex="-1" aria-labelledby="edtModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="edtModalLabel">Edit Surat Masuk</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('Home/upd_masuk/') . $ms->id ?>" method="POST" class="form" enctype="multipart/form-data">
						<div class="row g-2">
							<div class="col-md-3">
								<div class="form-floating">
									<input type="text" class="form-control" name="norut" id="floatingInputGrid" value="<?= $ms->no_urut ?>" disabled>
									<label for="floatingInputGrid">No Urut</label>
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-floating">
									<input type="text" class="form-control" name="no" id="floatingInputGrid" value="<?= $ms->no_agenda ?>">
									<label for="floatingInputGrid">No Agenda</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="text" class="form-control" name="perihal" id="perihal" list="klaim" value="<?= $ms->id_claim ?>">
									<datalist id="klaim">
										<?php foreach ($dlist as $l) : ?>
											<option value="<?= $l->id_claim ?>"><?= $l->claim ?></option>
										<?php endforeach; ?>
									</datalist>
									<label for="perihal">Jenis Klaim</label>
								</div>
							</div>
							<div class="row col-lg-12 mt-2">
								<div class="col-md-6">
									<div class="form-floating h-100">
										<input type="date" class="form-control input-lg h-100" name="tgl_surat" id="floatingInputGrid" value="<?= $ms->tgl_surat ?>">
										<label for="floatingInputGrid">tgl surat</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-md-12">
										<div class="form-floating">
											<input type="text" class="form-control" name="pengirim" id="floatingInputGrid" value="<?= $ms->pengirim ?>">
											<label for="floatingInputGrid">Pengirim</label>
										</div>
									</div>
									<div class="col-md-12 mt-2">
										<div class="form-floating">
											<input type="text" class="form-control" name="peserta" id="floatingInputGrid" value="<?= $ms->nama_peserta ?>">
											<label for="floatingInputGrid">Nama Peserta</label>
										</div>
									</div>
								</div>

							</div>

							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="nrp" id="floatingInputGrid" value="<?= $ms->nrp ?>">
									<label for="floatingInputGrid">NRP</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="ktpa" id="floatingInputGrid" value="<?= $ms->no_ktpa ?>">
									<label for="floatingInputGrid">no ktpa</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="alamat" id="floatingInputGrid" value="<?= $ms->alamat ?>">
									<label for="floatingInputGrid">Alamat</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="telpon" id="floatingInputGrid" value="<?= $ms->no_tlp ?>">
									<label for="floatingInputGrid">no telpon</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="file" class="form-control" name="file" id="file" accept="application/pdf" >
									<label for="file">Dokumen</label>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-floating">
									<textarea class="form-control" id="Catatan" name="catatan" rows="4"> <?= $ms->catatan ?> </textarea>
									<label for="Catatan">Catatan</label>
								</div>
							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- detail -->
<?php foreach ($masuk as $ms) : ?>
	<div class="modal fade" id="detail<?= $ms->id ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailModalLabel">Detail Surat</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('Home/upd_masuk/') . $ms->id ?>" method="POST" class="form" enctype="multipart/form-data">
						<div class="row g-2">
							<div class="col-md-3">
								<div class="form-floating">
									<input type="text" class="form-control" name="norut" id="floatingInputGrid" value="<?= $ms->no_urut ?>" disabled>
									<label for="floatingInputGrid">No Urut</label>
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-floating">
									<input type="text" class="form-control" name="no" id="floatingInputGrid" value="<?= $ms->no_agenda ?>" disabled>
									<label for="floatingInputGrid">No Agenda</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="text" class="form-control" name="perihal" id="perihal" list="klaim" value="<?= $ms->claim ?>" readonly>
									<datalist id="klaim">
										<?php foreach ($dlist as $l) : ?>
											<option value="<?= $l->claim ?>"><?= $l->claim ?></option>
										<?php endforeach; ?>
									</datalist>
									<label for="perihal">Jenis Klaim</label>
								</div>
							</div>
							<div class="row col-lg-12 mt-2">
								<div class="col-md-6">
									<div class="form-floating h-100">
										<input type="date" class="form-control input-lg h-100" name="tgl_surat" id="floatingInputGrid" value="<?= $ms->tgl_surat ?>" readonly>
										<label for="floatingInputGrid">tgl surat</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-md-12">
										<div class="form-floating">
											<input type="text" class="form-control" name="pengirim" id="floatingInputGrid" value="<?= $ms->pengirim ?>" readonly>
											<label for="floatingInputGrid">Pengirim</label>
										</div>
									</div>
									<div class="col-md-12 mt-2">
										<div class="form-floating">
											<input type="text" class="form-control" name="peserta" id="floatingInputGrid" value="<?= $ms->nama_peserta ?>" readonly>
											<label for="floatingInputGrid">Nama Peserta</label>
										</div>
									</div>
								</div>

							</div>

							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="nrp" id="floatingInputGrid" value="<?= $ms->nrp ?>" readonly>
									<label for="floatingInputGrid">NRP</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="ktpa" id="floatingInputGrid" value="<?= $ms->no_ktpa ?>" readonly>
									<label for="floatingInputGrid">no ktpa</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="alamat" id="floatingInputGrid" value="<?= $ms->alamat ?>" readonly>
									<label for="floatingInputGrid">Alamat</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="telpon" id="floatingInputGrid" value="<?= $ms->no_tlp ?>" readonly>
									<label for="floatingInputGrid">no telpon</label>
								</div>
							</div>

							<div class="col-md-12">
								<label for="dokumem">Dokumen</label>
								<?php if ($ms->dokumen != null) : ?>
									<iframe src="<?= base_url('assets/upload/') . $ms->dokumen ?>" width="100%" height="500"></iframe>
								<?php else : echo "<h5> Dokumen tidak ada </h5>";
								endif; ?>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<textarea class="form-control" id="Catatan" name="catatan" rows="4" disabled> <?= $ms->catatan ?> </textarea>
									<label for="Catatan">Catatan</label>
								</div>
							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a href="<?= base_url('home/printM/') . $ms->id ?>" class="btn btn-warning">Print</a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
