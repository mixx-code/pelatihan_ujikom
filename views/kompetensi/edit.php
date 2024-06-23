<!DOCTYPE html>
<html>

<head>
    <title>Edit Kompetensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>EDIT KOMPETENSI</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">KD Kompetensi</label>
                <input type="text" class="form-control" name="kd_kompetensi" value='<?php echo htmlspecialchars($row['kd_kompetensi']); ?>' readonly>
                <!-- Use "readonly" attribute to prevent changing the kd_kompetensi -->
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kompetensi</label>
                <input type="text" class="form-control" name="nama_kompetensi" value='<?php echo htmlspecialchars($row['nama_kompetensi']); ?>' placeholder="Masukkan Nama Kompetensi">
            </div>
            <div class="mb-3">
                <label class="form-label">Prog keahlian</label>
                <input type="text" class="form-control" name="prog_keahlian" value='<?php echo htmlspecialchars($row['prog_keahlian']); ?>' placeholder="Masukkan Prog keahlian">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
</body>

</html>