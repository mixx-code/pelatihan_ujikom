

<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
 <?php include 'navbar.php' ?>
    <h2>DATA Kompetensi</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telp</th>
                <th scope="col">Kd Kompetensi</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $sql = "Select * From siswa";
            $result = mysqli_query($connection, $sql);

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>$row[nis]</td>
                        <td>$row[nama_siswa]</td>
                        <td>$row[tempat_lahir]</td>
                        <td>$row[tgl_lahir]</td>
                        <td>$row[alamat]</td>
                        <td>$row[no_telepon]</td>
                        <td>$row[kd_kompetensi]</td>
                        <td><a class='btn btn-outline-primary' href='siswa_edit.php?nis=$row[nis]'>EDIT</a> | <a
                        href='siswa_delete.php?nis=$row[nis]' class='btn btn-danger'>DELETE</a></td>
                    </tr>";
            }
            ?>

        </tbody>
    </table>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="siswa_add.php" role="button">Tambah Data</a>
    </div>
</body>

</html>