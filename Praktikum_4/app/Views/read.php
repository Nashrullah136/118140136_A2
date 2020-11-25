<?= $this->extend('master') ?>
<?= $this->section('title') ?>
    <title><?= $article->title ?></title>
<?= $this->endSection() ?>
<?= $this->section('body') ?>
    <?php
        use App\Models\User;
        $user = new User();
    ?>
    <h2> <?= $article->title ?> </h2>
    <div class="isi">
        <p style="margin: 0;"> Oleh : <?= $user->find($article->uid)->username ?></p>
        <p><?= $article->body ?></p>
    </div>
    <style>
        .isi{
            width: 50vw;
            margin: auto;
        }
        .login {
            margin: auto;
            width: fit-content;
        }
        h2{
            margin: auto;
            width: fit-content;
        }
    </style>
<?= $this->endSection('body') ?>