<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Halaman Login'
        ];
        return view('Auth/Pages/login', $data);
    }

    public function login_post()
    {
        $usernameoremail = $this->request->getPost('usernameoremail');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getByEmailOrUsername($usernameoremail);

        if ($user && password_verify($password, $user['user_password'])) {

            $sessionData = [
                'user_id' => $user['user_id'],
                'user_level' => $user['user_level'],
                'logged_in' => true
            ];

            $session = session();
            $session->set($sessionData);

            return redirect()->to('/admin');
        } else {
            $session = session();
            $session->setFlashdata('login_error', 'Email/Username atau Password salah.');

            return redirect()->to('/login');
        }
    }

    public function cekSessionUsers()
    {
        $session = session();

        if ($session->has('user_id')) {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Login Page'
        ];

        return view('Auth/Pages/login', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/admin');
    }
    //--------------------------------------------------------------------

}
