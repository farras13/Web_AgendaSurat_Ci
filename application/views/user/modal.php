<div class="modal fade" id="addModaluser" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Surat Masuk Adum</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Auth/pros_reg') ?>" method="post">
					<div class="form-group">
						<label for="nosur">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="Email">Email</label>
						<input type="email" class="form-control" id="Email" name="Email" placeholder="Email@email.com">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-control">
							<option value="0">admin</option>
							<option value="1">user</option>
						</select>
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
