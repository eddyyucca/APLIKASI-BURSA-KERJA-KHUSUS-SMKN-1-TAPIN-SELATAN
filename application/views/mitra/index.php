<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card-body">
		<div class="card shadow mb-4">
			<div class="card-header">
				Info
			</div>
			<div class="card-body">

				<div class="row">
					<!-- mulai -->

					<!-- mulai -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-info shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pencari Kerja</div>
									</div>
									<div class="col-auto">
										<?= $jumlah_alumni ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-info shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Lowongan</div>
									</div>
									<div class="col-auto">
										<?=
										$no = $jumlah_lowongan; ?>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Content Row -->
				</div>
			</div>


			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->
	</div>

	<div class="card-body">
		<div class="card shadow mb-4">
			<div class="card-header">
				Event
			</div>
			<div class="card-body">

				<div class="row">
					<!-- mulai -->

					<!-- mulai -->
					<?php foreach ($data_event as $x) { ?>


						<div class="col-xl-6 col-md-6 mb-4">
							<div class="card border-left-info shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?= $x->nama_event ?></div>
										</div>
										<div class="col-6">
											<?= $x->tanggal_event ?> <br> Sampai <br> <?= $x->akhir_event ?><br>
											Lokasi : <?= $x->tempat ?> <br>
											Ket : <?= $x->keterangan_event ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- Content Row -->
				</div>
			</div>


			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->
	</div>
</div>
