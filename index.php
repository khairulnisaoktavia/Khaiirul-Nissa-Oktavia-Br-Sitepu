<?php
$mysqli = new mysqli("localhost","root","","db_mhs");
if($mysqli->connect_error){
    die("Koneksi gagal :".$mysqli->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center">Data Mahasiswa</h1>
        <form action="" method="get" class="form-inline mb-3">
            <select name="filter" class="form-control mr-2">
                <?php
                $q_alamat = "SELECT alamat FROM biodata GROUP BY alamat";
                $r_alamat = $mysqli->query($q_alamat);
                while($data_alamat = $r_alamat->fetch_assoc()){
                ?>
                    <option value="<?= $data_alamat['alamat'];?>"><?= $data_alamat['alamat'];?></option>
                <?php
                }
                ?>
            </select>
            <button class="btn btn-primary">Filter</button>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_GET['filter'])){
                    $query = "SELECT * FROM biodata WHERE alamat='$_GET[filter]'";
                }else{
                    $query = "SELECT * FROM biodata";
                }
                $result = $mysqli->query($query);
                $no=0;
                while($row = $result->fetch_assoc()){
                    $no++;
                ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?= $row['nama'];?></td>
                        <td><?= $row['alamat'];?></td>
                        <td><?= $row['tempat_lahir'];?></td>
                        <td><?= $row['tgl_lahir'];?></td>
                        <td>
                            <a href="form-edit.php?id=<?= $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus-data.php?id=<?= $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="form-data.php" class="btn btn-success">Tambah Data</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>