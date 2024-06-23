<?php
// index.php

// Include file-file controller dan model yang diperlukan
include_once 'controllers/GuruController.php';
include_once 'controllers/KompetensiController.php';
include_once 'controllers/MatpelController.php';
include_once 'controllers/LoginController.php';
include_once 'controllers/HomeController.php';

// Inisialisasi objek untuk setiap controller
$guruController = new GuruController();
$kompetensiController = new KompetensiController();
$matpelController = new MatpelController();
$loginController = new LoginController();
$homeController = new HomeController(); // Sesuaikan dengan nama HomeController Anda

// Pemeriksaan apakah ada parameter 'controller' dalam query string
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];

    // Memeriksa apakah pengguna mencoba untuk login
    if ($controller === 'login') {
        // Panggil method yang sesuai di LoginController berdasarkan action
        if (isset($_GET['action'])) {
            if ($_GET['action'] === 'process') {
                $loginController->processLogin(); // Menangani proses login
            } else if ($_GET['action'] === 'logout') { // Menambahkan penanganan logout
                $loginController->logout();
            } else {
                // Action lain yang mungkin di-handle di LoginController
                // Contoh: lupa password, reset password, dsb.
                // Jika ada action lain yang diperlukan, tambahkan disini
                echo "Action tidak valid";
            }
        } else {
            // Tampilkan halaman login
            $loginController->index();
        }
        // Selesai menangani rute login, keluar dari skrip
        exit();
    }

    // Memeriksa rute untuk 'home'
    if ($controller === 'home') {
        $homeController->index(); // Panggil method index di HomeController untuk tampilkan halaman home
        exit();
    }

    // Memeriksa rute untuk 'kompetensi'
    if ($controller === 'kompetensi') {
        if (isset($_GET['action'])) {
            if ($_GET['action'] === 'add') {
                $kompetensiController->add();
            } elseif ($_GET['action'] === 'edit') {
                $kompetensiController->edit();
            } elseif ($_GET['action'] === 'delete') {
                $kompetensiController->delete();
            } else {
                $kompetensiController->index();
            }
        } else {
            $kompetensiController->index();
        }
        // Selesai menangani rute kompetensi, keluar dari skrip
        exit();
    }

    // Memeriksa rute untuk 'guru'
    if ($controller === 'guru') {
        if (isset($_GET['action'])) {
            if ($_GET['action'] === 'add') {
                $guruController->add();
            } elseif ($_GET['action'] === 'edit') {
                $guruController->edit();
            } elseif ($_GET['action'] === 'delete') {
                $guruController->delete();
            } else {
                $guruController->index();
            }
        } else {
            $guruController->index();
        }
        // Selesai menangani rute guru, keluar dari skrip
        exit();
    }

    // Memeriksa rute untuk 'matpel'
    if ($controller === 'matpel') {
        if (isset($_GET['action'])) {
            if ($_GET['action'] === 'add') {
                $matpelController->add();
            } elseif ($_GET['action'] === 'edit') {
                $matpelController->edit();
            } elseif ($_GET['action'] === 'delete') {
                $matpelController->delete();
            } else {
                $matpelController->index();
            }
        } else {
            $matpelController->index();
        }
        // Selesai menangani rute matpel, keluar dari skrip
        exit();
    }
} else {
    // Jika tidak ada controller yang diberikan, arahkan ke halaman login
    $loginController->index();
    exit();
}
