<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>
<style>
    .footer {
        visibility: hidden;
    }
</style>
<div class="container-fluid mt-5 text-center ">
    <div class="card shadow mx-auto" style="width: 400px;">
        <div class="card-body">
            <h3>Silahkan upload bukti pembayaran anda</h3>

            <form action="<?= current_url() ?>" method="POST" enctype="multipart/form-data">
                <label for="">Bukti Bayar: </label>
                <input type="file" name="bukti">
                <input type="text" name="id_transaksi" value="<?= $id ?>" hidden>
                <br>
                <br>
                <button class="btn btn-primary" type="submit">Upload Bukti Pembayaran</button>
            </form>
        </div>
    </div>
</div>


<script>

</script>
<?= $this->endSection()  ?>