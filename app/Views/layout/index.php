<!DOCTYPE html>
<html lang="en">


<body id="page-top">
    <!-- Navigation-->
    <?= $this->include('components/navbar') ?>

    <?= $this->renderSection('content') ?>

    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container">@buildbynatanael 2021</div>
    </footer>
    <!-- Bootstrap core JS-->
    <?= $this->include('components/scripts') ?>
</body>

</html>