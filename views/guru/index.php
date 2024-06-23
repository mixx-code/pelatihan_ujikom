<!DOCTYPE html>
<html>

<head>
    <title>Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'navbar.php' ?>
    <h2>DATA GURU</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">No HP</th>
                <th scope="col">Pendidikan</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['nip']; ?></td>
                    <td><?php echo $row['nama_guru']; ?></td>
                    <td><?php echo $row['tempat_lahir']; ?></td>
                    <td><?php echo $row['tgl_lahir']; ?></td>
                    <td><?php echo $row['jenkel']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['no_hp']; ?></td>
                    <td><?php echo $row['pend_akhir']; ?></td>
                    <td>
                        <a class='btn btn-outline-primary' href='index.php?controller=guru&action=edit&nip=<?php echo $row['nip']; ?>'>EDIT</a> |
                        <a href='index.php?controller=guru&action=delete&nip=<?php echo $row['nip']; ?>' class='btn btn-danger'>DELETE</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="index.php?action=add" role="button">Tambah Data</a>
    </div>
</body>

</html>