<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'pages' => 'Dashboard'
        ];
        return view('Admin/Pages/Dashboard', $data);
    }

    public function profile()
    {
        $userId = session('user_id');

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        $data = [
            'pages' => 'Profile',
            'user' => $user
        ];
        return view('Admin/Pages/Profile', $data);
    }

    public function getUserData()
    {
        $userId = session('user_id');

        if (!$userId) {
            echo "User id tidak ditemukan dalam session.";
            return;
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if ($user) {
            $data = [
                'user' => $user
            ];
            return view('Admin/Pages/Profile', $data);
        } else {
            echo "Data user tidak ditemukan.";
        }
    }

    public function editProfile($userId)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($userId);

        return view('admin/edit_profile', $data); // Ganti dengan nama view yang sesuai
    }

    public function updateProfile()
    {
        $userId = $this->request->getPost('user_id');
        $data = [
            'user_nama' => $this->request->getPost('nama'),
            'no_wa' => $this->request->getPost('no_wa'),
            'email' => $this->request->getPost('email'),
            'facebook' => $this->request->getPost('facebook'),
            'tweeter' => $this->request->getPost('tweeter'),
            'instagram' => $this->request->getPost('instagram'),
            'user_username' => $this->request->getPost('username'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $userModel = new UserModel();
        $userModel->updateUserProfile($userId, $data);

        return redirect()->to(base_url("admin/user/edit/{$userId}"));
    }

    //--------------------------------------------------------------------

}
