<?php
require_once __DIR__ . "/../models/User.php";

class AuthController {

    public function login() {
        include "../app/views/login.php";
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $error = "Both fields are required.";
                include "../app/views/login.php";
                return;
            }

            $userModel = new User();
            $user = $userModel->authenticate($username, $password);

            if ($user) {
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                header("Location: index.php?controller=ticket&action=dashboard");
                exit;
            } else {
                $error = "Invalid username or password.";
                include "../app/views/login.php";
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
        exit;
    }
}