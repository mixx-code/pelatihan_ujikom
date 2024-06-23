

<!DOCTYPE html>
<html>

<head>
    <title>Add Kompetensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
 <?php include 'navbar.php' ?>
    <div class="container">
        <h2>TAMBAH KOMPETENSI</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">KD Kompetensi</label>
                <input type="text" class="form-control" name="kdKompetensi" placeholder="Masukkan
KD Kompetensi">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kompetensi</label>
                <input type="text" class="form-control" name="namaKompetensi" placeholder="Masukkan
Nama Kompetensi">
            </div>
            <div class="mb-3">
                <label class="form-label">Prog keahlian</label>
                <input type="text" class="form-control" name="progKeahlian" placeholder="Masukkan Prog Keahlian">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['submit'])) {
        $kdKompetensi = $_POST['kdKompetensi'];
        $namaKompetensi = $_POST['namaKompetensi'];
        $progKeahlian = $_POST['progKeahlian'];
        $sql = "INSERT INTO kompetensi values('$kdKompetensi','$namaKompetensi','$progKeahlian')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "<script>alert('Berhasil Tambah Data Kompetensi'); window.location.href='kompetensi_view.php';</script>";
            // header('location:kompetensi_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>