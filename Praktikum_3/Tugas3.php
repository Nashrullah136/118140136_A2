<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <?php
        $connect = new mysqli('localhost', 'root', '', 'praktikum3');
        $jurusan = $connect->query("SELECT * FROM jurusan");
        $mahasiswa = $connect->query("SELECT NRP, mahasiswa.nama, alamat, jurusan.nama as jurusan FROM mahasiswa INNER JOIN jurusan ON mahasiswa.ID_Jur = jurusan.ID_Jur");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST["submit"] == "Tambah"){
                $nrp = $_POST['nrp'];
                $nama = $_POST["nama"];
                $alamat = $_POST["alamat"];
                $jurusan = $_POST["jurusan"];
                $connect->query("INSERT INTO mahasiswa VALUES ('$nrp', '$nama', '$alamat', '$jurusan')");
            }
            else if($_POST["submit"] == "Cari"){
                $cari = $_POST["cari"];
                $mahasiswa = $connect->query("SELECT * FROM mahasiswa WHERE nama LIKE '%$cari%'");
                // var_dump("SELECT * FROM mahasiswa WHERE nama LIKE %$cari%");
            }
            else if($_POST["submit"] == "Delete"){
                $hapus = $_POST["hapus"];
                $connect->query("DELETE FROM mahasiswa WHERE NRP = '$hapus'");
            }
        }
    ?>
</head>
<body>
    <table>
        <tr>
            <td>
                <form action="#" method="post">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <h2>Tambah Data</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NRP 
                            </td>
                            <td>
                                <input type="text" name="nrp">    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                <input type="text" name="nama">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat
                            </td>
                            <td>
                                <textarea name="alamat" id="" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jurusan
                            </td>
                            <td>
                                <select name="jurusan" id="">
                                    <?php while($data = mysqli_fetch_row($jurusan)){?>
                                        <option value="<?= $data[0] ?>"><?= $data[1] ?></option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Tambah"></td>
                        </tr>
                    </table>
                </form>
                <hr>
                <form action="#" method="post">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;"><h2>Cari Data</h2></td>
                        </tr>
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                <input type="text" name="cari" id="">
                            </td>
                            <td><input type="submit" name="submit" id="" value="Cari"></td>
                        </tr>
                    </table>
                </form>
                <hr>
                <form action="#" method="post">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;"><h2>Hapus Data</h2></td>
                        </tr>
                        <tr>
                            <td>
                                NRP
                            </td>
                            <td>
                                <input type="text" name="hapus" id="">
                            </td>
                            <td><input type="submit" name="submit" id="" value="Delete"></td>
                        </tr>
                    </table>
                </form>
            </td>
            <td style="text-align: center; width: 100vw; align-content: center;">
                <?php if($mahasiswa != null){ ?>
                    <table style="margin: auto;" >
                        <tr>
                            <th>
                                NRP
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>
                                Jurusan
                            </th>
                        </tr>
                        <?php while($data = $mahasiswa->fetch_row()){?>
                            <tr>
                                <td><?= $data[0] ?></td>
                                <td><?= $data[1] ?></td>
                                <td><?= $data[2] ?></td>
                                <td><?= $data[3] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } else {?>
                    <h2>Tidak ada data</h2>
                <?php } ?>
            </td>
        </tr>
    </table>
</body>
</html>
