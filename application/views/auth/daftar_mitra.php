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
								<form action="<?= base_url('auth/tambah_mitra_baru')  ?>" method="POST" enctype="multipart/form-data">
									<table class="table">
										<tr>
											<td width=20%>Nama Mitra</td>
											<td><input type="text" name="nama_mitra" class="form-control" required placeholder="Nama Mitra"></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><input type="email" name="email_mitra" class="form-control" required placeholder="Email"></td>
										</tr>
										<tr>
											<td>Telpon</td>
											<td><input type="text" name="telpon_mitra" class="form-control" required placeholder="telpon"></td>
										</tr>

										<tr>
											<td>Logo Mitra</td>
											<td>
												<input type="file" name="logo_mitra" class="file" accept="image/*">
											</td>
										</tr>
										<tr>
											<td>Profil Mitra</td>
											<td>
												<textarea class="form-control" name="profil_mitra" rows="5"></textarea>
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
