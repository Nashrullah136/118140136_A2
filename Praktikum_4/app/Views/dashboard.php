<?= $this->extend('master') ?>
<?= $this->section('title') ?>
    <title>Dashboard Artikel</title>
<?= $this->endSection() ?>
<?= $this->section('body') ?>
    <div class="login">
        <b style="text-align: center;"><h2>Daftar Artikel</h3></b>
        <table>
            <tr>
                <th>No. </th>
                <th>Judul </th>
                <th>Terakhir diubah </th>
                <th colspan="2">Aksi</th>
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
                            <?= $value->title ?>
                        </td>
                        <td>
                            <?= $value->updated_at?>
                        </td>
                        <td>
                            <button style="float: left;">
                                <a href=<?= route_to('update', $value->id) ?>>Ubah</a>
                            </button>
                            <form action=<?= route_to('delete', $value->id)?> method="post">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
            <tr>
                <td colspan="5" style="text-align: center;">
                    <button title="Tambah">
                        <a href=<?= route_to('create') ?>>Tambah</a>
                    </button>
                </td>
            </tr>
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