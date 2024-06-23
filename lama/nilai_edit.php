

<?php
            include "koneksi.php";
            $kd = $_GET['kd'];
            $sql = "Select * From nilai where kd_nilai='$kd'";
            $result_nilai = mysqli_query($connection, $sql);
            $row_nilai = mysqli_fetch_array($result_nilai);

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
                <label class="form-label">KD Nilai</label>
                <input type="text" value="<?= $row_nilai['kd_nilai'] ?>" class="form-control" name="kdNilai" placeholder="Masukkan KD nilai">
            </div>
            <div class="mb-3">
            <?php
            $sql = "Select * From siswa";
            $result = mysqli_query($connection, $sql);

            ?>
                <label class="form-label">Nis</label>
                <select class="form-select"  name="nis" aria-label="Default select example">
                    <option selected hidden ><?= $row_nilai['nis']; ?></option>
                    <?php while ($row_nis = mysqli_fetch_array($result)) { ?>
                    <option value="<?= $row_nis['nis']; ?>" ><?= $row_nis['nis']; ?> - <?= $row_nis['nama_siswa']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
            <?php
            $sql = "Select * From matpel";
            $result = mysqli_query($connection, $sql);

            ?>
                <label class="form-label">KD Matpel</label>
                <select class="form-select"  name="kdMatpel" aria-label="Default select example">
                    <option selected hidden ><?= $row_nilai['nis']; ?></option>
                    <?php while ($row_matpel = mysqli_fetch_array($result)) { ?>
                    <option value="<?= $row_matpel['kd_matpel']; ?>" ><?= $row_matpel['kd_matpel']; ?> - <?= $row_matpel['nama_matpel']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai P</label>
                <input type="number" value="<?= $row_nilai['nilai_p'] ?>" class="form-control" name="nilaiP" placeholder="Masukkan Nilai P">
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai K</label>
                <input type="number" value="<?= $row_nilai['nilai_k'] ?>" class="form-control" name="nilaiK" placeholder="Masukkan Nilai K">
            </div>
            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="text" value="<?= $row_nilai['semester'] ?>" class="form-control" name="semester" placeholder="Masukkan Semester">
            </div>
            <div class="mb-3">
                <label class="form-label">Tapel</label>
                <input type="text" value="<?= $row_nilai['tapel'] ?>" class="form-control" name="tapel" placeholder="Masukkan Tapel">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $kdNilai = $_POST['kdNilai'];
        $nis = $_POST['nis'];
        $kdMatpel = $_POST['kdMatpel'];
        $nilaiP = $_POST['nilaiP'];
        $nilaiK = $_POST['nilaiK'];
        $semester = $_POST['semester'];
        $tapel = $_POST['tapel'];

        $sql = "UPDATE nilai SET nis ='$nis', kd_matpel ='$kdMatpel', nilai_p='$nilaiP', nilai_k ='$nilaiK', semester ='$semester', tapel ='$tapel' WHERE kd_nilai  ='$kdNilai'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "<script>alert('Berhasil Edit Data nilai'); window.location.href='nilai_view.php';</script>";
            // header('location:kompetensi_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>