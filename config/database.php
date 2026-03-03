<?php
class Database {
    private $host = "localhost";
    private $db_name = "ines_ticket_system";
    private $username = "root"; // your XAMPP MySQL user
    private $password = "";     // usually empty in XAMPP

    public $conn;

    public function connect() {
        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->db_name
        );

        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}