<?= $this->extend('master') ?>
<?= $this->section('title') ?>
    <title>Ubah Artikel</title>
<?= $this->endSection() ?>
<?= $this->section('body') ?>
    <h2>Buat Artikel</h2><br>    
    <?php if(isset($validation)){
        echo $validation->listErrors();
    }?>
    <div class="login">    
        <form id="login" method="POST" action="<?= route_to('create_post')?>">    
            <table>
                <tr>
                    <td>
                        <label><b>Judul</b></label>    
                    </td>
                    <td>
                        <input type="text" name="title" id="Uname" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Isi</b></label>
                    </td>
                    <td>
                        <textarea name="body" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <input type="submit" name="log" id="log" value="Buat">       
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