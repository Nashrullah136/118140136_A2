<?php
    $connect = new mysqli('localhost', 'root', '', 'praktikum');
    $data = $connect->query("SELECT * FROM `jurusan`");
    $cek = json_encode($data->fetch_all(MYSQLI_ASSOC));
    echo $cek;
?>