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
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok barang</th>
                <th>Deskripsi</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomer = 1;
            foreach ($semua as $a) :  ?>
                <tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $a->nama_barang ?></td>
                    <td><?= $a->harga ?></td>
                    <td><?= $a->stok_barang ?></td>
                    <td><?= $a->deskripsi ?></td>
                    <td>
                        <a href="hapusprod/<?= $a->id_barang ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="editprod/<?= $a->id_barang ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            <?php endforeach  ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>