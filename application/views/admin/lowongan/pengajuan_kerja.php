<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold ">Tabel Lowongan</h6>
		</div>
		<div class="card-body">
			<a href="<?= base_url('mitra/cek_ditolak') ?>" class="btn btn-success">Pelamar Ditolak</a>
			<a href="<?= base_url('mitra/cek_diterima') ?>" class="btn btn-success">Pelamar Diterima</a>
			<a href="<?= base_url('mitra/pengajuan_kerja') ?>" class="btn btn-success">Pelamar Diperiksa</a>
			|
			<a href="<?= base_url('mitra/pelamar_ditolak') ?>" class="btn btn-primary">Cetak Pelamar Ditolak</a>
			<a href="<?= base_url('mitra/pelamar_diterima') ?>" class="btn btn-primary">Cetak Pelamar Diterima</a>
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Lowongan</th>
							<th>Perusahaan/Instansi</th>
							<th>Nama Pemohon</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<tr>
								<td><?= $nomor++; ?></td>
								<td><?= $x->nama_lowongan; ?></td>
								<td><?= $x->nama_mitra; ?></td>
								<td><?= $x->nama_alumni; ?></td>
								<td align="center">
									<a href="<?= base_url('mitra/lihat_pelamar/' . $x->telpon) ?>" class="btn btn-danger">Lihat Pelamar</a>
									<a href="<?= base_url('mitra/tolak/' . $x->id_lamaran) ?>" class="btn btn-primary">Tolak Pelamar</a>
									<a href="<?= base_url('mitra/terima/' . $x->id_lamaran . "/" . $x->telpon . "/" . $x->nama_alumni) ?>" class="btn btn-success">Terima Pelamar</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
