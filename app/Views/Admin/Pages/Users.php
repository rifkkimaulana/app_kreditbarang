<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<div class="card card-body mx-3 mx-md-4 mt-3>
<div class=" container">
    <table class="table">
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
            <!-- Loop through the user data and display each user's information -->
            <?php foreach ($users as $user) :
                $no = 1; ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $user['user_nama']; ?></td>
                    <td><?= $user['user_username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['no_wa']; ?></td>
                    <td>
                        <!-- Add edit and delete buttons with appropriate links -->
                        <a href="<?= base_url("admin/user/edit/{$user['user_id']}"); ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?= base_url("admin/user/delete/{$user['user_id']}"); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<?= $this->endSection(); ?>