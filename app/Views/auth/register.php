<?= $this->extend('layout/login') ?>
<?= $this->section('content') ?>
<?php $session = session();
$errors = $session->getFlashdata('errors');
$success = $session->getFlashData('success');
?>

<div class="container mt-5">
    <form class="form-signin" method="POST" action="register" id="form">
        <div class="text-center mb-4">
            <div class="container mt-5 ">
                <?php if ($errors != null) : ?>
                    <div class="ml-auto alert alert-danger" role="alert" style="width: 300px;">
                        <?php echo $errors  ?>
                    </div>
                <?php endif ?>
                <?php if ($success != null) :  ?>
                    <div class="mr-auto alert alert-success" role="alert" style="width: 300px;">
                        <?php echo $success  ?>
                    </div>
                <?php endif  ?>
                <img class="mb-4" src="https://i.pinimg.com/originals/77/c3/66/77c366436d8bd35fe8b3ce5b8c66992e.png" alt="" width="90" height="90">
                <h1 class="h3 mb-3 font-weight-normal text-center">Halaman Register Pengguna</h1>
            </div>



        </div>
        <div class="form-label-group">
            <input type="text" name="nama" id="inputName" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputName">Nama Lengkap</label>
        </div>
        <div class="form-label-group">
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Alamat Email</label>
        </div>
        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required autocomplete>
            <label for="inputPassword">Password</label>
        </div>
        <div class="form-label-group">
            <input type="password" id="inputrepeat" class="form-control" placeholder="Ulangi Password" autocomplete required>
            <label for="inputrepeat">Ulangi Password</label>
        </div>


        <div class="checkbox mb-3">
            <div class="container">
                <div class="row">
                    <div class="mr-auto">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <div class="text-right ml-auto">
                        <a href="login">Sudah punya akun?</a>
                    </div>
                </div>
            </div>
        </div>
        <button id="btn" class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021</p>
    </form>
</div>
<script>
    var password = document.getElementById("inputPassword"),
        repeat = document.getElementById("inputrepeat");

    function validatePassword() {
        if (password.value != repeat.value) {
            repeat.setCustomValidity("Password tidak cocok");
        } else {
            repeat.setCustomValidity('');
        }
    }

    password.onsubmit = validatePassword;
    repeat.onkeyup = validatePassword;
</script>
<?= $this->endSection() ?>