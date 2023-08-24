<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<div class="card card-body mx-3 mx-md-4 mt-3">
    <div class="table-responsive">
        <div class="container">
            <table class="table" id="userTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nomor WhatsApp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) :
                        $no = 1; ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user['user_nama']; ?></td>
                            <td><?= $user['user_username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['no_wa']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $user['user_id']; ?>">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $user['user_id']; ?>">Delete</button>
                            </td>
                        </tr>
                        <!-- Modal for Delete Confirmation -->
                        <div class="modal fade" id="deleteModal<?= $user['user_id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus users: <?= $user['user_nama']; ?> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <?php if ($user['user_level'] !== 'administrator') : ?>
                                            <a href="<?= base_url("admin/users/delete/{$user['user_id']}"); ?>" class="btn btn-danger">Hapus</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal for Edit User -->
                        <div class="modal fade" id="editModal<?= $user['user_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="users" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Pengguna</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1"><?= $user['user_nama']; ?></span>
                                                <input type="text" class="form-control" name="user_nama" placeholder="Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1"><?= $user['user_username']; ?></span>
                                                <input type="text" class="form-control" name="user_username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1"><?= $user['email']; ?></span>
                                                <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1"><?= $user['no_wa']; ?></span>
                                                <input type="text" class="form-control" name="no_wa" placeholder="No Wa" aria-label="No Wa" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1"><?= $user['facebook']; ?></span>
                                                <input type="text" class="form-control" name="facebook" placeholder="Link Facebook" aria-label="Link Facebook" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1"><?= $user['tweeter']; ?></span>
                                                <input type="text" class="form-control" name="twitter" placeholder="Link Twitter" aria-label="Link Twitter" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1"><?= $user['instagram']; ?></span>
                                                <input type="text" class="form-control" name="instagram" placeholder="Link Instagram" aria-label="Link Instagram" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1"><?= $user['keterangan']; ?></span>
                                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" aria-label="Keterangan" aria-describedby="basic-addon1">
                                            </div>
                                            <small> Kosongkan jika password tidak diubah!</small>
                                            <div class="input-group input-group-dynamic mb-4">
                                                <span class="input-group-text" id="basic-addon1">Password</span>
                                                <input type="text" class="form-control" name="user_password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<link href="<?= base_url('assets/DataTables/datatables.min.css'); ?>" rel="stylesheet">
<script src="<?= base_url('assets/DataTables/datatables.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>

<?= $this->endSection(); ?>