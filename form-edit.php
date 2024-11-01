<?php
include "koneksi.php";
$query = "SELECT * FROM biodata WHERE id='$_GET[id]'";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center">Form Edit Data Mahasiswa</h1>
        <form action="update-data.php?id=<?= $row['id']; ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?= $row['nama']; ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control"><?= $row['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="tmpt_lahir">Tempat Lahir</label>
                <input type="text" name="tmpt_lahir" value="<?= $row['tempat_lahir']; ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="<?= $row['tgl_lahir']; ?>" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>