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

    @media only screen and (max-width: 600px) {
        p {
            visibility: hidden;
        }

        img {
            visibility: hidden;
        }

        table {
            margin-top: -400px
        }
    }
</style>

<div class="container mt-5">

    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="index" class="text-secondary">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
    </ol>


    <div class="card">

        <div class="card-body">
            <div class="row ">
                <div class="col-lg-4">
                    <img src="<?= site_url('assets/img/icon.svg') ?>" alt="" height="300" width="300">
                </div>
                <div class="col-lg-8 mt-5 text-center">
                    <p>Selamat Datang dihalaman pembayaran pengguna silahkan menyelesaikan pembayaran anda.
                        Jika ada pertanyaan anda bisa hubungi admin melalui fitur yang disediakan

                    </p>
                </div>

            </div>
            <table>
                <tr>
                    <th>Nama Barang </th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Pilihan</th>
                </tr>

                <?php foreach ($semua as $a) :  ?>
                    <tr>
                        <td><?= $a->nama_barang ?></td>
                        <td><?= $a->alamat_pengiriman ?></td>
                        <td id="status"><?= $a->status ?></td>
                        <td><?= $a->jumlah ?></td>
                        <td>Rp. <?= $a->jumlah * $a->harga ?></td>
                        </td>
                        <td>

                            <?php if ($a->status == "Belum Bayar") {  ?>
                                <a class="btn-sm" id="buktibayar" href="buktibayar/<?= $a->id_transaksi ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            <?php } else if ($a->status == "Pembayaran Diproses") { ?>

                            <?php } else if ($a->status == "Lunas") { ?>

                            <?php } else { ?>
                                <a class="btn-sm" id="buktibayar" href="buktibayar/<?= $a->id_transaksi ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            <?php }  ?>
                            <a class="btn-sm btn-danger" href="hapus/<?= $a->id_transaksi ?>"><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                <?php endforeach  ?>
            </table>
        </div>
    </div>
    <br>
    <a href="pengguna">Lihat Profil</a>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?= $this->include('components/scripts') ?>