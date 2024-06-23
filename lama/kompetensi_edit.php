

<?php
include "koneksi.php";
$kd = $_GET['kd'];
$sql = "Select * From kompetensi where kd_kompetensi='$kd'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Kompetensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
 <?php include 'navbar.php' ?>
    <div class="container">
        <h2>EDIT KOMPETENSI</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">KD Kompetensi</label>
                <input type="text" class="form-control" name="kdKompetensi" value='<?php echo $row['kd_kompetensi']; ?>' placeholder="Masukkan Kd kompetensi">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kompetensi</label>
                <input type="text" class="form-control" name="namaKompetensi" value='<?php echo $row['nama_kompetensi']; ?>' placeholder="Masukkan Nama Kompetensi">
            </div>
            <div class="mb-3">
                <label class="form-label">Prog keahlian</label>
                <input type="text" class="form-control" name="progKeahlian" value='<?php echo $row['prog_keahlian']; ?>' placeholder="Masukkan Prog keahlian">
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
        $sql = "UPDATE kompetensi SET nama_kompetensi='$namaKompetensi',prog_keahlian='$progKeahlian' WHERE kd_kompetensi='$kdKompetensi'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:kompetensi_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>