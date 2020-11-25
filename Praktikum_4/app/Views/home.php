<?= $this->extend('master') ?>
<?= $this->section('title') ?>
    <title>Home Artikel</title>
<?= $this->endSection() ?>
<?= $this->section('body') ?>
    <?php
        use App\Models\User;
        $user = new User();
    ?>
    <div class="login">
        <b style="text-align: center;"><h2>Daftar Artikel</h3></b>
        <table>
            <tr>
                <th>No. </th>
                <th>Judul </th>
                <th>Oleh</th>
            </tr>
            <?php if(!$article) {?>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        Tidak ada artikel
                    </td>
                </tr>
            <?php } else { ?>
                <?php foreach($article as $key => $value) { ?>
                    <tr>
                        <td>
                            <?= $key+1 ?>
                        </td>
                        <td>
                            <a href=<?= route_to('read', $value->id) ?>><?= $value->title ?></a>
                        </td>
                        <td>
                            <?= $user->find($value->id)->username ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>        
    </div>
    <style>
        .login {
            margin: auto;
            width: fit-content;
        }
        h2{
            margin: auto;
            width: fit-content;
        }
        td{
            padding-left: 10px;
            padding-right: 10px;
        }
        table, td, th{
            border: 2px solid;
            border-collapse: collapse;
        }
        td > form{
            float: left;
        }
    </style>   
<?= $this->endSection() ?>