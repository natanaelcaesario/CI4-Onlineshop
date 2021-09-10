<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>
<?php $session = session();
$errors = $session->getFlashdata('errors');
$success = $session->getFlashData('success');
?>
<style>
    .gambar {
        transform: rotate(20deg);
        margin-top: -100px !important
    }

    .gambar:hover {
        transform: rotate(-20deg);
        -webkit-transition-duration: 1s;
    }

    .gambar:not(hover) {
        transform: rotate(10deg);
        -webkit-transition-duration: 1s;
    }

    .card-img-top:hover {
        width: 350px;
        -webkit-transition-duration: 1s;
    }

    .card-img-top:not(hover) {
        width: -350px;
        -webkit-transition-duration: 0.25s;
    }

    .content:hover {
        font-size: 90px;
        -webkit-transition-duration: 1s;
    }

    .content:not(hover) {
        font-size: -90px;
        -webkit-transition-duration: 1s;
    }
</style>

<!-- About-->
<section class="about-section text-center w3-animate-opacity" id="about">
    <?php if ($success != null) :  ?>
        <div class="alert alert-success " id="alert" style="width: 300px;">
            <?php echo $success  ?>
        </div>
    <?php endif  ?>
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 mx-auto">

                <h2 class="text-white mb-4 content"> <?php if (session()->has('login')) {  ?>
                        Hallo <?= $user["nama"] ?>
                    <?php } else { ?>
                        Shop And Wear
                    <?php }  ?>
                </h2>
                <p class="text-white-50">
                    Selamat datang dionline shop sepatu online silahkan melihat produk yang kami sediakan.

                    Kami menyediakan produk terbaik bagi anda
                </p>
            </div>
        </div>

        <img class="img-fluid gambar" src="<?= site_url('assets/img/shoe3.png') ?>" alt="" />

    </div>
</section>
<section class="bg-light p-3" id="projects">
    <div class="container-fluid p-5">
        <!-- Project One Row-->
        <div class="row mb-5 mb-lg-0 ">
            <?php foreach ($barang as $a) :  ?>
                <div class="col-lg-4 mb-2">
                    <div class=" mx-auto text-center ">
                        <img class="card-img-top" src="<?= site_url('assets/img/uploads/barang') . '/' . $a->gambar ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $a->nama_barang ?></h5>
                            <h5 class="card-title">Stok Barang: <?= $a->stok_barang ?></h5>
                            <p class="card-text "><b>Rp. <?= $a->harga ?></b> <br><span class="text-left"><?= $a->deskripsi ?></span></p>
                            <a href="beli/<?= $a->id_barang ?>" class="btn btn-dark">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach  ?>
        </div>

    </div>
</section>

<?= $this->endSection() ?>