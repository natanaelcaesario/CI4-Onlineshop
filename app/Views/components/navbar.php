<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= site_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Dopplegenger</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Top</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Produk</a></li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (!session()->has('login')) {  ?>
                    <li class="nav-item"><a class="nav-link" href="login">Daftar/Login</a></li>
                <?php } else {  ?>
                    <li class="nav-item"><a class="nav-link" href="transaksi"><i class="fas fa-shopping-cart"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="pengguna"><i class="fas fa-user"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout">Keluar</a></li>

                <?php }  ?>
            </ul>
        </div>
    </div>
</nav>