<?php
require_once __DIR__ . "/../../config/database.php";

class User {
    private $conn;
    private $table = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Authenticate user (admin)
    public function authenticate($username, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();

        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }

        return false;
    }
}