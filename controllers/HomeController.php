<?php

class HomeController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Periksa apakah user sudah login
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
            header("location: index.php"); // Redirect ke halaman login jika tidak ada session username
            exit();
        }

        // Tampilkan halaman home
        include 'views/home/index.php';
    }
}
