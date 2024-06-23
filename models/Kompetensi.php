<?php
class Kompetensi
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM kompetensi";
        $result = $this->db->query($sql);
        $data = [];

        while ($row = $this->db->fetch_array($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getKompetensi($kd_kompetensi)
    {
        $sql = "SELECT * FROM kompetensi WHERE kd_kompetensi='$kd_kompetensi'";
        $result = $this->db->query($sql);
        return $this->db->fetch_array($result);
    }

    public function addKompetensi($kd_kompetensi, $nama_kompetensi, $prog_keahlian)
    {
        $sql = "INSERT INTO kompetensi (kd_kompetensi, nama_kompetensi, prog_keahlian) VALUES ('$kd_kompetensi', '$nama_kompetensi', '$prog_keahlian')";
        return $this->db->query($sql);
    }

    public function updateKompetensi($kdKompetensi, $namaKompetensi, $progKeahlian)
    {
        $sql = "UPDATE kompetensi SET nama_kompetensi='$namaKompetensi', prog_keahlian='$progKeahlian' WHERE kd_kompetensi='$kdKompetensi'";
        return $this->db->query($sql);
    }

    public function deleteKompetensi($kd_kompetensi)
    {
        $sql = "DELETE FROM kompetensi WHERE kd_kompetensi='$kd_kompetensi'";
        return $this->db->query($sql);
    }
}
