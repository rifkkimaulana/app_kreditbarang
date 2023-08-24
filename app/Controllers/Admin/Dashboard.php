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

    public function users()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data = [
            'pages' => 'Users',
            'users' => $users
        ];
        return view('Admin/Pages/Users', $data);
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

    public function updateProfile()
    {
        $userId = $this->request->getPost('user_id');

        // Initialize the data array
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

        $photo = $this->request->getFile('photo');

        if ($photo->isValid()) {
            $newPhotoName = $photo->getRandomName();
            if ($photo->move(ROOTPATH . 'public/img/', $newPhotoName)) {
                $data['user_foto'] = $newPhotoName;
            } else {
                echo "File upload failed.";
            }
        } else {
            echo "Invalid file.";
        }

        // Remove empty values from the data array
        $data = array_filter($data);

        if (!empty($data)) {
            $userModel = new UserModel();
            $userModel->updateUserProfile($userId, $data);
        }

        return redirect()->to(base_url("admin/profile"));
    }

    public function updateUsers()
    {
        $userId = $this->request->getPost('user_id');

        $data = [
            'user_nama' => $this->request->getPost('user_nama'),
            'user_username' => $this->request->getPost('user_username'),
            'no_wa' => $this->request->getPost('no_wa'),
            'email' => $this->request->getPost('email'),
            'facebook' => $this->request->getPost('facebook'),
            'tweeter' => $this->request->getPost('tweeter'),
            'instagram' => $this->request->getPost('instagram'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $data = array_filter($data, function ($value) {
            return $value !== null && $value !== '';
        });

        if (!empty($data)) {
            $userModel = new UserModel();
            $userModel->updateUserProfile($userId, $data);
        }

        return redirect()->to(base_url("admin/users"));
    }

    public function delete($userId)
    {
        if (!is_numeric($userId)) {
            return redirect()->back()->with('error', 'Invalid user ID');
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $userModel->delete($userId);

        return redirect()->to(base_url('admin/users'))->with('success', 'User deleted successfully');
    }
    //--------------------------------------------------------------------

}
