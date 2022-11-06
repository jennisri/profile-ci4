<?php echo $this->extend('admin/layout/template') ?>

<?php echo $this->section('content') ?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4"><?php echo $title ?></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
			<li class="breadcrumb-item active">Data Team</li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table mr-1"></i>
						Data Team
					</div>
					<div class="card-body">


						<!-- alert tambah tambah produk -->
						<?php if(session('success')) : ?>
							<div class="alert alert-success" role="alert">
								<?php echo session('success'); ?>
							</div>
						<?php endif; ?>

						<!-- alert tambah tambah produk -->
						<?php if(session('failed')) : ?>
							<div class="alert alert-danger" role="alert">
								<?php echo session('failed'); ?>
							</div>
						<?php endif; ?>

						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Facebook</th>
										<th>Instagram</th>
										<th>Gambar</th>
										<th>Fungsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ( $data_team as $team ) : ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $team->nama; ?></td>
											<td><?php echo $team->jabatan; ?></td>
											<td><?php echo $team->fb; ?></td>
											<td><?php echo $team->ig; ?></td>
											<td><img src="/assets-admin/img/<?php echo $team->gambar_team; ?>" alt="" width="20%"></td>
											<td width="15%" class="text-center">
												<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalUbah<?php echo $team->id_team ?>"><i class="fas fa-edit"></i> Edit</button>
											</td>
										</tr>

									<?php endforeach ?>
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

<?php foreach ( $data_team as $team ) : ?>
	<!-- Modal Edit -->
	<div class="modal fade" id="modalUbah<?php echo $team->id_team ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit team Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/team/edit/<?php echo $team->id_team ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="gambar_lama" value="<?php echo $team->gambar_team ?>">

						<div class="mb-3">
							<label for="nama">Nama</label>
							<input type="text" name="nama" id="nama" class="form-control <?php echo ($validation->hasError('nama')) ? 'is-invalid' : null ; ?>" required value="<?php echo $team->nama ?>">
							<?php if ($validation->hasError('nama')): ?>
								<div class="invalid-feedback">
									<?php echo $validation->getError('nama') ?>

								</div>
							<?php endif ?>

						</div>

						<div class="mb-3">
							<label for="jabatan">Jabatan</label>
							<input type="text" name="jabatan" id="jabatan" class="form-control <?php echo ($validation->hasError('jabatan')) ? 'is-invalid' : null ; ?>" required value="<?php echo $team->jabatan ?>">
							<?php if ($validation->hasError('jabatan')): ?>
								<div class="invalid-feedback">
									<?php echo $validation->getError('jabatan') ?>

								</div>
							<?php endif ?>

						</div>

						<div class="mb-3">
							<label for="fb">Link Facebook</label>
							<input type="text" name="fb" id="fb" class="form-control <?php echo ($validation->hasError('fb')) ? 'is-invalid' : null ; ?>" required value="<?php echo $team->fb ?>">
							<?php if ($validation->hasError('fb')): ?>
								<div class="invalid-feedback">
									<?php echo $validation->getError('fb') ?>

								</div>
							<?php endif ?>

						</div>

						<div class="mb-3">
							<label for="ig">Link Instagram</label>
							<input type="text" name="ig" id="ig" class="form-control <?php echo ($validation->hasError('ig')) ? 'is-invalid' : null ; ?>" required value="<?php echo $team->ig ?>">
							<?php if ($validation->hasError('ig')): ?>
								<div class="invalid-feedback">
									<?php echo $validation->getError('ig') ?>

								</div>
							<?php endif ?>

						</div>


						<div class="mb-3">
							
							<label for="gambar_team">Foto</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input <?php echo ($validation->hasError('gambar_team')) ? 'is-invalid' : null ; ?>" id="gambar_team<?php echo $team->id_team ?>" name="gambar_team" onchange="previewImg<?php echo $team->id_team ?>()">

								<?php if ($validation->hasError('gambar_team')): ?>
									<div class="invalid-feedback">
										<?php echo $validation->getError('gambar_team') ?>

									</div>
								<?php endif ?>

								<label class="custom-file-label" for="gambar_team" name="gambar_team">Pilih gambar</label>

								<div class="col-sm-3">
									<img src="/assets-admin/img/<?php echo $team->gambar_team ?>" class="img-preview<?php echo $team->id_team ?> img-thumbnail mt-2" alt="">
								</div>
							</div>
						</div>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary btn-sm">Ubah</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php endforeach ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('script'); ?>
<?php foreach ( $data_team as $team ) : ?>
	<script>
		function previewImg(){
			const sampul = document.querySelector('#gambar_team<?php echo $team->id_team ?>');
			// const sampulLabel = document.querySelector('.custom-file-label');
			const imgPreview = document.querySelector('.img-preview<?php echo $team->id_team ?>');

			sampulLabel.textContent = sampul.files[0].name;

			const fileSampul = new FileReader();
			fileSampul.readAsDataURL(sampul.files[0]);

			fileSampul.onload = function(e) {
				imgPreview.src = e.target.result;
			}
		}

	</script>

<?php endforeach ?>
<?php echo $this->endSection(); ?>
