<div class="main-content">
	<div class="cotainer-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3>Data Admin Hijab-ku</h3>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_admin">Tambah Admin</button>
						</div>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Email</th>
									<th>Username</th>
									<th>Password</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								foreach ($admin as $a ) {
									echo'
									<tr>
									<td>'.$no.'</td>
									<td>'.$a->email.'</td>
									<td>'.$a->username.'</td>
									<td>'.$a->password.'</td>
									<td><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_admin" onclick="prepare_ubah_admin('.$a->id_admin.')">Ubah</a>
									<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_admin" onclick="prepare_hapus_admin('.$a->id_admin.')">hapus</a></td>
									</tr>
									';
									$no++;
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- modal -->
<div id="modal_tambah_admin" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Admin</h4>
			</div>
			<form action="<?= base_url('index.php/admin/tambah');?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="text" class="form-control" placeholder="Email" name="email">
					<br>
					<input type="text" class="form-control" placeholder="Username" name="username">
					<br>
					<input type="password" class="form-control" placeholder="Password" name="password">
					<br>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal_ubah_admin" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah data admin</h4>
			</div>
			<form action="<?php echo base_url('index.php/admin/ubah'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="ubah_id_admin" id="ubah_id_admin">
					<input type="text" class="form-control" name="ubah_email" id="ubah_email">
					<br>
					<input type="text" class="form-control" name="ubah_username" id="ubah_username">
					<br>
					<input type="password" class="form-control" name="ubah_password" id="ubah_password">
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal_hapus_admin" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi hapus data</h4>
			</div>
			<form action="<?php echo base_url('index.php/admin/hapus'); ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="hapus_id_admin" id="hapus_id_admin">
					<p>Apakah anda yakin akan menghapus data admin <b><span id="hapus_username"></span></b> ?</p>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="Ya">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function prepare_ubah_admin(id) 
	{
		$("#ubah_id_admin").empty();
		$("#ubah_email").empty();
		$("#ubah_username").empty();
		$("#ubah_password").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/admin/get_data_admin_by_id/' + id, function(data){
			$("#ubah_id_admin").val(data.id_admin);
			$("#ubah_email").val(data.email);
			$("#ubah_username").val(data.username);
			$("#ubah_password").val(data.password);
		});
	}

	function prepare_hapus_admin(id) {
		$("#hapus_id_admin").empty();
		$("#hapus_username").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/admin/get_data_admin_by_id/' +id, function(data){
			$("#hapus_id_admin").val(data.id_admin);
			$("#hapus_username").text(data.username);
		});
	}
</script>