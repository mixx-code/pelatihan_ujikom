

<!DOCTYPE html>
<html>

<head>
    <title>Add Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
 <?php include 'navbar.php' ?>
    <div class="container">
        <h2>TAMBAH SISWA</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" class="form-control" name="nis" placeholder="Masukkan nis">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="namaSiswa" placeholder="Masukkan
Nama Siswa">
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempatLahir" placeholder="Masukkan Tempat Lahir">
            </div>
            <div class="mb-3">
                <label class="form-label">Tgl lahir</label>
                <input type="date" class="form-control" name="tglLahir" placeholder="Masukkan Tgl Lahir">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
            <div class="mb-3">
                <label class="form-label">No telp</label>
                <input type="text" class="form-control" name="noTelp" placeholder="Masukkan No telp">
            </div>
            <div class="mb-3">
            <?php
            include "koneksi.php";
            $sql = "Select * From kompetensi";
            $result = mysqli_query($connection, $sql);

            ?>
                <label class="form-label">KD Kompetensi</label>
                <select class="form-select" name="kdKompetensi" aria-label="Default select example">
                    <option selected>Pilih Menu</option>
                    <?php while ($row_kd = mysqli_fetch_array($result)) { ?>
                    <option value="<?= $row_kd['kd_kompetensi']; ?>"><?= $row_kd['kd_kompetensi']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $namaSiswa = $_POST['namaSiswa'];
        $tempatLahir = $_POST['tempatLahir'];
        $tglLahir = $_POST['tglLahir'];
        $alamat = $_POST['alamat'];
        $noTelp = $_POST['noTelp'];
        $kdKompetensi = $_POST['kdKompetensi'];
        $sql = "INSERT INTO siswa values('$nis','$namaSiswa','$tempatLahir','$tglLahir','$alamat','$noTelp','$kdKompetensi')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "<script>alert('Berhasil Tambah Data Siswa'); window.location.href='siswa_view.php';</script>";
            // header('location:kompetensi_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>