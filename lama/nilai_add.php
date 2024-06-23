<!DOCTYPE html>
<html>

<head>
    <title>Add Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <h2>TAMBAH NILAI</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">KD nilai</label>
                <input type="text" class="form-control" name="kdNilai" placeholder="Masukkan Kd Nilai" disabled>
            </div>
            <div class="mb-3">
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM siswa";
                $result_siswa = mysqli_query($connection, $sql);

                if (!$result_siswa) {
                    die('Query Error: ' . mysqli_error($connection));
                }
                ?>
                <label class="form-label">NIS</label>
                <select class="form-select" name="nis" aria-label="Default select example" required>
                    <?php while ($row_siswa = mysqli_fetch_array($result_siswa)) { ?>
                        <option value="<?= $row_siswa['nis']; ?>"><?= $row_siswa['nis']; ?> - <?= $row_siswa['nama_siswa']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <?php
                $sql = "SELECT * FROM matpel";
                $result_matpel = mysqli_query($connection, $sql);

                if (!$result_matpel) {
                    die('Query Error: ' . mysqli_error($connection));
                }
                ?>
                <label class="form-label">KD Matpel</label>
                <select class="form-select" name="kdMatpel" aria-label="Default select example" required>
                    <?php while ($row_matpel = mysqli_fetch_array($result_matpel)) { ?>
                        <option value="<?= $row_matpel['kd_matpel']; ?>">
                            <?= $row_matpel['kd_matpel']; ?> - <?= $row_matpel['nama_matpel']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai p</label>
                <input type="number" class="form-control" name="nilaiP" placeholder="Masukkan Nilai P" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai k</label>
                <input type="number" class="form-control" name="nilaiK" placeholder="Masukkan Nilai K" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="text" class="form-control" name="semester" placeholder="Masukkan Semester" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tapel</label>
                <input type="text" class="form-control" name="tapel" placeholder="Masukkan Tapel" required>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary btn-lg" name="submit">Kirim</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Get form data
        $nis = $_POST['nis'];
        $kdMatpel = $_POST['kdMatpel'];
        $nilaiP = $_POST['nilaiP'];
        $nilaiK = $_POST['nilaiK'];
        $semester = $_POST['semester'];
        $tapel = $_POST['tapel'];

        // Insert data into database, excluding the auto-increment field
        $sql_insert = "INSERT INTO nilai (nis, kd_matpel, nilai_p, nilai_k, semester, tapel) 
                       VALUES ('$nis', '$kdMatpel', '$nilaiP', '$nilaiK', '$semester', '$tapel')";

        $result_insert = mysqli_query($connection, $sql_insert);

        if ($result_insert) {
            echo "<script>alert('Berhasil Tambah Data Nilai'); window.location.href='nilai_view.php';</script>";
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($connection);
        }

        // Close connection
        mysqli_close($connection);
    }
    ?>
</body>

</html>