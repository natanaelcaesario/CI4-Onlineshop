<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>
<style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: grey;
        color: white;
    }
</style>
<div class="container-fluid">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Nama Barang</th>
                <th>Total Pembayaran</th>
                <th>Status Pembayran</th>
                <th>Alamat Pengiriman</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semua as $a) :  ?>
                <tr>
                    <td><?= $a->nama  ?></td>
                    <td><?= $a->nama_barang  ?></td>
                    <td>Rp. <?= $a->jumlah * $a->harga  ?></td>
                    <td><?= $a->status  ?></td>
                    <td><?= $a->alamat_pengiriman  ?></td>
                    <td><a href="transaksipengguna/<?= $a->id_transaksi ?>" class="btn btn-secondary">Lihat Transaksi</a></td>
                </tr>
            <?php endforeach  ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>