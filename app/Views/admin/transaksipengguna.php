<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 order-2 text-left ">
            <div class="card">
                <div class="card-body">
                    <h4>Informasi Pembeli</h4>
                    <p>Silahkan mengisikan status untuk memberikan pesan kepada pengguna tentang pembayaran</p>
                    <hr>
                    <?php foreach ($result as $a) :  ?>
                        <p class="text-black" style="font-size: 15px;"><b>Nama : <?= $a->nama ?><br>
                                Alamat : <?= $a->alamat ?><br>
                                Total Transaksi : <?= $a->harga * $a->jumlah ?><br>
                                Jumlah Barang Dibeli : <?= $a->jumlah ?><br>
                                Nama Barang : <?= $a->nama_barang ?></b></p>
                        <form action="<?= current_url() ?>" method="POST">
                            <input type="text" class="form-control mt-4" value="<?= $a->status ?>" name="status">
                            <br>
                            <button class="btn btn-primary" type="submit">Update Transaksi Pengguna</button>
                            <a class="btn btn-danger" href="<?= site_url('hapus') . '/' . $a->id_transaksi ?>">Hapus Transaksi</a>
                        </form>
                    <?php endforeach  ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center order-1 mb-2">
            <h4 class="text-center">Bukti Pemabayaran</h4>
            <hr>
            <img src="<?= site_url('assets/img/uploads/bukti_bayar/') . '/' . $a->bukti ?>" class="img-card-top" alt="" width="250px" height="350">
        </div>


    </div>
</div>

<?= $this->endSection() ?>