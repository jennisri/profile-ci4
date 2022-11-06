<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>

        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                <?php echo $title ?>
            </div>
            <div class="card-body">

                <a href="/register" class="btn btn-primary mb-4"><i class="fas fa-user-plus"></i>Registrasi</a>

                <?php if (session('success')): ?>
                   <div class="alert alert-success">
                       <?php echo session('success'); ?>
                   </div>
               <?php endif ?>


               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Tanggal Registrasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ( $data_user as $user ) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $user->email ?></td>
                                <td><?php echo $user->username ?></td>
                                <td><?php echo $user->created_at ?></td>
                                <td class="text-center" width="15%">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubahModal<?php echo $user->id; ?>">
                                       <i class="fas fa-edit"></i> Edit
                                   </button>

                                   <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?php echo $user->id; ?>">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
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

<?php foreach ( $data_user as $user ) : ?>
    <!-- Modal -->
    <div class="modal fade" id="ubahModal<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i>Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('akun/ubah/'.$user->id); ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $user->email ?>" required>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo $user->username ?>" required minlength="3">
            </div>

            <a href="/forgot">Reset Password</a>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-success btn-sm">Ubah</button>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
</div>

<?php endforeach ?>


<?php foreach ( $data_user as $user ) : ?>
    <!-- Modal -->
    <div class="modal fade" id="hapusModal<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i>HapusData Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('akun/hapus/'.$user->id); ?>
            <input type="hidden" name="_method" value="DELETE">
            <p>Yakin data akun : <?php echo $user->username ?> Akan dihapus?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
</div>

<?php endforeach ?>


<?= $this->endSection() ?>

