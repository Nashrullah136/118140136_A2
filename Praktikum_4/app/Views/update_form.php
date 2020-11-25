<?= $this->extend('master') ?>
<?= $this->section('title') ?>
    <title>Ubah Artikel</title>
<?= $this->endSection() ?>
<?= $this->section('body') ?>
    <h2>Ubah Artikel</h2><br>    
    <?php if(isset($validation)){
        echo $validation->listErrors();
    }?>
    <div class="login">    
        <form id="login" method="POST" action="<?= route_to('update_post', $article->id)?>">    
            <table>
                <tr>
                    <td>
                        <label><b>Judul</b></label>    
                    </td>
                    <td>
                        <input type="text" name="title" id="Uname" value=<?= '"'.$article->title.'"' ?> placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Isi</b></label>
                    </td>
                    <td>
                        <textarea name="body" id="" cols="30" rows="10"><?= $article->body ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <input type="submit" name="log" id="log" value="Ubah">       
                    </td>
                </tr>
            </table>
        </form>
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
    </style>
<?= $this->endSection('body') ?>