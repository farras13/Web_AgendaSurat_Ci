<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Add <?= $judul ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Home/ins_keluar') ?>" method="POST" class="form" enctype="multipart/form-data">
					<div class="row g-2">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="claim" id="floatingInputGrid" value="<?php  if( $claim !=null ): echo $claim; else:  echo 1 ;  endif; ?>" hidden>
								<label for="floatingInputGrid">Claim</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-floating">
								<input type="text" class="form-control" name="norut" id="floatingInputGrid" value="<?php if($total!=null): echo $total->id_claim + 1; else:  echo 1 ;  endif; ?>" readonly>
								<label for="floatingInputGrid">No Urut</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="kode" id="floatingInputGrid">
								<label for="floatingInputGrid">Kode Surat</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="no" id="floatingInputGrid">
								<label for="floatingInputGrid">No Surat</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-floating">
								<input type="date" class="form-control" name="tgl_surat" id="floatingInputGrid">
								<label for="floatingInputGrid">Tanggal Surat</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="tujuan" id="floatingInputGrid">
								<label for="floatingInputGrid">Tujuan</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="perihal" id="floatingInputGrid">
								<label for="floatingInputGrid">Perihal</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-floating">
								<input type="text" class="form-control" name="alamat" id="floatingInputGrid">
								<label for="floatingInputGrid">Alamat</label>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-floating">
								<input type="file" class="form-control" name="file" id="file" accept="application/pdf">
								<label for="file">Dokumen</label>
							</div>
						</div>
						<div class="col-md-12">
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
<?php foreach ($keluar as $kl) : ?>
	<div class="modal fade" id="edtModal<?= $kl->id ?>" tabindex="-1" aria-labelledby="edtModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="edtModalLabel">Edit <?= $judul ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('Home/upd_keluar/') . $kl->claim . '/' . $kl->id ?>" method="POST" class="form" enctype="multipart/form-data">
						<div class="row g-2">
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="claim" id="floatingInputGrid" value="<?php  if( $claim !=null ): echo $claim; else:  echo 1 ;  endif; ?>" hidden>
									<label for="floatingInputGrid">Claim</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="text" class="form-control" name="norut" id="floatingInputGrid" value="<?= $kl->id_claim; ?>" readonly>
									<label for="floatingInputGrid">No Urut</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="kode" id="floatingInputGrid" value="<?= $kl->kode_surat ?>">
									<label for="floatingInputGrid">Kode Surat</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="no" id="floatingInputGrid" value="<?= $kl->no_surat ?>">
									<label for="floatingInputGrid">No Surat</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="date" class="form-control" name="tgl_surat" id="floatingInputGrid" value="<?= $kl->tgl_surat ?>">
									<label for="floatingInputGrid">Tanggal Surat</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="tujuan" id="floatingInputGrid" value="<?= $kl->tujuan ?>">
									<label for="floatingInputGrid">Tujuan</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" name="telpon" id="floatingInputGrid" value="<?= $kl->perihal ?>">
									<label for="floatingInputGrid">Perihal</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="text" class="form-control" name="alamat" id="floatingInputGrid" value="<?= $kl->alamat ?>">
									<label for="floatingInputGrid">Alamat</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="file" class="form-control" name="file" id="file" accept="application/pdf">
									<label for="file">Dokumen</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<textarea class="form-control" id="Catatan" name="catatan" rows="4"> <?= $kl->catatan ?> </textarea>
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
<?php foreach ($keluar as $kl) : ?>
	<div class="modal fade" id="detail<?= $kl->id ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row g-2">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="kode" id="floatingInputGrid" value="<?= $kl->kode_surat ?>">
								<label for="floatingInputGrid">Kode Surat</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="no" id="floatingInputGrid" value="<?= $kl->no_surat ?>">
								<label for="floatingInputGrid">No Surat</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-floating">
								<input type="date" class="form-control" name="tgl_surat" id="floatingInputGrid" value="<?= $kl->tgl_surat ?>">
								<label for="floatingInputGrid">Tanggal Surat</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="tujuan" id="floatingInputGrid" value="<?= $kl->tujuan ?>">
								<label for="floatingInputGrid">Tujuan</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="telpon" id="floatingInputGrid" value="<?= $kl->perihal ?>">
								<label for="floatingInputGrid">Perihal</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-floating">
								<input type="text" class="form-control" name="alamat" id="floatingInputGrid" value="<?= $kl->alamat ?>">
								<label for="floatingInputGrid">Alamat</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-floating">
								<textarea class="form-control" id="Catatan" name="catatan" rows="4"> <?= $kl->catatan ?> </textarea>
								<label for="Catatan">Catatan</label>
							</div>
						</div>
						<div class="col-md-12">
							<h3>Preview Dokumen</h3>
							<?php if ($kl->dokumen != null) : ?>
								<iframe src="<?= base_url('assets/upload/') . $kl->dokumen ?>" width="100%" height="500"></iframe>
							<?php else : echo "<h5> Dokumen tidak ada </h5>";
							endif; ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a href="<?= base_url('home/printK/'). $kl->id ?>" class="btn btn-warning">Print</a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
