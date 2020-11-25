<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->renderSection('title') ?>
</head>
<body>
    <div class="topnav">
        <h2 style="float: left;"> <a href=<?= route_to('home') ?>>BacaArtikel</a></h2>
        <?php 
            $session = session();
            if($session->get('logged_in')){?>
                <button style="float: right; margin-top: auto; margin-bottom: auto;">
                    <a href=<?= route_to('logout') ?>>Log Out</a>
                </button>
                <p style="float: right; margin: 0; margin-right: 20px; margin-top: auto; margin-bottom: auto;">Halo, <?= $session->get('username') ?></p>
            <?php } else {?>
                <button style="float: right; margin-top: auto; margin-bottom: auto;">
                    <a href=<?= route_to('login') ?>>Log In</a>
                </button>
            <?php } ?>
    </div>
    <hr>
    <?= $this->renderSection('body') ?>
</body>
<style>
    .topnav {
        overflow: hidden;
    }
</style>
</html>