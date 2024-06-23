<?php
// Navbar
// Memulai session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa status login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: index.php");
    exit(); // Pastikan keluar setelah melakukan pengalihan
}
?>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./index.php?controller=home">Home</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Master Data</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./index.php?controller=guru">GURU</a></li>
            <li><a class="dropdown-item" href="siswa_view.php">SISWA</a></li>
            <li><a class="dropdown-item" href="./index.php?controller=kompetensi">Kompetensi</a></li>

            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="nilai_view.php">Nilai</a></li>
            <li><a class="dropdown-item" href="../index.php?controller=matpel">Mata pelajaran</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./index.php?controller=login&action=logout">Logout</a> <!-- Ganti link ini sesuai dengan logout.php atau file logout Anda -->
    </li>
</ul>