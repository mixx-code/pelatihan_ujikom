<?php
include_once 'models/Database.php';
include_once 'models/Guru.php';

class GuruController
{
    private $guru;

    public function __construct()
    {
        $db = new Database();
        $this->guru = new Guru($db);
    }

    public function index()
    {
        $data = $this->guru->getAll();
        include 'views/guru/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            $tempatLahir = $_POST['tempatLahir'];
            $tglLahir = $_POST['tglLahir'];
            $jk = $_POST['jk'];
            $alamat = $_POST['alamat'];
            $noHp = $_POST['noHp'];
            $pendidikan = $_POST['pendidikan'];

            $result = $this->guru->addGuru($nip, $nama, $tempatLahir, $tglLahir, $jk, $alamat, $noHp, $pendidikan);
            if ($result) {
                header('Location: index.php');
            } else {
                echo "Gagal tersimpan";
            }
        } else {
            include 'views/guru/add.php';
        }
    }

    public function edit()
    {
        if (isset($_GET['nip'])) {
            $nip = $_GET['nip'];
            $row = $this->guru->getGuru($nip);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama'];
                $tempatLahir = $_POST['tempatLahir'];
                $tglLahir = $_POST['tglLahir'];
                $jk = $_POST['jk'];
                $alamat = $_POST['alamat'];
                $noHp = $_POST['noHp'];
                $pendidikan = $_POST['pendidikan'];

                $result = $this->guru->updateGuru($nip, $nama, $tempatLahir, $tglLahir, $jk, $alamat, $noHp, $pendidikan);
                if ($result) {
                    header('Location: index.php');
                } else {
                    echo "Gagal tersimpan";
                }
            } else {
                include 'views/guru/edit.php';
            }
        }
    }

    public function delete()
    {
        if (isset($_GET['nip'])) {
            $nip = $_GET['nip'];
            $result = $this->guru->deleteGuru($nip);
            if ($result) {
                header('Location: index.php');
            } else {
                echo "Gagal terhapus";
            }
        }
    }
}
