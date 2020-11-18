<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktorial</title>
</head>
<?php
    function fact($bil)
    {
        if($bil == 0){
            return 1;
        }
        else{
            return $bil*fact($bil-1);
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $hasil = fact($_POST["bilangan"]);
    }
?>
<body>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>
                    Bilangan
                </td>
                <td>
                    <input type="text" name="bilangan" id="">
                </td>
            </tr>
            <?php if (isset($hasil)) { ?>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        Hasil = <?= $hasil ?>
                    </td>  
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="submit">
                </td>  
            </tr>
        </table>
    </form>
</body>
</html>