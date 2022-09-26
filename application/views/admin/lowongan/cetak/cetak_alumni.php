<?php
header("Content-type: application/vnd-ms-excel");
$date = date('Y-m-d');
header("Content-Disposition: attachment; filename=Data Alumni.xls");

?>
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h1 class="m-0 font-weight-bold ">Data Alumni</h1>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pemohon</th>
							<th>Jurusan SMK</th>
							<th>Pendidikan Terakhir</th>
							<th>Tahun Lulus SMK</th>
							<th>Tanggal Lahir</th>
							<th>Agama</th>
							<th>Telpon</th>
							<th>Alamat</th>
							<th>Curriculum Vitae</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<tr>
								<td><?= $nomor++; ?></td>

								<td><?= $x->nama_alumni; ?></td>
								<td><?= $x->nama_jurusan; ?></td>
								<td><?= $x->pendidikan_t; ?></td>
								<td><?= $x->tahun_lulus; ?></td>
								<td><?= $x->tgl_lahir; ?></td>
								<td><?= $x->agama; ?></td>
								<td><?= $x->telpon; ?></td>
								<td><?= $x->alamat; ?></td>

								<td align="center">
									<a href="http://localhost/bkk/kode/x/<?= (base64_encode($x->data_pdf)) ?>">Cek CV</a>
								</td>
							</tr>
						<?php } ?>
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
