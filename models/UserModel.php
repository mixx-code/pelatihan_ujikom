<?php
class UserModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function authenticate($username, $password)
    {
        $password = md5($password); // Gunakan md5 untuk enkripsi password

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $this->db->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
