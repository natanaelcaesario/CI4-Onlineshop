<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>
<style>
    footer {
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-5 text-center mb-5">
            <div class="card shadow">
                <div class="card-header">Gmabar Produk</div>
                <div class="card-body">
                    <img class="card-img-top" src=" <?= site_url('assets/img/uploads/barang') . '/' . $cari->gambar ?>" alt="" width="300px">
                </div>
            </div>
            <hr>
            <h3 class="">Halaman Edit Produk</h3>
            <p>Silahkan Edit Produk anda dihalaman ini yaa!</p>
        </div>
        <div class="col-lg-7">
            <form action="<?= site_url('admin/update') ?>" class="form-group" method="POST">
                <label for="">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?= $cari->nama_barang ?>" required>
                <input type="text" class="form-control" name="update" value="<?= $cari->nama_barang ?>" required hidden>
                <input type="text" class="form-control" name="id" value="<?= $cari->id_barang ?>" required hidden>
                <label for="">Total Stok</label>
                <input type="text" class="form-control" name="stok_barang" value="<?= $cari->stok_barang ?>" required>
                <label for="">Harga</label>
                <input type="text" class="form-control" name="harga" value="<?= $cari->harga ?>" required>
                <label for="">Deskrispsi</label>
                <input name="deskripsi" id="" class="form-control" value="<?= $cari->deskripsi ?>" required></input>
                <hr>
                <button class="btn btn-primary" type="submit">Edit Data Produk</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" type="button">Ganti Gambar Produk</button>
            </form>


        </div>

    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Gambar Anda?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/update') ?>" method="POST" enctype="multipart/form-data">
                    <label for="">Gambar Produk </label>
                    <br>
                    <input type="text" class="form-control" name="id" value="<?= $cari->id_barang ?>" required hidden>
                    <input type="file" name="gambar" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Ganti Gambar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>