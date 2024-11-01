<?php
include "koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tmp_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$query = "INSERT INTO biodata (nama, alamat, tempat_lahir, tgl_lahir) VALUES ('$nama', '$alamat', '$tmp_lahir', '$tgl_lahir')";
$mysqli->query($query);
header('location:index.php');
?>