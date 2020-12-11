<?php
    function fruit($name, $colour) {
        return "{$name}: {$colour}";
    }

    $prodi = $_GET["prodi"];
    $connect = new mysqli('localhost', 'root', '', 'praktikum');
    $data = $connect->query("SELECT id, mahasiswa.nama as nama, nim, id_jur as prodi FROM `mahasiswa` WHERE mahasiswa.id_jur = '$prodi'");
    $cek = json_encode($data->fetch_all(MYSQLI_ASSOC));
    echo $cek;
?>