<?php
require_once __DIR__ . "/../models/Ticket.php";

class TicketController {

    // Home page
    public function home() {
        include "../app/views/home.php";
    }

    // Registration form page
    public function register() {
        include "../app/views/register.php";
    }

    // Handle registration form submission
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Server-side validation
            if (
                empty($_POST['full_name']) ||
                empty($_POST['email']) ||
                empty($_POST['phone']) ||
                empty($_POST['event_name'])
            ) {
                $error = "All fields are required.";
                include "../app/views/register.php";
                return;
            }

            $ticket = new Ticket();
            $ticketCode = $ticket->create($_POST);

            if ($ticketCode) {
                $success = "Registration successful! Your ticket code: <strong>$ticketCode</strong>";
                include "../app/views/register.php";
            } else {
                $error = "Registration failed. Please try again.";
                include "../app/views/register.php";
            }
        }
    }

    // Admin dashboard
    public function dashboard() {
        if (!isset($_SESSION['admin_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        $ticket = new Ticket();
        $totalRegistered = $ticket->countAll();
        $totalCheckedIn = $ticket->countCheckedIn();
        $recentTickets = $ticket->getAll();

        include "../app/views/dashboard.php";
    }

    // Public ticket lookup by code
    public function lookup() {
        $ticketData = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = $_POST['ticket_code'] ?? '';
            if (empty($code)) {
                $error = "Please enter a ticket code.";
            } else {
                $ticket = new Ticket();
                $ticketData = $ticket->getByCode($code);

                if (!$ticketData) {
                    $error = "Ticket not found.";
                }
            }
        }

        include "../app/views/lookup.php";
    }

    // Check-in a ticket
    public function checkIn() {
        if (!isset($_SESSION['admin_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        $error = null;
        $success = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ticketCode = $_POST['ticket_code'] ?? '';

            if (empty($ticketCode)) {
                $error = "Please enter a ticket code.";
            } else {
                $ticket = new Ticket();
                $ticketData = $ticket->getByCode($ticketCode);

                if (!$ticketData) {
                    $error = "Ticket not found.";
                } elseif ($ticketData['status'] === 'checked-in') {
                    $error = "Ticket already checked-in.";
                } else {
                    $ticket->checkIn($ticketData['id']);
                    $success = "Ticket checked-in successfully!";
                }
            }
        }

        include "../app/views/checkin.php";
    }
}