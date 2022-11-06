<?php echo $this->extend('admin/layout/template') ?>

<?php echo $this->section('content') ?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4"><?php echo $title ?></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
			<li class="breadcrumb-item active">Data Slider</li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table mr-1"></i>
						Data Slider
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
										<th>Judul Slider</th>
										<th>Deskripsi</th>
										<th>Gambar</th>
										<th>Tanggal Input</th>
										<th>Fungsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ( $data_slider as $slider ) : ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $slider->judul_slider; ?></td>
											<td><?php echo $slider->deskripsi; ?></td>
											<td><img src="/assets-admin/img/<?php echo $slider->gambar_slider; ?>" alt="" width="20%"></td>
											<td><?php echo date('d/m/Y H:i:s', strtotime($slider->tanggal_input)) ?></td>
											<td width="15%" class="text-center">
												<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalUbah<?php echo $slider->id_slider ?>"><i class="fas fa-edit"></i> Edit</button>
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?php echo $slider->id_slider ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
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


<?php foreach ( $data_slider as $slider ) : ?>
	<!-- Modal Edit -->
	<div class="modal fade" id="modalUbah<?php echo $slider->id_slider ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit slider Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/slider/edit/<?php echo $slider->id_slider ?>" method="post" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="gambar_lama" value="<?php echo $slider->gambar_slider ?>">

						<div class="mb-3">
							<label for="judul_slider">Nama slider</label>
							<input type="text" name="judul_slider" id="judul_slider" class="form-control <?php echo ($validation->hasError('judul_slider')) ? 'is-invalid' : null ; ?>" required value="<?php echo $slider->judul_slider ?>">
							<?php if ($validation->hasError('judul_slider')): ?>
								<div class="invalid-feedback">
									<?php echo $validation->getError('judul_slider') ?>

								</div>
							<?php endif ?>

						</div>

						<div class="mb-3">
							<label for="deskripsi">Deskrips</label>
							<textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control <?php echo ($validation->hasError('deskripsi')) ? 'is-invalid' : null ; ?>"><?php echo old('deskripsi', $slider->deskripsi) ?></textarea>

							<?php if ($validation->hasError('deskripsi')): ?>
								<div class="invalid-feedback">
									<?php echo $validation->getError('deskripsi') ?>

								</div>
							<?php endif ?>

						</div>

						<div class="mb-3">
							
							<label for="gambar_slider">Gambar Slider</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input <?php echo ($validation->hasError('gambar_slider')) ? 'is-invalid' : null ; ?>" id="gambar_slider<?php echo $slider->id_slider ?>" name="gambar_slider" onchange="previewImg<?php echo $slider->id_slider ?>()">

								<?php if ($validation->hasError('gambar_slider')): ?>
									<div class="invalid-feedback">
										<?php echo $validation->getError('gambar_slider') ?>

									</div>
								<?php endif ?>

								<label class="custom-file-label" for="gambar_slider" name="gambar_slider">Pilih gambar</label>

								<div class="col-sm-3">
									<img src="/assets-admin/img/<?php echo $slider->gambar_slider ?>" class="img-preview<?php echo $slider->id_slider ?> img-thumbnail mt-2" alt="">
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
<?php foreach ( $data_slider as $slider ) : ?>
	<script>
		function previewImg(){
			const sampul = document.querySelector('#gambar_slider<?php echo $slider->id_slider ?>');
			// const sampulLabel = document.querySelector('.custom-file-label');
			const imgPreview = document.querySelector('.img-preview<?php echo $slider->id_slider ?>');

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