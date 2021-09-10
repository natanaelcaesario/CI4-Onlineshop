<?= $this->extend('layout/login') ?>
<?= $this->section('content') ?>
<?php $session = session();
$errors = $session->getFlashdata('errors');
$success = $session->getFlashData('success');
?>

<form class="form-signin" action="login" method="POST">
  <div class="text-center mb-4">

    <?php if ($errors != null) : ?>
      <div class="ml-auto alert alert-danger mt-5" role="alert" style="width: 300px;">
        <?php echo $errors  ?>
      </div>
    <?php endif ?>
    <?php if ($success != null) :  ?>
      <div class="mr-auto alert alert-success mt-5" role="alert" style="width: 300px;">
        <?php echo $success  ?>
      </div>
    <?php endif  ?>
    <img class="mb-4" src="https://i.pinimg.com/originals/77/c3/66/77c366436d8bd35fe8b3ce5b8c66992e.png" alt="" width="90" height="90">
    <h1 class="h3 mb-3 font-weight-normal">Halaman Login Pelanggan</h1>
    <p>Selamat datang diaplikasi <code><a href="index" class="text-danger">Online Shop</a></code> Silahkan login dengan akun yang anda miliki, jika belum memiliki akun silahkan mendaftarkan diri anda <a href="register">Disini</a></p>


  </div>

  <div class="form-label-group">
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
    <label for="inputEmail">Email address</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
    <label for="inputPassword">Password</label>
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
          <a href="register">Belum punya akun?</a>
        </div>
      </div>


    </div>


  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021</p>
</form>

<?= $this->endSection() ?>