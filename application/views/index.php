<section class="mi my-4 mx-5">
	<div class="container">
		<h1>Dashboard</h1>
		<h6>Informasi mengenai data yang anda tampilkan</h6>
		<hr>
		<div class="card-group">
			<div class="card">
				<img src="<?= base_url('assets/head.jpeg') ?>" alt="" class="card-img-top">
				<div class="card-body">
					<h3 class="card-title">About us</h3>
					<p class="card-text">Berdasarkan Undang-undang Nomor 2 Tahun 1992 tentang Usaha Perasuransian, menurut jenis usahanya PT ASABRI (Persero) merupakan asuransi jiwa, sedangkan menurut sifat penyelenggaraan usahanya PT ASABRI (Persero) bersifat sosial, sehingga dapat dikatakan bahwa PT ASABRI (Persero) adalah perusahaan asuransi jiwa yang yang bersifat sosial yang diselenggarakan secara wajib berdasarkan undang-undang dan memberikan proteksi (perlindungan) finansial untuk kepentingan Prajurit TNI, Anggota Polri dan PNS Kemhan/Polri. Penyelenggaraan kegiatan asuransi PT ASABRI (Persero) menekankan pada prinsip dasar asuransi sosial yaitu kegotongroyongan, dimana “yang muda membantu yang tua, yang berpenghasilan tinggi membantu yang berpenghasilan rendah dan yang berisiko rendah membantu yang berisiko tinggi”.</p>
				</div>
			</div>
		</div>
		<hr>
		<center><h3>Perhitungan Surat</h3></center>
		<div class="card-group">
			<?php for ($i=0; $i < 4; $i++) {  ?>					
				<div class="card">
					<div class="card-body">
						<p class="card-title"><b><?= $claim[$i]; ?></b></p>
						<div class="row mt-4">
							<div class="col-md-6" style="background-color: whitesmoke;">
								<center>
									<h5>Masuk</h5>
									<h6 class="card-text"><?= $masuk[$i]; ?></h6>
								</center>
							</div>
							<div class="col-md-6" style="background-color: grey;">
								<center>
									<h5>Keluar</h5>
									<h6 class="card-text"><?= $keluar[$i]; ?></h6>
								</center>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="card-group">
			<?php for ($i=4; $i < 7; $i++) {  ?>					
				<div class="card">
					<div class="card-body">
						<p class="card-title"><b><?= $claim[$i]; ?></b></p>
						<div class="row mt-4">
							<div class="col-md-6" style="background-color: whitesmoke;">
								<center>
									<h5>Masuk</h5>
									<h6 class="card-text"><?= $masuk[$i]; ?></h6>
								</center>
							</div>
							<div class="col-md-6" style="background-color: grey;">
								<center>
									<h5>Keluar</h5>
									<h6 class="card-text"><?= $keluar[$i]; ?></h6>
								</center>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
