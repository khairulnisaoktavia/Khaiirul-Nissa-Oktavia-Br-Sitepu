<?php
include "koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tmp_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$query = "UPDATE biodata SET
    nama='$nama',
    alamat='$alamat',
    tempat_lahir='$tmp_lahir',
    tgl_lahir='$tgl_lahir'
    WHERE id='$_GET[id]'";
$mysqli->query($query);
header('location:index.php');
?>