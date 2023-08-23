<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<div class="page-header min-height-300 border-radius-xl" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
    <span class="mask  bg-gradient-primary  opacity-6"></span>
</div>
<div class="card card-body mx-3 mx-md-4 mt-n6">
    <div class="row gx-4 mb-2">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="<?= base_url('img/' . $user['user_foto']); ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    <?= $user['user_nama']; ?>
                </h5>
                <p class="mb-0 font-weight-normal text-sm">
                    <?= $user['user_level']; ?>
                </p>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#tab-app" role="tab">
                        <i class="material-icons text-lg position-relative">home</i>
                        <span class="ms-1">App</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#tab-setting" role="tab">
                        <i class="material-icons text-lg position-relative">settings</i>
                        <span class="ms-1">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-app" role="tab">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Platform Settings</h6>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Notifikasi Tagihan</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Pembaruan produk bulanan</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">Berlangganan newsletter</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; <?= $user['user_nama']; ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Whatsapp:</strong> &nbsp; <?= $user['no_wa']; ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= $user['email']; ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; <?= $user['country']; ?></li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="<?= $user['facebook']; ?>">
                                        <i class="fab fa-facebook fa-lg"></i>
                                    </a>
                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="<?= $user['tweeter']; ?>">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="<?= $user['instagram']; ?>">
                                        <i class="fab fa-instagram fa-lg"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Keterangan</h6>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                <?= $user['keterangan']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="tab-setting" role="tab">
            <form action="<?= base_url('admin/profile'); ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="card-body col-md-6 mx-auto">
                        <h6 class="mb-0">Edit Users</h6>
                        <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nama Lengkap : <?= $user['user_nama']; ?></label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">No Whatsapp : <?= $user['no_wa']; ?></label>
                            <input type="text" class="form-control" name="no_wa">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Email : <?= $user['email']; ?></label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Link Facebook : <?= $user['facebook']; ?></label>
                            <input type="text" class="form-control" name="facebook">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Link Twitter : <?= $user['tweeter']; ?></label>
                            <input type="text" class="form-control" name="tweeter">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Link Instagram : <?= $user['instagram']; ?></label>
                            <input type="text" class="form-control" name="instagram">
                        </div>
                    </div>
                    <div class="card-body col-md-5 mx-auto">
                        <h6 class="mb-0">Ubah Password</h6>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Username : <?= $user['user_username']; ?></label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Password :</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <small> Kosongkan kolom password jika tidak ingin diubah.</small>
                        <div class="input-group input-group-outline my-3">
                            <textarea type="text" class="form-control" name="keterangan"><?= $user['keterangan']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="bmd-label-floating">Ubah poto profil:</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        </div>
                    </div>
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>