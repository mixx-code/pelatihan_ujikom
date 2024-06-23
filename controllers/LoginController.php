<?php
include_once 'models/Database.php';
include_once 'models/UserModel.php';

class LoginController
{
    private $userModel;

    public function __construct()
    {
        $db = new Database();
        $this->userModel = new UserModel($db);
    }

    public function index()
    {
        include 'views/login/index.php';
    }

    public function processLogin()
    {
        // Validasi input
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header("location: index.php?controller=login"); // Redirect jika bukan POST request
            exit();
        }

        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            header("location: index.php?controller=login"); // Redirect jika tidak ada username atau password
            exit();
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Authenticate user
        if ($this->userModel->authenticate($username, $password)) {
            // Mulai session jika belum dimulai
            session_start();

            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";

            // Redirect ke halaman home
            // echo "<script>window.location.href='index.php?controller=home';</script>";
            header("location: index.php?controller=home");
            exit();
        } else {
            // Redirect kembali ke halaman login jika autentikasi gagal
            header("location: index.php?controller=login");
            exit();
        }
    }
    public function logout()
    {
        // Mulai session jika belum dimulai
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Hapus semua data session
        session_unset();

        // Hancurkan session
        session_destroy();

        // Redirect ke halaman login
        header("location: index.php");
        exit();
    }
}
