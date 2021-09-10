<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>
<div class="container-fluid text-center mx-auto" style="margin-top: 15%;">
    <h3 class="text-center text-secondary">Selamat Datang Diaplikasi Onlineshop</h3>
    <p>Silahkan klik tombol lanjutkan untuk menambahkan barang dan klik tombol barang untuk lihat data barang</p>
    <div class="row">
        <div class="col-lg-12">
            <a href="tambah" class="btn btn-primary">Lanjutkan</a>
            <a href="produk" class="btn btn-info">Barang</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>