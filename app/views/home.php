<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INES Event Ticket Generator</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include "partials/nav.php"; ?>

    <header class="hero">
        <h1>Welcome to INES Event Ticket Generator</h1>
        <p>Register for events, lookup your ticket, and manage attendance easily.</p>
        <div class="cta-buttons">
            <a href="index.php?controller=ticket&action=register" class="btn">Register Ticket</a>
            <a href="index.php?controller=ticket&action=lookup" class="btn">Lookup Ticket</a>
            <a href="index.php?controller=auth&action=login" class="btn">Admin Login</a>
        </div>
    </header>
</body>
</html>