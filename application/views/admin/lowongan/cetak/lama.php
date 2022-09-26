<div class="container-fluid">
	<!-- Page Heading -->
	<table>
		<tr align="left">
			<th rowspan="2"><img src="<?= base_url('assets/cop.png') ?>" width="100%">
			</th>
		</tr>
	</table>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h1 class="m-0 font-weight-bold ">Lowongan Lama</h1>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<hr>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Lowongan</th>
							<th>Perusahaan/Instansi</th>
							<th>Mulai Pendaftaran</th>
							<th>Batas Waktu</th>
							<th>Rincian Lowongan</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<?php if ($x->batas_tanggal > date('Y-m-d')) {
							} else { ?>
								<tr>
									<td><?= $nomor++; ?></td>
									<td><?= $x->nama_lowongan; ?></td>
									<td><?= $x->nama_mitra; ?></td>
									<td><?= $x->date_mulai; ?></td>
									<td><?= $x->batas_tanggal; ?></td>
									<td><?= $x->isi_lowongan; ?></td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
				<table style="float:right" border="0">
					<?php
					function tanggal_indo($tanggal, $cetak_hari = false)
					{
						$hari = array(
							1 =>    'Senin',
							'Selasa',
							'Rabu',
							'Kamis',
							'Jumat',
							'Sabtu',
							'Minggu'
						);

						$bulan = array(
							1 =>   'Januari',
							'Februari',
							'Maret',
							'April',
							'Mei',
							'Juni',
							'Juli',
							'Agustus',
							'September',
							'Oktober',
							'November',
							'Desember'
						);
						$split 	  = explode('-', $tanggal);
						$tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

						if ($cetak_hari) {
							$num = date('N', strtotime($tanggal));
							return $hari[$num] . ', ' . $tgl_indo;
						}
						return $tgl_indo;
					}
					?>
					<tr align="right">
						<br><br>
						<td align="right" colspan="11">Tapin Selatan, <?= tanggal_indo(date('Y-m-d')) ?> <br>
							<img src=" <?= base_url('assets/ttd.png') ?>" width="60%"><br>
							Rahman Ajie Tetuko, S.Pd
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	window.print()
</script>
