<?php

namespace App\Controllers;

class Auth extends Home
{
    // auth
    public function register()
    {
        $title = "Register Pengguna";
        if (session()->has('login')) {
            return redirect()->to(site_url('index'));
        }
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $cari = $this->penggunaModel->where('email', $data["email"])->first();
            if ($cari) {
                session()->setFlashdata('errors', 'Gagal membuat akun, sepertinya anda sudah memiliki akun');
                return redirect()->to(site_url('register'));
            }
            $data =  $this->pengguna->fill($data);
            $save = $this->penggunaModel->save($data);
            if ($save) {
                session()->setFlashdata('success', 'Berhasil mendaftarkan akun');
                return redirect()->to(site_url('login'));
            }
        }
        return view('auth/register', ['title' => $title]);
    }
    public function login()
    {
        if (session()->has('login')) {
            return redirect()->to(site_url('index'));
        }
        $title = "Login Pengguna";
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $cari = $this->penggunaModel->where('email', $data["email"])->first();
            if (!$cari) {
                session()->setFlashdata('errors', 'Akun tidak tersedia');
                return redirect()->to(site_url('login'));
            }
            if ($cari->password == md5($data["password"])) {
                $ses_data = [
                    'id' => $cari->id,
                    'nama' => $cari->nama,
                    'email' => $cari->email,
                    'foto' => $cari->foto,
                    'alamat' => $cari->alamat,
                    'nomer_telepon' => $cari->nomer_telepon,
                    'login' => TRUE,
                ];
                session()->set($ses_data);
                session()->setFlashdata('success', 'Berhasil login');
                return redirect()->to(site_url('index'));
            } else {
                session()->setFlashdata('errors', 'Password anda salah');
            }
        }
        return view('auth/login', ['title' => $title]);
    }
    public function logout()
    {
        session()->get();
        session_destroy();
        session()->setFlashdata('success', 'Mohon login kembali');

        return redirect()->to(site_url('index'));
    }
}
