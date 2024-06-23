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
    <h2>DATA MATPEL</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">KD Matpel</th>
                <th scope="col">Nama Matpel</th>
                <th scope="col">Jumlah Jam</th>
                <th scope="col">Tingkat</th>
                <th scope="col">KD Kompetensi</th>
                <th scope="col">NIP</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['kd_matpel']; ?></td>
                    <td><?php echo $row['nama_matpel']; ?></td>
                    <td><?php echo $row['jumlah_jam']; ?></td>
                    <td><?php echo $row['tingkat']; ?></td>
                    <td><?php echo $row['kd_kompetensi']; ?></td>
                    <td><?php echo $row['nip']; ?></td>
                    <td>
                        <a class='btn btn-outline-primary' href='index.php?controller=matpel&action=edit&kdMatpel=<?php echo $row['kd_matpel']; ?>'>EDIT</a> |
                        <a href='index.php?controller=matpel&action=delete&kdMatpel=<?php echo $row['kd_matpel']; ?>' class='btn btn-danger'>DELETE</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="index.php?controller=matpel&action=add" role="button">Tambah Data</a>

    </div>
</body>

</html>