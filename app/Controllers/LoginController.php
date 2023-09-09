<?php

namespace App\Controllers;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function __construct(){
        $this->validation = \Config\Services::validation();
        $this->user = new UserModel();
    }
    public function index()
    {
        $session = session();
        if ($session->has('id_user')) {
            // Jika belum login, arahkan ke halaman login
            return redirect()->to(base_url('dashboard/admin'));
        }

        $data = [
            'title' => 'Login Koskuy',
        ];
        
        return view('auth/login', $data);
    }

    public function login(){
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->user->where('username', $username)->first();

        if (!$user) {
            session()->setFlashdata('error', 'Username atau password salah!');
            return redirect()->to(base_url('login'));
        }
        
        if (!password_verify($password, $user->password)) {
            session()->setFlashdata('error', 'Username atau password salah!!');
            return redirect()->to(base_url('login'));
        }
        session()->set([
            'id_user' => $user->id,
            'username' => $user->username,
            'name' => $user->nama,
            'email' =>$user->email,
            'role' => $user->role,
        ]);
        // check role user
        switch ($user->role) {
        case 'admin':
            return redirect()->to(base_url('dashboard/admin'));
            break;
        case 'super':
            return "Hai";
            break;
        default:
        break;
    }
}
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
