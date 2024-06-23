<?php
class Guru
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM guru";
        $result = $this->db->query($sql);
        $data = [];

        while ($row = $this->db->fetch_array($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getGuru($nip)
    {
        $sql = "SELECT * FROM guru WHERE nip='$nip'";
        $result = $this->db->query($sql);
        return $this->db->fetch_array($result);
    }

    public function addGuru($nip, $nama, $tempatLahir, $tglLahir, $jk, $alamat, $noHp, $pendidikan)
    {
        $sql = "INSERT INTO guru VALUES ('$nip', '$nama', '$tempatLahir', '$tglLahir', '$jk', '$alamat', '$noHp', '$pendidikan')";
        return $this->db->query($sql);
    }

    public function updateGuru($nip, $nama, $tempatLahir, $tglLahir, $jk, $alamat, $noHp, $pendidikan)
    {
        $sql = "UPDATE guru SET nama_guru='$nama', tempat_lahir='$tempatLahir', tgl_lahir='$tglLahir', jenkel='$jk', alamat='$alamat', no_hp='$noHp', pend_akhir='$pendidikan' WHERE nip='$nip'";
        return $this->db->query($sql);
    }

    public function deleteGuru($nip)
    {
        $sql = "DELETE FROM guru WHERE nip='$nip'";
        return $this->db->query($sql);
    }
}
