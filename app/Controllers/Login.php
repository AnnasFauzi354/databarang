<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Jika sudah login, redirect ke halaman dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/barang');
        }

        return view('/pages/login');
    }
    public function process()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user di database
        $user = $this->userModel->where('username', $username)->first();

        if (!$user) {
            log_message('error', 'Login failed: User not found - ' . $username);
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }

        if (!password_verify($password, $user['password'])) {
            log_message('error', 'Login failed: Wrong password for user - ' . $username);
            return redirect()->back()->with('error', 'Password salah');
        }

        // Set session jika login berhasil
        $session = session();
        $session->set([
            'isLoggedIn' => true,
            'userId' => $user['id'],
            'username' => $user['username']
        ]);

        return redirect()->to('/barang')->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
