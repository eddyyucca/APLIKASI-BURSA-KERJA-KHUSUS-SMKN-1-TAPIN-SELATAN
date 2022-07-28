<body class="bg-gradient-primary">
	<div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="2000" data-pause="true">
		<div class="container">
			<!-- Begin Page Content -->
			<div class="container col-8">
				<!-- Page Heading -->
				<div class="card">
					<div class="card-header">
						<a href="<?= base_url('auth') ?>"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="container-fluid">
								<?= validation_errors() ?>
								<form action="<?= base_url('user/update_alumni/' . $data->telpon)  ?>" method="POST" enctype="multipart/form-data">
									<table class="table">
										<tr>
											<td width=20%>Alamat</td>
											<td><input type="text" name="nama_alumni" value="<?= $data->nama_alumni ?>" class="form-control" required placeholder="Nama Lengkap"></td>
										</tr>
										<tr>
											<td width=20%>Tanggal Lahir</td>
											<td><input type="date" name="tgl_lahir" value="<?= $data->tgl_lahir ?>" class="form-control" required placeholder="Tanggal Lahir"></td>
										</tr>
										<tr>
											<td>Agama</td>
											<td> <select class="form-control" name="agama">
													<option value="">--AGAMA--</option>
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Budha</option>
													<option value="Konghucu">Konghucu</option>
												</select></td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td> <select class="form-control" name="jk">
													<option value="">--JENIS KELAMIN--</option>
													<option value="1">Laki-Laki</option>
													<option value="2">Perempuan</option>
												</select></td>
										</tr>
										<tr>
											<td width=20%>Pendidikan Terakhir</td>
											<td><input type="text" name="pendidikan_t" value="<?= $data->pendidikan_t ?>" class="form-control" required placeholder="Pendidikan Terakhir"></td>
										</tr>
										<tr>
											<td width=20%>Alamat</td>
											<td><input type="text" name="alamat" value="<?= $data->alamat ?>" class="form-control" required placeholder="Alamat"></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><input type="email" name="email" value="<?= $data->email ?>" class="form-control" required placeholder="Email"></td>
										</tr>
										<tr>
											<td>Telpon</td>
											<td><input type="text" name="telpon" value="<?= $data->telpon ?>" class="form-control" required placeholder="telpon"></td>
										</tr>
										<tr>
											<td>Tahun Lulus</td>
											<td><input type="text" name="tahun_lulus" value="<?= $data->tahun_lulus ?>" class="form-control" required placeholder="Tahun Lulus"></td>
										</tr>
										<tr>
											<td>Jurusan SMK</td>
											<td><select name="jurusan_smk" class="form-control">
													<option value="">--PILIH JURUSAN--</option>
													<?php foreach ($jurusan as $jur) { ?>
														<option value="<?= $jur->id_jurusan ?>"><?= $jur->nama_jurusan ?></option>
													<?php } ?>
												</select></td>
										</tr>

										<tr>
											<td>Tinggi Badan</td>
											<td><input type="text" name="tbadan" value="<?= $data->tbadan ?>" class="form-control" required placeholder="Tinggi Badan"></td>
										</tr>
										<tr>
											<td>Berat Badan</td>
											<td><input type="text" name="bbadan" value="<?= $data->bbadan ?>" class="form-control" required placeholder="Tinggi Badan"></td>
										</tr>
										<tr>
											<td>Ciri-ciri fisik Badan</td>
											<td><textarea class="form-control" name="ciriciri" id="" cols="30" rows="10"></textarea><?= $data->ciriciri ?></td>
										</tr>
										<tr>
											<td>Nama Akun Facebook</td>
											<td><input type="text" name="fb" value="<?= $data->fb ?>" class="form-control" required placeholder="Facebook"></td>
										</tr>

										<tr>
											<td>Status Pekerjaan</td>
											<td><select name="statuskerja" class="form-control">
													<option value="">--PILIH STATUS--</option>

													<option value="Bekerja">Bekerja</option>
													<option value="Belum Bekerja">Belum Bekerja</option>

												</select></td>
										</tr>

										<tr>
											<td>Foto</td>
											<td>
												<input type="file" name="foto" class="file" accept="image/*">
											</td>
										</tr>
										<tr>
											<td>
												<button class="btn btn-primary">Simpan</button>
											</td>
											<td></td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
