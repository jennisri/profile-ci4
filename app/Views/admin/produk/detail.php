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
						Detail Produk : <?php echo $daftar_produk->nama_produk; ?>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<tr>
									<th width="20%">Nama Produk</th>
									<td><?php echo $daftar_produk->nama_produk ?></td>
								</tr>

								<tr>
									<th>Kategori</th>
									<td><?php echo $daftar_produk->kategori_slug ?></td>
								</tr>

								<tr>
									<th>Deskripsi</th>
									<td><?php echo $daftar_produk->deskripsi ?></td>
								</tr>

								<tr>
									<th>Gambar</th>
									<td><img src="/assets-admin/img/<?php echo $daftar_produk->gambar_produk ?>" alt="" width="20%"></td>
								</tr>

								<tr>
									<th>Tanggal Input</th>
									<td><?php echo date('d/m/Y | h:i:s', strtotime($daftar_produk->tanggal_input)) ?></td>
								</tr>


							</table>

							<div class="justify-content-end d-flex">
								<a href="/daftarproduk" class="btn btn-secondary mt-4">Kembali</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

<?php echo $this->endSection() ?>