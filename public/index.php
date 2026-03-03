<?php
session_start();

// Load database and controllers
require_once "../config/database.php";
require_once "../app/controllers/TicketController.php";
require_once "../app/controllers/AuthController.php";

// Determine controller and action from URL
$controller = $_GET['controller'] ?? 'ticket';
$action = $_GET['action'] ?? 'home';

// Instantiate the correct controller
switch ($controller) {
    case 'ticket':
        $ticketController = new TicketController();
        $controllerInstance = $ticketController;
        break;

    case 'auth':
        $authController = new AuthController();
        $controllerInstance = $authController;
        break;

    default:
        die("Controller not found.");
}

// Check if the action exists in the controller
if (!method_exists($controllerInstance, $action)) {
    die("Action not found.");
}

// Call the action
$controllerInstance->$action();