<?php
include_once 'models/Database.php';
include_once 'models/Matpel.php';
include_once 'models/Kompetensi.php';
include_once 'models/Guru.php';

class MatpelController
{
    private $matpel;
    private $kompetensiModel;
    private $guruModel;

    public function __construct()
    {
        $db = new Database();
        $this->matpel = new Matpel($db);
        $this->kompetensiModel = new Kompetensi($db);
        $this->guruModel = new Guru($db);
    }
    public function index()
    {
        $data = $this->matpel->getAll();
        include 'views/matpel/index.php';
    }

    public function add()
    {
        $kompetensiList = $this->kompetensiModel->getAll();
        $guruList = $this->guruModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kdMatpel = $_POST['kdMatpel'];
            $namaMatpel = $_POST['namaMatpel'];
            $jumlahJam = $_POST['jumlahJam'];
            $tingkat = $_POST['tingkat'];
            $kdKompetensi = $_POST['kdKompetensi'];
            $nip = $_POST['nip'];

            // TODO: Lakukan validasi input di sini jika diperlukan

            $result = $this->matpel->addMatpel($kdMatpel, $namaMatpel, $jumlahJam, $tingkat, $kdKompetensi, $nip);
            if ($result) {
                header('Location: index.php?controller=matpel');
                exit();
            } else {
                echo "Gagal tersimpan";
            }
        } else {
            include 'views/matpel/add.php';
        }
    }

    public function edit()
    {
        $kompetensiList = $this->kompetensiModel->getAll();
        $guruList = $this->guruModel->getAll();

        if (isset($_GET['kdMatpel'])) {
            $kdMatpel = $_GET['kdMatpel'];
            $matpel = $this->matpel->getMatpel($kdMatpel);

            if (!$matpel) {
                echo "Matpel dengan ID $kdMatpel tidak ditemukan.";
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $namaMatpel = $_POST['namaMatpel'];
                $jumlahJam = $_POST['jumlahJam'];
                $tingkat = $_POST['tingkat'];
                $kdKompetensi = $_POST['kdKompetensi'];
                $nip = $_POST['nip'];

                // TODO: Lakukan validasi input di sini jika diperlukan

                $result = $this->matpel->updateMatpel($kdMatpel, $namaMatpel, $jumlahJam, $tingkat, $kdKompetensi, $nip);
                if ($result) {
                    header('Location: index.php?controller=matpel');
                    exit();
                } else {
                    echo "Gagal tersimpan";
                }
            } else {
                include 'views/matpel/edit.php';
            }
        } else {
            echo "Parameter kdMatpel tidak ada";
        }
    }


    public function delete()
    {
        if (isset($_GET['kdMatpel'])) {
            $kdMatpel = $_GET['kdMatpel'];

            $result = $this->matpel->deleteMatpel($kdMatpel);
            if ($result) {
                header('Location: index.php?controller=matpel');
                exit();
            } else {
                echo "Gagal terhapus";
            }
        } else {
            echo "Parameter kdMatpel tidak ada";
        }
    }
}
