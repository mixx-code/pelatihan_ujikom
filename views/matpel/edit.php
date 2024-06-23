<!DOCTYPE html>
<html>

<head>
    <title>EDIT Matpel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <h2>EDIT MATPEL</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">KD Matpel</label>
                <input type="text" value="<?= $matpel['kd_matpel'] ?>" class="form-control" name="kdMatpel" placeholder="Masukkan KD Matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Matpel</label>
                <input type="text" value="<?= $matpel['nama_matpel'] ?>" class="form-control" name="namaMatpel" placeholder="Masukkan KD Matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Jam</label>
                <input type="number" value="<?= $matpel['jumlah_jam'] ?>" class="form-control" name="jumlahJam" placeholder="Masukkan Jumlah Jam">
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <input type="text" value="<?= $matpel['tingkat'] ?>" class="form-control" name="tingkat" placeholder="Masukkan Tingkat">
            </div>
            <div class="mb-3">
                <label class="form-label">Kompetensi</label>
                <select class="form-select" name="kdKompetensi" aria-label="Default select example">
                    <option selected hidden><?= $matpel['kd_kompetensi']; ?></option>
                    <?php foreach ($kompetensiList as $kompetensi) : ?>
                        <option value="<?= $kompetensi['kd_kompetensi']; ?>">
                            <?= $kompetensi['kd_kompetensi'] . ' - ' . $kompetensi['nama_kompetensi']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Guru</label>
                <select class="form-select" name="nip" aria-label="Default select example">
                    <option selected hidden><?= $matpel['nip']; ?></option>
                    <?php foreach ($guruList as $guru) : ?>
                        <option value="<?= $guru['nip']; ?>">
                            <?= $guru['nip'] . ' - ' . $guru['nama_guru']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
</body>

</html>