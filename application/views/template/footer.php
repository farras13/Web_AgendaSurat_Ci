            </div>
            </div>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <!-- jquery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <!-- Core theme JS-->
            <script src="<?= base_url() ?>assets/js/scripts.js"></script>
            <!-- dataTable -->
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
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

				$('#tm').on('click', function() {            		
            		if (this.value !=  "Surat Masuk Ekternal" || this.value == null) {
						$('.perihalM').hide().find(':input').attr('required', false);
					} else{
						$('.perihalM').show().find(':input').attr('required', true);
					}
            	});

            	$('#jnsKlaim').on('change', function() {            		
            		if (this.value !=  "Surat Masuk Ekternal" || this.value == null) {
						$('.perihalM').hide().find(':input').attr('required', false);
					} else{
						$('.perihalM').show().find(':input').attr('required', true);
					}
            	});
            </script>

            </body>

            </html>
