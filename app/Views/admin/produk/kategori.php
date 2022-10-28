<?php echo $this->extend('admin/layout/template') ?>

<?php echo $this->section('content') ?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4"><?php echo $title ?></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
			<li class="breadcrumb-item active">Kategori Produk</li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table mr-1"></i>
						Kategori Produk
					</div>
					<div class="card-body">
						<button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i>
							Tambah
						</button>

						<!-- alert tambah kategori -->
						<?php if(session('success')) : ?>
							<div class="alert alert-success" role="alert">
								<?php echo session('success'); ?>
							</div>
						<?php endif; ?>

						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kategori</th>
										<th>Tanggal Input</th>
										<th>Fungsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ( $daftar_kategori as $kategori ) : ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $kategori->nama_kategori; ?></td>
											<td><?php echo date('d/m/Y H:i:s', strtotime($kategori->tanggal_input)) ?></td>
											<td width="15%" class="text-center">
												<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalUbah<?php echo $kategori->id_kategori ?>"><i class="fas fa-edit"></i> Edit</button>
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?php echo $kategori->id_kategori ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Kategori Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/daftarkategori/tambah" method="post">
					<?php echo csrf_field(); ?>

					<div class="mb-3">
						<label for="nama_kategori">Nama Kategori</label>
						<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary btn-sm">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php foreach ( $daftar_kategori as $kategori ) : ?>
	<!-- Modal Edit -->
	<div class="modal fade" id="modalUbah<?php echo $kategori->id_kategori ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Kategori Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/daftarkategori/edit/<?php echo $kategori->id_kategori ?>" method="post">
						<?php echo csrf_field(); ?>

						<input type="hidden" name="_method" value="PUT">

						<div class="mb-3">
							<label for="nama_kategori">Nama Kategori</label>
							<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required value="<?php echo $kategori->nama_kategori ?>">

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


<?php foreach ( $daftar_kategori as $kategori ) : ?>
	<!-- Modal Hapus -->
	<div class="modal fade" id="modalHapus<?php echo $kategori->id_kategori ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger text-white">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Hapus Kategori Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/daftarkategori/hapus/<?php echo $kategori->id_kategori ?>" method="post">
						<?php echo csrf_field(); ?>

						<input type="hidden" name="_method" value="DELETE">

						<p>Yakin data kategori produk : <?php echo $kategori->nama_kategori ?> akan dihapus ??</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php endforeach ?>

<?php echo $this->endSection() ?>