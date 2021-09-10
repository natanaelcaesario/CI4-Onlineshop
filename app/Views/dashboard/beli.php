<?= $this->include('components/navbar') ?>
<style>
    nav {
        visibility: hidden;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;

    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;

    }

    .form-control-inline {
        max-width: 60;
        width: auto;
        display: inline;
    }

    tr td:last-child {
        width: 1% !important;
        white-space: nowrap !important;
    }

    .active {
        color: #64a19d !important;
    }

    .number {
        width: 150px !important;
    }
</style>

<div class="container mt-5">

    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="<?= site_url('index') ?>" class="text-secondary">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pembelian</li>
    </ol>


    <div class="card">

        <div class="card-body">
            <div class="row ">
                <div class="col-lg-4">
                    <img src="<?= site_url('assets/img/icon.svg') ?>" alt="" height="300" width="300">
                </div>
                <div class="col-lg-7 mt-5 ">
                    <b>Deskripsi Produk : </b>
                    <p><?= $cari->deskripsi ?></p>
                    <p>Harga Barang: Rp. <?= $cari->harga ?></p>
                    <p>Stok Barang: <span class="text-success">Tersedia</span></p>
                    <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
                        <input type="text" value="<?= $cari->id_barang ?>" name="id_barang" required hidden>
                        <input type="text" value="<?= $user["id"] ?>" name="id_pengguna" required hidden>
                        <input type="text" class="form-control mt-1 mb-1" placeholder="Alamat" name="alamat_pengiriman" required>
                        <input type="number" class="form-control number mt-1" placeholder="Jumlah Barang" name="jumlah" required>
                        <hr>
                        <p class="text-right">
                            <button class="btn btn-primary" type="submit">Lanjut Transaksi</button>
                        </p>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <br>
    <a href="<?= site_url('pengguna') ?>">Lihat Profil</a>
</div>