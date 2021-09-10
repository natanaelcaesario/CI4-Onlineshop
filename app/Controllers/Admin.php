<?php

namespace App\Controllers;


class Admin extends Home
{
    // admin
    public function index()
    {
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $title = "Online Shop";
        return view('admin/dashboard', ['title' => $title]);
    }
    public function tambah()
    {
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $gambar = $this->request->getFile("gambar");
            $this->barang->fill($data);
            $this->barang->gambar = $gambar;
            $save = $this->barangModel->save($this->barang);
            if ($save) {
                return redirect()->to(site_url('produk'));
            }
        }
        return view('admin/tambahprod');
    }
    public function update()
    {
        if ($this->request->getFile("gambar")) {
            $data = $this->request->getPost();
            $gambar = $this->request->getFile("gambar");
            $this->barang->fill($data);
            $this->barang->gambar = $gambar;
            $update = $this->barangModel->update($data["id"], $this->barang);
            if ($update) {
                session()->setFlashdata('success', 'Berhasil mengupdate data produk');
                return redirect()->to(site_url('produk'));
            }
        }
        // update
        if ($this->request->getPost("update")) {
            $data = $this->request->getPost();
            $this->barang->fill($data);
            $update = $this->barangModel->update($data["id"], $this->barang);
            if ($update) {
                session()->setFlashdata('success', 'Berhasil mengupdate data produk');
                return redirect()->to(site_url('produk'));
            }
        }
    }
    public function rekap()
    {
        $gasken = $this->db->query("SELECT * FROM transaksi JOIN barang ON transaksi.id_barang = barang.id_barang JOIN pengguna ON transaksi.id_pengguna = pengguna.id");
        $result = $gasken->getResult();
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        return view('admin/rekap', ['result' => $result]);
    }
    public function produk()
    {
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $semua = $this->barangModel->findAll();
        return view('admin/listprod', ['semua' => $semua]);
    }
    public function hapusprod()
    {
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(2);
        $hapus = $this->barangModel->delete($id);
        if ($hapus) {
            session()->setFlashdata('success', 'Berhasil menghapus data yang anda inginkan');
            return redirect()->to(site_url('produk'));
        }
    }
    public function editprod()
    {
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(2);
        $cari = $this->barangModel->find($id);
        return view('admin/editproduk', ['cari' => $cari]);
    }
    public function login()
    {
        if (session()->has('admin')) {
            return redirect()->to(site_url('dashboard'));
        }
        if ($this->request->getPost()) {
            $login = $this->request->getPost();
            $admin = new \App\Models\Admin();
            $cari = $admin->where('username', $login["username"])->first();
            if ($cari) {
                if ($cari["password"] == $login["password"]) {
                    $ses_data = [
                        'id' => $cari["id"],
                        'nama' => $cari["username"],
                        'admin' => TRUE,
                    ];
                    session()->set($ses_data);
                    session()->setFlashdata('success', 'Berhasil login');
                    return redirect()->to(site_url('dashboard'));
                }
            } else {
                session()->setFlashdata('errors', 'Gagal Login');
            }
        }
        return view('admin/login');
    }
    public function allpengguna()
    {
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        return view('admin/listpengguna');
    }

    public function alltrans()
    {
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $db = \Config\Database::connect();
        $gasken = $db->query("SELECT * FROM transaksi JOIN barang ON  transaksi.id_barang = barang.id_barang JOIN pengguna ON pengguna.id = transaksi.id_pengguna");
        $semua = $gasken->getResult();

        return view('admin/transaksi', ['semua' => $semua]);
    }
    public function logout()
    {
        return redirect()->to(site_url('logout'));
    }
}
