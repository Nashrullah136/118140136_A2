<?php
    $obj = json_decode($_POST['data'], false);
    $id = $obj->id;
    $connect = new mysqli('localhost', 'root', '', 'praktikum');
    $connect->query("DELETE FROM mahasiswa WHERE id = '$id'");
    echo "DELETE FROM mahasiswa WHERE id = '$id'";
?>