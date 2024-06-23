

<?php
            include "koneksi.php";
            $kd = $_GET['kd'];
            $sql = "Select * From matpel where kd_matpel='$kd'";
            $result_matpel = mysqli_query($connection, $sql);
            $row_matpel = mysqli_fetch_array($result_matpel);

?>


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
                <input type="text" value="<?= $row_matpel['kd_matpel'] ?>" class="form-control" name="kdMatpel" placeholder="Masukkan KD Matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Matpel</label>
                <input type="text" value="<?= $row_matpel['nama_matpel'] ?>" class="form-control" name="namaMatpel" placeholder="Masukkan KD Matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Jam</label>
                <input type="number" value="<?= $row_matpel['jumlah_jam'] ?>" class="form-control" name="jumlahJam" placeholder="Masukkan Jumlah Jam">
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <input type="text" value="<?= $row_matpel['tingkat'] ?>" class="form-control" name="tingkat" placeholder="Masukkan Tingkat">
            </div>
            <div class="mb-3">
            <?php
            $sql = "Select * From kompetensi";
            $result = mysqli_query($connection, $sql);

            ?>
                <label class="form-label">KD Kompetensi</label>
                <select class="form-select"  name="kdKompetensi" aria-label="Default select example">
                    <option selected hidden ><?= $row_matpel['kd_kompetensi']; ?></option>
                    <?php while ($row_kd = mysqli_fetch_array($result)) { ?>
                    <option value="<?= $row_kd['kd_kompetensi']; ?>" ><?= $row_kd['kd_kompetensi']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
            <?php
            $sql = "Select * From guru";
            $result_guru = mysqli_query($connection, $sql);
            ?>
                <label class="form-label">NIP</label>
                <select class="form-select"  name="nip" aria-label="Default select example">
                    <option selected hidden ><?= $row_matpel['nip']; ?></option>
                    <?php while ($row_guru = mysqli_fetch_array($result_guru)) { ?>
                    <option value="<?= $row_guru['nip']; ?>" ><?= $row_guru['nip']; ?> - <?= $row_guru['nama_guru']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $kdMatpel = $_POST['kdMatpel'];
        $namaMatpel = $_POST['namaMatpel'];
        $jumlahJam = $_POST['jumlahJam'];
        $tingkat = $_POST['tingkat'];
        $kdKompetensi = $_POST['kdKompetensi'];
        $nip = $_POST['nip'];
var_dump($kdKompetensi, $nip);

        $sql = "UPDATE matpel SET nama_matpel='$namaMatpel', jumlah_jam='$jumlahJam', tingkat='$tingkat', kd_kompetensi ='$kdKompetensi', nip ='$nip' WHERE kd_matpel ='$kdMatpel'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "<script>alert('Berhasil Edit Data matpel'); window.location.href='matpel_view.php';</script>";
            // header('location:kompetensi_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>