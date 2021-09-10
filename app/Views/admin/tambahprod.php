<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>
<style>
    footer {
        display: none;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" src="<?= site_url('assets/img/gambar.svg') ?>" alt="" width="400px">

                    <h4 class="text-center mt-3"><b class="text-black ">Halaman Tambah Produk</b></h4>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tenetur quis fugiat ducimus alias error consequuntur dolores repudiandae molestiae natus, accusantium numquam magni atque ad, iste nulla consequatur iure velit.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 mt-4">

            <form action="tambah" class="form-group" method="POST" enctype="multipart/form-data">
                <label for="">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" required>
                <label for="">Total Stok</label>
                <input type="text" class="form-control" name="stok_barang" required>
                <label for="">Harga</label>
                <input type="text" class="form-control" name="harga" required>
                <hr>
                <b>Informasi Tambahan</b>
                <hr>
                <br>
                <textarea name="deskripsi" id="" class="form-control" required></textarea>
                <br>
                <label for="">Gambar Produk </label>
                <br>
                <input type="file" name="gambar" required>
                <hr>
                <button class="btn btn-primary">Tambah Produk</button>
            </form>


        </div>

    </div>

</div>

<?= $this->endSection() ?>