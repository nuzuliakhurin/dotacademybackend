<div class="main-content">
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Kategori Hijab-ku</h3>
				<?php
					$notif = $this->session->flashdata('notif');
					if ($notif !=NULL) {
						echo '
						<div class="alert alert-danger">'.$notif.'</div>
						';
					}
				?>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_kategori">Tambah Kategori Hijab</button>
						</div>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Kategori</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								foreach ($kategori as $k) {
									echo '
									<tr>
									<td>'.$no.'</td>
									<td>'.$k->nama_kategori.'</td>
									<td><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_kategori" onclick="prepare_ubah_kategori('.$k->id_kategori.')">Ubah</a>
									<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_kategori" onclick="prepare_hapus_kategori('.$k->id_kategori.')">hapus</a></td>
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
<div id="modal_tambah_kategori" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Kategori Hijab</h4>
			</div>
			<form action="<?= base_url('index.php/kategori/tambah');?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="text" class="form-control" placeholder="Kategori" name="nama_kategori">
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

<div id="modal_ubah_kategori" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah Kategori Hijab</h4>
			</div>
			<form action="<?php echo base_url('index.php/kategori/ubah'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="ubah_id_kategori" id="ubah_id_kategori">
					<input type="text" class="form-control" name="ubah_nama_kategori" id="ubah_nama_kategori">
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal_hapus_kategori" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi hapus data</h4>
			</div>
			<form action="<?php echo base_url('index.php/kategori/hapus'); ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="hapus_id_kategori" id="hapus_id_kategori">
					<p>Apakah anda yakin akan menghapus kategori hijab <b><span id="hapus_nama_kategori"></span></b> ?</p>
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
	function prepare_ubah_kategori(id) 
	{
		$("#ubah_id_kategori").empty();
		$("#ubah_nama_kategori").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/kategori/get_data_kategori_by_id/' + id, function(data){
			$("#ubah_id_kategori").val(data.id_kategori);
			$("#ubah_nama_kategori").val(data.nama_kategori);
		});
	}

	function prepare_hapus_kategori(id) {
		$("#hapus_id_kategori").empty();
		$("#hapus_nama_kategori").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/kategori/get_data_kategori_by_id/' +id, function(data){
			$("#hapus_id_kategori").val(data.id_kategori);
			$("#hapus_nama_kategori").text(data.nama_kategori);
		});
	}
</script>