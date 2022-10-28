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
						<a href="/daftarproduk/tambah" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>
							Tambah
						</a>

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
										<th>Nama Produk</th>
										<th>Kategori</th>
										<th>Tanggal Input</th>
										<th>Fungsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ( $daftar_produk as $produk ) : ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $produk->nama_produk; ?></td>
											<td><?php echo $produk->kategori_slug; ?></td>
											<td><?php echo date('d/m/Y H:i:s', strtotime($produk->tanggal_input)) ?></td>
											<td width="20%" class="text-center">
												<a href="" class="btn btn-secondary btn-sm" ><i class="fas fa-eye"></i>Detail</a>
												<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalUbah<?php echo $produk->id_produk ?>"><i class="fas fa-edit"></i> Edit</button>
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?php echo $produk->id_produk ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
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
<?php echo $this->endSection() ?>