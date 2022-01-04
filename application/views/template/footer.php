           <!-- Footer -->
           <footer class="sticky-footer bg-primary text-white">
           	<div class="container my-auto">
           		<div class="copyright text-center my-auto">
           			<span>Copyright &copy; Asabri Website 2021</span>
           		</div>
           	</div>
           </footer>
           <!-- End of Footer -->

           </div>
           <!-- End of Content Wrapper -->

           </div>
           <!-- End of Page Wrapper -->

           <!-- Scroll to Top Button-->
           <a class="scroll-to-top rounded" href="#page-top">
           	<i class="fas fa-angle-up"></i>
           </a>

           <?php
			$t = 0;
			if ($total == null) {
				$t += 1;
			} else {
				$t = $total->no_urut + 1;
			}

			var_dump($total);
			$data['total'] = $t;


			$data['masuk'] = $getdata;
			$data['claim'] = $claim;

			$data['keluar'] = $getdata;
			if ($this->uri->segment(2) == "keluar") {
				$this->load->view('keluar/modal', $data);
			} else if ($this->uri->segment(2) == "masuk" || $this->uri->segment(2) == "yanggan") {
				$this->load->view('masuk/modal', $data);
			} else {
				$this->load->view('user/modal');
			}

			?>
           <!-- Logout Modal-->
           <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           	<div class="modal-dialog" role="document">
           		<div class="modal-content">
           			<div class="modal-header">
           				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
           				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
           					<span aria-hidden="true">×</span>
           				</button>
           			</div>
           			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
           			<div class="modal-footer">
           				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           				<a class="btn btn-primary" href="<?= base_url('Auth/logout') ?>">Logout</a>
           			</div>
           		</div>
           	</div>
           </div>

           <!-- Bootstrap core JavaScript-->
           <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
           <script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

           <!-- Core plugin JavaScript-->
           <script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

           <!-- Custom scripts for all pages-->
           <script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>

           <!-- dataTable -->
           <script src="<?= base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
           <script src="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

           <!-- toast -->
           <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

           <script>
           	$(document).ready(() => {
           		$('#myTable').DataTable();
           		<?php if (isset($_SESSION['toast'])) { ?>
           			toastr.options.closeButton = true;
           			var toastvalue = "<?php echo $_SESSION['toast'] ?>";
           			var status = toastvalue.split(":")[0];
           			var message = toastvalue.split(":")[1];
           			if (status === "success") {
           				toastr.success(message, status);
           			} else if (status === "error") {
           				toastr.error(message, status);
           			} else if (status == "warn") {
           				toastr.warning(message, status);
           			}
           		<?php } ?>
           	});

           	$('#jns').change(function() {
           		var jenis_klaim = $(this).val();
           		console.log(jenis_klaim);
           		$.ajax({
           			url: "<?= base_url('Dashboard/get_norutK') ?>",
           			data: {
           				"jenis_klaim": jenis_klaim
           			}, // change this to send js object
           			type: "post",
           			dataType: "JSON",
           			success: function(res) {
           				let urut = 1;

           				if (res != null) {
           					urut += parseInt(res.no_urut);
           				}
           				console.log(urut);
           				document.getElementById("norut").value = urut;
           			},
           			error: function(res) {
           				console.error(res);
           				// alert("You Must Be Logged In to Do That")
           			}
           		});
           	});

           	$('#jnsM').change(function() {
           		var jenis_klaim = $(this).val();
           		console.log(jenis_klaim);
           		$.ajax({
           			url: "<?= base_url('Dashboard/get_norutM') ?>",
           			data: {
           				"jenis_klaim": jenis_klaim
           			}, // change this to send js object
           			type: "post",
           			dataType: "JSON",
           			success: function(res) {
           				let urut = 1;

           				if (res != null) {
           					urut += parseInt(res.no_urut);
           				}
           				console.log(urut);
           				document.getElementById("norut").value = urut;
           			},
           			error: function(res) {
           				console.error(res);
           				// alert("You Must Be Logged In to Do That")
           			}
           		});
           	});
           </script>

           </body>

           </html>
