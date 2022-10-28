<?php echo $this->extend('admin/layout/template') ?>

<?php echo $this->section('content') ?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4"><?php echo $title ?></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
			<li class="breadcrumb-item active">Daftar Produk</li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table mr-1"></i>
						Daftar Produk Produk
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

						<form action="/daftarproduk/save" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>

							<div class="row">
								<div class="mb-3 col-6">
									<label for="nama_produk">Nama Produk</label>
									<input type="text" name="nama_produk" id="nama_produk" class="form-control <?php echo $validation->hasError('nama_produk') ? 'is-invalid' : null ?>" value="<?php echo old('nama_produk'); ?>">

									<?php if ($validation->hasError('nama_produk')): ?>
										<div class="invalid-feedback">
											<?php echo $validation->getError('nama_produk') ?>

										</div>
									<?php endif ?>
								</div>

								<div class="mb-3 col-6">
									<label for="kategori_slug">Kategori</label>
									<select class="form-control <?php echo $validation->hasError('kategori_slug') ? 'is-invalid' : null ?>" name="kategori_slug" id="kategori_slug">
										<option value="" hidden>Pilih</option>
										<?php foreach ( $kategori_produk as $kategori) : ?>
											<?php if (old('kategori_slug') == $kategori->slug_kategori): ?>
												<option value="<?php echo $kategori->slug_kategori ?>" selected><?php echo $kategori->nama_kategori ?></option>
											<?php else : ?>
												<option value="<?php echo $kategori->slug_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
											<?php endif ?>
										<?php endforeach ?>
									</select>

									<?php if ($validation->hasError('kategori_slug')): ?>
										<div class="invalid-feedback">
											<?php echo $validation->getError('kategori_slug') ?>

										</div>
									<?php endif ?>
								</div>
							</div>

							<div class="row">
								<div class="mb-3 col-6">
									<label for="deskripsi">Deskripsi</label>
									<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control <?php echo $validation->hasError('deskripsi') ? 'is-invalid' : null ?>"><?php echo old('deskripsi') ?></textarea>


									<?php if ($validation->hasError('deskripsi')): ?>
										<div class="invalid-feedback">
											<?php echo $validation->getError('deskripsi') ?>

										</div>
									<?php endif ?>
								</div>

								<div class="mb-3 col-6">

									<label for="gambar_produk" class="col-sm-2 col-form-label">Gambar Produk</label>
									<div class="col-sm-10">
										<div class="custom-file">
											<input type="file" class="custom-file-input <?php echo ($validation->hasError('gambar_produk')) ? 'is-invalid' : null ; ?>" id="gambar_produk" name="gambar_produk" onchange="previewImg()">

											<?php if ($validation->hasError('gambar_produk')): ?>
												<div class="invalid-feedback">
													<?php echo $validation->getError('gambar_produk') ?>

												</div>
											<?php endif ?>

											<label class="custom-file-label" for="gambar_produk" name="gambar_produk">Pilih gambar</label>

											<div class="col-sm-3">
												<img src="" class="img-thumbnail img-preview mt-2" alt="">
											</div>
										</div>
									</div>
								</div>

								<div class="justify-content-end d-flex">
									<button class="btn btn-primary" type="submit">Tambah</button>

								</div>						
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
	<?php echo $this->endSection() ?>

	<?php echo $this->section('script'); ?>

	<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

	<script>
		CKEDITOR.replace( 'deskripsi' );
	</script>

	<script>
		function previewImg(){
			const sampul = document.querySelector('#gambar_produk');
			const sampulLabel = document.querySelector('.custom-file-label');
			const imgPreview = document.querySelector('.img-preview');

			sampulLabel.textContent = sampul.files[0].name;

			const fileSampul = new FileReader();
			fileSampul.readAsDataURL(sampul.files[0]);

			fileSampul.onload = function(e) {
				imgPreview.src = e.target.result;
			}
		}

	</script>
	<?php echo $this->endSection(); ?>