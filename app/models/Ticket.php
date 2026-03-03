<?php
require_once __DIR__ . "/../../config/database.php";

class Ticket {
    private $conn;
    private $table = "tickets";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Generate a unique ticket code
    public function generateTicketCode() {
        return "INES-" . date("Y") . "-" . strtoupper(substr(md5(uniqid()), 0, 6));
    }

    // Create a new ticket
    public function create($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (full_name, email, phone, event_name, ticket_code) 
                  VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $ticket_code = $this->generateTicketCode();

        $stmt->bind_param(
            "sssss",
            $data['full_name'],
            $data['email'],
            $data['phone'],
            $data['event_name'],
            $ticket_code
        );

        if ($stmt->execute()) {
            return $ticket_code;
        }

        return false;
    }

    // Get all tickets (descending order)
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM tickets ORDER BY created_at DESC");
        return $result;
    }

    // Get a ticket by its code
    public function getByCode($code) {
        $query = "SELECT * FROM tickets WHERE ticket_code = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $code);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Mark a ticket as checked-in
    public function checkIn($id) {
        $query = "UPDATE tickets SET status='checked-in' WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Count all tickets
    public function countAll() {
        return $this->conn->query("SELECT COUNT(*) as total FROM tickets")
                          ->fetch_assoc()['total'];
    }

    // Count checked-in tickets
    public function countCheckedIn() {
        return $this->conn->query("SELECT COUNT(*) as total FROM tickets WHERE status='checked-in'")
                          ->fetch_assoc()['total'];
    }
}