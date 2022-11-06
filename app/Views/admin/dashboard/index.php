<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Produk Teknologi : <?php echo $produk_teknologi ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/daftarproduk">Daftar Produk</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Produk Digital Marketing : <?php echo $digital_marketing ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/daftarproduk">Daftar Produk</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Produk Ekonomi : <?php echo $produk_ekonomi ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/daftarproduk">Daftar Produk</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Produk Data Server : <?php echo $data_server ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/daftarproduk">Daftar Produk</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Produk Terbaru
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
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
                        <?php $no= 1 ?>
                        <?php foreach ( $data_produk as $produk ) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $produk->nama_produk; ?></td>
                                <td><?php echo $produk->kategori_slug; ?></td>
                                <td><?php echo $produk->tanggal_input; ?></td>
                                <td width="10%" class="text-center">
                                    <a href="/daftarproduk/detail/<?php echo $produk->id_produk ?>" class="btn btn-secondary btn-sm" ><i class="fas fa-eye"></i>Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>
<?= $this->endSection() ?>

