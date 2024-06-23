<!DOCTYPE html>
<html>

<head>
    <title>Data Kompetensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <h2>DATA KOMPETENSI</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Kode Kompetensi</th>
                <th scope="col">Nama Kompetensi</th>
                <th scope="col">Program Keahlian</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['kd_kompetensi']; ?></td>
                    <td><?php echo $row['nama_kompetensi']; ?></td>
                    <td><?php echo $row['prog_keahlian']; ?></td>
                    <td>
                        <a class='btn btn-outline-primary' href='index.php?controller=kompetensi&action=edit&kd_kompetensi=<?php echo $row['kd_kompetensi']; ?>'>EDIT</a> |
                        <a href='index.php?controller=kompetensi&action=delete&kd_kompetensi=<?php echo $row['kd_kompetensi']; ?>' class='btn btn-danger'>DELETE</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="index.php?controller=kompetensi&action=add" role="button">Tambah Data</a>
    </div>
</body>

</html>