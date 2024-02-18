<?php

class Database
{

    //specify your own database
    private $host = "localhost";
    private $db_name = "stoic_quotes";
    private $username = "nemanja";
    private $password = "123";
    public $conn;

    // get database connection

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
