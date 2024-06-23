<?php
class Matpel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM matpel";
        $result = $this->db->query($sql);
        $data = [];

        while ($row = $this->db->fetch_array($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getMatpel($kd_matpel)
    {
        $sql = "SELECT * FROM matpel WHERE kd_matpel ='$kd_matpel'";
        $result = $this->db->query($sql);
        return $this->db->fetch_array($result);
    }

    public function addMatpel($kd_matpel, $nama_matpel, $jumlah_jam, $tingkat, $kd_kompetensi, $nip)
    {
        $sql = "INSERT INTO matpel VALUES ('$kd_matpel', '$nama_matpel', '$jumlah_jam', '$tingkat', '$kd_kompetensi', '$nip')";
        return $this->db->query($sql);
    }

    public function updateMatpel($kd_matpel, $nama_matpel, $jumlah_jam, $tingkat, $kd_kompetensi, $nip)
    {
        $sql = "UPDATE matpel SET nama_matpel='$nama_matpel', jumlah_jam='$jumlah_jam', tingkat='$tingkat', kd_kompetensi='$kd_kompetensi', nip='$nip' WHERE kd_matpel='$kd_matpel'";
        return $this->db->query($sql);
    }

    public function deleteMatpel($kd_matpel)
    {
        $sql = "DELETE FROM matpel WHERE kd_matpel='$kd_matpel'";
        return $this->db->query($sql);
    }
}
