<?php
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name = "db_sekolah";
    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function fetch_array($result)
    {
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function close()
    {
        $this->connection->close();
    }
}
