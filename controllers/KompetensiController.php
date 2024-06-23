<?php
include_once 'models/Database.php';
include_once 'models/Kompetensi.php';

class KompetensiController
{
    private $kompetensi;

    public function __construct()
    {
        $db = new Database();
        $this->kompetensi = new Kompetensi($db);
    }

    public function index()
    {
        $data = $this->kompetensi->getAll();
        include 'views/kompetensi/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kd_kompetensi = $_POST['kd_kompetensi'];
            $nama_kompetensi = $_POST['nama_kompetensi'];
            $prog_keahlian = $_POST['prog_keahlian'];

            $result = $this->kompetensi->addKompetensi($kd_kompetensi, $nama_kompetensi, $prog_keahlian);
            if ($result) {
                header('Location: index.php?controller=kompetensi');
            } else {
                echo "Gagal tersimpan";
            }
        } else {
            include 'views/kompetensi/add.php';
        }
    }

    public function edit()
    {
        if (isset($_GET['kd_kompetensi'])) {
            $kd_kompetensi = $_GET['kd_kompetensi'];
            $row = $this->kompetensi->getKompetensi($kd_kompetensi);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama_kompetensi = $_POST['nama_kompetensi'];
                $prog_keahlian = $_POST['prog_keahlian'];

                $result = $this->kompetensi->updateKompetensi($kd_kompetensi, $nama_kompetensi, $prog_keahlian);
                if ($result) {
                    header('Location: index.php?controller=kompetensi'); // Redirect to index after successful update
                    exit();
                } else {
                    echo "Gagal tersimpan";
                }
            } else {
                include 'views/kompetensi/edit.php'; // Display edit form
            }
        }
    }


    public function delete()
    {
        if (isset($_GET['kd_kompetensi'])) {
            $kd_kompetensi = $_GET['kd_kompetensi'];
            $result = $this->kompetensi->deleteKompetensi($kd_kompetensi);
            if ($result) {
                header('Location: index.php?controller=kompetensi');
            } else {
                echo "Gagal terhapus";
            }
        }
    }
}
