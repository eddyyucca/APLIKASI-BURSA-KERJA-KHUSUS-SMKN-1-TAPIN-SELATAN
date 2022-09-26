<!-- Begin Page Content -->
<div class="container col-8">

	<!-- Page Heading -->
	<div class="card">
		<div class="card-header">
			<a href="<?= base_url('admin/jurusan') ?>"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="container-fluid">
					<?= validation_errors() ?>
					<form action="<?= base_url('admin/proses_input_event')  ?>" method="POST">
						<div class="form-group">
							<label for="inputItem">Nama Event</label>
							<input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Nama Event">
						</div>
						<div class="form-group">
							<label for="inputItem">Tanggal Event</label>
							<input type="date" class="form-control" id="nama_event" name="tanggal_event">
						</div>
						<div class="form-group">
							<label for="inputItem">Akhir Event</label>
							<input type="date" class="form-control" id="nama_event" name="akhir_event">
						</div>
						<div class="form-group">
							<label for="inputItem">Tempat Event</label>
							<input type="text" class="form-control" id="tempat" placeholder="Tempat Event" name="tempat">
						</div>
						<div class="form-group">
							<label for="inputItem">Keterangan</label>
							<textarea class="form-control" name="keterangan_event" rows="5"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
