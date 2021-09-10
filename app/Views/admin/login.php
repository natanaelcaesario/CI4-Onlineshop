<style>
    #login-form {
        max-width: 320;
        margin: 0 auto;
        padding: 20px;
        background: #fafafa;
        border: 1px solid #ccc;
        margin-top: 200px;
    }

    #login-form h1 {
        margin: 0 0 20px 0;
    }

    #login-form input {
        box-sizing: border-box;
        width: 100%;
        margin: 0 0 20px 0;
        padding: 10px;
    }

    #login-form input[type=submit] {
        border: 0;
        padding: 15px;
        background: #5b77bd;
        color: #fff;
        cursor: pointer;
    }

    html,
    body {
        font-family: arial, sans-serif;
    }
</style>
<?php $session = session();
$errors = $session->getFlashdata('errors');
$success = $session->getFlashData('success');
?>
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
<form id="login-form" method="POST" action="<?= current_url() ?>">
    <h1>LOGIN</h1>
    <input type="text" placeholder="Username" name="username" required />
    <input type="password" placeholder="Password" name="password" required />
    <button type="submit">Login</button>
</form>