<?= $this->include('components/navbar') ?>
<?php $session = session();
$errors = $session->getFlashdata('errors');
$success = $session->getFlashData('success');
?>
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

    tr td:last-child {
        width: 1% !important;
        white-space: nowrap !important;
    }
</style>
<section>

    <div class="card w3-animate-bottom">
        <div class="container-fluid ">

            <div class="row ">
                <ul class="mr-auto">
                    <a href="index">Kembali</a>
                </ul>
                <ul class="ml-auto mr-4">
                    <a href="transaksi">Halaman Pembayaran</a>
                </ul>

            </div>

        </div>
        <?php if ($errors != null) : ?>
            <div class="ml-5 alert-danger text-center rounded" id="alert" style="width: 300px;">
                <?php echo $success  ?>
            </div>
        <?php endif ?>
        <?php if ($success != null) :  ?>
            <div class="ml-5 alert-success text-center rounded" id="alert" style="width: 300px;">
                <?php echo $success  ?>
            </div>
        <?php endif  ?>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 text-center mt-5">
                    <img class="img-fluid" src="<?= site_url('assets/img/uploads/foto') . '/' . $gas->foto ?>" alt="" width="150px">
                    <p class="mt-3"><?= $gas->nama ?></p>

                </div>
                <div class="col-md-8 mt-3">
                    <ul>
                        <b> Data Pribadi</b>
                        <hr>
                        <li>Nama : <?= $gas->nama ?></li>
                        <li>Alamat : <?php if ($gas->alamat == NULL) {
                                            echo "Belum ada data";
                                        } else {
                                            echo $gas->alamat;
                                        } ?></li>
                        <li>Nomer Telepon : <?php if ($gas->nomer_telepon == NULL) {
                                                echo "Belum ada data";
                                            } else {
                                                $gas->nomer_telepon;
                                            }  ?></li>
                        <li>Email : <?= $gas->email  ?></li>
                        <hr>
                        <button class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Update Profil</button>
                        <button class="btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal2">Ganti foto profil</button>
                    </ul>
                </div>
            </div>
            <div class="mt-5">
                <h4 class="text-center ">Rekap Transaksi Anda</h4>
                <hr>
                <table>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Total Pembayaran</th>
                        <th>Status </th>
                        <th>Qty</th>
                        <th>Pilihan</th>
                    </tr>
                    <?php foreach ($transaksi as $a) :  ?>
                        <tr>
                            <td><?= $a->nama_barang ?></td>
                            <td>Rp. <?= $a->harga * $a->jumlah ?></td>
                            <td><?= $a->status ?></td>
                            <td><?= $a->jumlah ?></td>

                            <td>
                                <a href="hapus/<?= $a->id_transaksi ?>" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach  ?>
                </table>
                <br>

            </div>
        </div>
    </div>

</section>


<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pengguna" method="POST" enctype="multipart/form-data">
                    <label for="">Nama Pengguna</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $gas->nama ?>">
                    <label for="" class="mt-2">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $gas->email ?>">
                    <label for="" class="mt-2">Alamat Pengguna</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $gas->alamat ?>" placeholder="Alamat">
                    <label for="" class="mt-2">Nomer Telepon</label>
                    <input type="number" class="form-control" name="nomer_telepon" placeholder="Nomer Telepon" value="<?= $gas->nomer_telepon ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pengguna" method="POST" enctype="multipart/form-data">
                    <label for="">Foto Pengguna</label>
                    <input type="file" name="foto">
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $gas->nama ?>" hidden>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('components/scripts') ?>