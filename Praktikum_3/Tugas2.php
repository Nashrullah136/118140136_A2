<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktorial</title>
</head>
<?php
    function harga($nama)
    {
        $harga = 300;
        $panjang = strlen($nama);
        if($panjang > 10 and $panjang <= 20){
            $harga = 500;
        }
        else if($panjang > 20){
            $harga = 700;
        }
        return $harga*$panjang;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama = $_POST["nama"];
        $total = harga($nama);
        $warna = $_POST['warna'] != '' ? $_POST['warna'] : 'red';
    }
?>
<body>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>
                    Nama
                </td>
                <td>
                    <input type="text" name="nama" id="">
                </td>
            </tr>
            <tr>
                <td>
                    Warna
                </td>
                <td>
                    <input type="text" name="warna" id="">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="submit">
                </td>  
            </tr>
            <?php if (isset($total)) { ?>
                <tr>
                    <td colspan="2" style="text-align: center; color: <?= $warna ?>;">
                        <?= $nama ?>
                    </td>  
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        Harga total : Rp.<?= $total ?>,00
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
</body>
</html>