<?php echo $this->extend('admin/layout/template') ?>

<?php echo $this->section('style') ?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php echo $this->endSection(); ?>


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
						<div class="swal" data-swal="<?php echo session('success') ?>"></div>

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
												<a href="/daftarproduk/detail/<?php echo $produk->id_produk ?>" class="btn btn-secondary btn-sm" ><i class="fas fa-eye"></i>Detail</a>

												<a href="/daftarproduk/edit/<?php echo $produk->id_produk ?>" class="btn btn-success btn-sm "><i class="fas fa-edit"></i>
													Edit
												</a>
												<button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?php echo $produk->id_produk; ?>')"><i class="fas fa-trash-alt"></i> Hapus</button>
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

<?php echo $this->section('script') ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

	const swal = $('.swal').data('swal');

	if(swal) {
		Swal.fire({
			icon: 'success',
			title: 'Berhasil',
			text: swal,
			showConfirmButton: true,
		})
	}

	function hapus(id_produk){
		Swal.fire({
			title: 'Hapus?',
			text: "Yakin data produk akan dihapus ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			$.ajax({
				type: 'POST',
				url: '/daftarproduk/delete',
				data: {
					_method: 'delete',
					<?php echo csrf_token() ?>: "<?= csrf_hash() ?>",
					id_produk: id_produk
				},
				dataType: 'json',
				success: function(response){
					if(response.success){
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: response.success,
							showConfirmButton: true,
						}).then((result) => {
							if (result.value) {
								window.location.href = "daftarproduk";
							}
						});
					}
				}
			})
			// if (result.isConfirmed) {
			// 	Swal.fire(
			// 		'Deleted!',
			// 		'Your file has been deleted.',
			// 		'success'
			// 		)
			// }
		})
	}
</script>
<?php echo $this->endSection() ?>