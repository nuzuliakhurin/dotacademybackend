<div class="main-content">
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Data Hijab-ku</h3>
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
							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_hijab">Tambah Hijab</button>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Hijab</th>
										<th>Kategori</th>
										<th>Deskripsi</th>
										<th>Harga</th>
										<th>Stok</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no=1;
									foreach ($hijab as $h) {
										echo'
										<tr>
										<td>'.$no.'</td>
										<td>'.$h->nama_hijab.'</td>
										<td>'.$h->nama_kategori.'</td>
										<td>'.$h->deskripsi.'</td>
										<td>'.$h->harga.'</td>
										<td>'.$h->stok.'</td>
										<td><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_hijab" onclick="prepare_ubah_hijab('.$h->id_hijab.')">Ubah</a>
										<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_hijab" onclick="prepare_hapus_hijab('.$h->id_hijab.')">hapus</a></td>
										</tr>';
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
</div>

<!-- modal -->
<div id="modal_tambah_hijab" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Koleksi Hijab</h4>
			</div>
			<form action="<?= base_url('index.php/hijab/tambah');?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="text" class="form-control" placeholder="Nama Hijab" name="nama_hijab">
					<br>
					<select name="kategori" class="form-control">
						<?php
						foreach ($kategori as $k) {
							echo'
							<option value="'.$k->id_kategori.'">'.$k->nama_kategori.'</option>
							';
						}
						?>
					</select>
					<br>
					<input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi">
					<br>
					<input type="text" class="form-control" placeholder="Harga" name="harga">
					<br>
					<input type="text" class="form-control" placeholder="Stok" name="stok">
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

<div id="modal_ubah_hijab" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah Data Hijab</h4>
			</div>
			<form action="<?php echo base_url('index.php/hijab/ubah'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="ubah_id_hijab" id="ubah_id_hijab">
					<input type="text" class="form-control" name="ubah_nama_hijab" id="ubah_nama_hijab">
					<br>
					<select name="ubah_kategori" id="ubah_kategori" class="form-control">
						<?php
							foreach ($kategori as $k) {
								echo '
									<option value="'.$k->id_kategori.'">'.$k->nama_kategori.'</option>
								';
							}
						?>
					</select>
					<br>
					<input type="text" class="form-control" name="ubah_deskripsi" id="ubah_deskripsi">
					<br>
					<input type="text" class="form-control" name="ubah_harga" id="ubah_harga">
					<br>
					<input type="text" class="form-control" name="ubah_stok" id="ubah_stok">
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal_hapus_hijab" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi hapus data</h4>
			</div>
			<form action="<?php echo base_url('index.php/hijab/hapus'); ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="hapus_id_hijab" id="hapus_id_hijab">
					<p>Apakah anda yakin akan menghapus data hijab <b><span id="hapus_nama_hijab"></span></b> ?</p>
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
	function prepare_ubah_hijab(id) 
	{
		$("#ubah_id_hijab").empty();
		$("#ubah_nama_hijab").empty();
		$("#ubah_kategori").val();
		$("#ubah_deskripsi").empty();
		$("#ubah_harga").empty();
		$("#ubah_stok").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/hijab/get_hijab_by_id/' + id, function(data){
			$("#ubah_id_hijab").val(data.id_hijab);
			$("#ubah_nama_hijab").val(data.nama_hijab);
			$("#ubah_kategori").val(data.id_kategori);
			$("#ubah_deskripsi").val(data.deskripsi);
			$("#ubah_harga").val(data.harga);
			$("#ubah_stok").val(data.stok);
		});
	}

	function prepare_hapus_hijab(id) {
		$("#hapus_id_hijab").empty();
		$("#hapus_nama_hijab").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/hijab/get_hijab_by_id/' +id, function(data){
			$("#hapus_id_hijab").val(data.id_hijab);
			$("#hapus_nama_hijab").text(data.nama_hijab);
		});
	}
</script>