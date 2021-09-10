<?php

namespace App\Controllers;


class Home extends BaseController
{
	protected $penggunaModel;
	protected $pengguna;
	protected $barangModel;
	protected $barang;
	protected $transaksiModel;
	protected $transaksi;
	protected $db;
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->penggunaModel = model('App\Models\PenggunaModel');
		$this->pengguna = new \App\Entities\Pengguna();
		$this->barangModel = new \App\Models\BarangModel();
		$this->barang = new \App\Entities\Barang();
		$this->transaksiModel = new \App\Models\TransaksiModel();
		$this->transaksi = new \App\Entities\Transaksi();
	}
	// pengguna
	public function pengguna()
	{
		$user = session()->get();
		$id = session()->get("id");
		if (!session()->has("login")) {
			return redirect()->to(site_url('login'));
		}
		$title = "Online Shop";
		$gas = $this->penggunaModel->find($user["id"]);
		$db = \Config\Database::connect();
		$gasken = $db->query("SELECT * FROM transaksi INNER JOIN barang ON  transaksi.id_barang = barang.id_barang WHERE id_pengguna = '$id'");
		$transaksi = $gasken->getResult();
		$pengguna = new \App\Entities\Pengguna();

		if ($this->request->getPost()) {
			$data = $this->request->getPost();
			$pengguna->fill($data);
			if ($this->request->getFile("foto")) {
				$file = $this->request->getFile("foto");
				$pengguna->foto = $file;
				$update = $this->penggunaModel->update($user["id"], $pengguna);
			}
			$update = $this->penggunaModel->update($user["id"], $pengguna);
			if ($update) {
				session()->setFlashdata('success', 'Berhasil update data');
				return redirect()->to(site_url('pengguna'));
			}
		}
		return view('dashboard/pengguna', ['title' => $title, 'user' => $user, 'gas' => $gas, 'transaksi' => $transaksi]);
	}
	public function index()
	{
		$barang = $this->barangModel->findAll();
		$user = session()->get();
		$title = "Online Shop";
		return view('go', ['title' => $title, 'user' => $user, 'barang' => $barang]);
	}
	public function transaksi()
	{
		if (!session()->has("login")) {
			return redirect()->to(site_url('login'));
		}
		$user = session()->get();
		$id = $user["id"];

		$gasken = $this->db->query("SELECT * FROM transaksi INNER JOIN barang ON  transaksi.id_barang = barang.id_barang WHERE id_pengguna = '$id'");
		$semua = $gasken->getResult();
		if ($semua == NULL) {
			session()->setFlashdata('success', 'silahkan membeli barang terlebih dahulu');
			return redirect()->to(site_url('index'));
		}
		$title = "Online Shop";
		return view('dashboard/transaksipengguna', ['title' => $title, 'semua' => $semua]);
	}
	public function transaksipengguna()
	{
		$id = $this->request->uri->getSegment(2);
		$gasken = $this->db->query("SELECT * FROM transaksi JOIN barang ON transaksi.id_barang = barang.id_barang JOIN pengguna ON transaksi.id_pengguna = pengguna.id where id_transaksi = '$id'");
		$result = $gasken->getResult();
		if ($this->request->getPost()) {
			$data = $this->request->getPost();
			$this->transaksi->fill($data);
			$transaksi = $this->transaksiModel->update($id, $this->transaksi);
			if ($transaksi) {
				session()->setFlashdata('success', 'Data berhasil diupdate');
				return redirect()->to(site_url('semuatransaksi'));
			}
		}
		return view('admin/transaksipengguna', ['result' => $result]);
	}
	public function beli()
	{
		if (!session()->has("login")) {
			return redirect()->to(site_url('login'));
		}
		$user = session()->get();
		if ($this->request->getPost()) {
			$data = $this->request->getPost();
			$this->transaksi->fill($data);
			$save = $this->transaksiModel->save($this->transaksi);
			if ($save) {
				session()->setFlashdata('success', 'Berhasil menambah barang');
				return redirect()->to(site_url('transaksi'));
			}
		}
		$id = $this->request->uri->getSegment(2);
		$cari = $this->barangModel->find($id);
		$title = "Online Shop";
		return view('dashboard/beli', ['title' => $title, 'cari' => $cari, 'user' => $user]);
	}

	public function hapus()
	{
		$id = $this->request->uri->getSegment(2);
		$hapus = $this->transaksiModel->delete($id);
		return redirect()->to(base_url('transaksi'));
	}
	public function buktibayar()
	{
		$id = $this->request->uri->getSegment(2);
		$title = "Bukti Pembayaran";
		if ($this->request->getFile("bukti")) {
			$data = $this->request->getPost();
			$bukti = $this->request->getFile("bukti");
			$this->transaksi->bukti = $bukti;
			$this->transaksi->status = "Pembayaran Diproses";
			$update = $this->transaksiModel->update($id, $this->transaksi);
			if ($update) {
				session()->setFlashdata('success', 'Berhasil mengupdate data produk');
				return redirect()->to(site_url('transaksi'));
			}
		}
		return view('dashboard/buktibayar', ['id' => $id, 'title' => $title]);
	}




	//--------------------------------------------------------------------

}
