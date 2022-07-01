<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold ">Tabel Alumni</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<div class="container">

				</div>
				<?php if ($lapor == "gagal") { ?>
					<div class="alert alert-danger" role="alert">
						This is a danger alert—check it out!
					</div>
				<?php } else { ?>

				<?php  } ?>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Jurusan</th>
							<th>Tahun Lulus SMK</th>
							<th>Pendidikan Terakhir</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<tr>
								<td><?= $nomor++; ?></td>
								<td><?= $x->nama_alumni; ?></td>
								<td><?= $x->email; ?></td>
								<td><?= $x->nama_jurusan; ?></td>
								<td><?= $x->tahun_lulus; ?></td>
								<td><?= $x->pendidikan_t; ?></td>
								<td align="center">
									<a href="<?= base_url('admin/view_alumni/') . $x->telpon; ?>" class="btn btn-primary">View</a>
									<a href="<?= base_url('admin/terima_permintaan/') . $x->telpon; ?>" class="btn btn-success">Terima</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
