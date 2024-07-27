<?php

namespace MVC\DB;

use PDO;
use PDOException;

class Database
{
    public $host;
    public $driver;
    public $dbname;
    public $username;
    public $password;
    public $conn;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->dbname = DB_NAME;
        $this->driver = DB_DRIVER;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->conn = new PDO("$this->driver:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
