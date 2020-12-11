<?php
    $obj = json_decode($_POST['data'], false);
    $nama = $obj->nama;
    $nim = $obj->nim;
    $prodi = $obj->prodi;
    $connect = new mysqli('localhost', 'root', '', 'praktikum');
    $connect->query("INSERT INTO mahasiswa (nama, nim, id_jur) VALUES ('$nama','$nim', '$prodi')");
    echo "INSERT INTO mahasiswa (nama, nim, id_jur) VALUES ('$nama','$nim', '$prodi')";
?>