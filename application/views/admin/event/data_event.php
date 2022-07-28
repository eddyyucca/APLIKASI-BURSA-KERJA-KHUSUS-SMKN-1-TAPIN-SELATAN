<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold ">Tabel Data Bidang</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<div class="container">
					<a href="<?= base_url('admin/tambah_event_baru') ?>" class="btn btn-primary">Buat Event Baru</a>
					<hr>
				</div>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Event</th>
							<th>Tanggal Acara</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<tr>
								<td><?= $nomor++; ?></td>
								<td><?= $x->nama_event ?></td>
								<td><?= $x->tanggal_event ?></td>
								<td>
									<a href="<?= base_url('admin/edit_event/') . $x->id_event; ?>" class="btn btn-primary">Edit</a>
									<a href="<?= base_url('admin/hapus_event/') . $x->id_event; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
