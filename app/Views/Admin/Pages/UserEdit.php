<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<div class="card card-body mx-3 mx-md-4 mt-3">
    <div class="container">
        <h1>Edit User</h1>

        <form action="<?= base_url("admin/user/update/{$user['user_id']}"); ?>" method="POST">
            <!-- Form fields for editing user data go here -->
            <label for="user_nama">Nama:</label>
            <input type="text" id="user_nama" name="user_nama" value="<?= $user['user_nama']; ?>"><br>

            <label for="user_username">Username:</label>
            <input type="text" id="user_username" name="user_username" value="<?= $user['user_username']; ?>"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $user['email']; ?>"><br>

            <label for="no_wa">Nomor WhatsApp:</label>
            <input type="text" id="no_wa" name="no_wa" value="<?= $user['no_wa']; ?>"><br>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>