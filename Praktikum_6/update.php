<?php
    $obj = json_decode($_POST['data'], false);
    $id = $obj->id;
    $kolom = $obj->column;
    $data = $obj->data;
    $connect = new mysqli('localhost', 'root', '', 'praktikum');
    $connect->query("UPDATE mahasiswa SET `$kolom`='$data' WHERE id = '$id' ");
    echo "UPDATE mahasiswa SET `$kolom`='$data' WHERE id = '$id' ";
    echo $data;
?>