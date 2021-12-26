
<section class="mi my-4 mx-5">
	<div class="container">
		<!-- <a href="" class="btn btn-primary float-end mt-4" id="tm" onclick="window.print()"><i class="fa fa-print"></i> Print</a> -->
		<h1>Layanan Pelanggan</h1>
		<h6>Informasi mengenai pencatatan data Layanan Pelanggan</h6>
		<hr>
		<div class="wrapper center-block">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading active" role="tab" id="headingOne">
						<h4 class="panel-title" >
							<a role="button">
								Data Layanan Pelanggan <i class="float-end fa fa-arrow-down" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="arow"></i>
							</a>
							
						</h4>
					</div>
					<div id="collapseExample" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
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
											</td>
										</tr>
									<?php $n++;
									endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

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
$this->load->view('user/modal_yanggan', $data); ?>
