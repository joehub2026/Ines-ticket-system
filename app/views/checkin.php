<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Check-In</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include "partials/nav.php"; ?>

    <h1>Ticket Check-In</h1>

    <?php if (!empty($error)) : ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (!empty($success)) : ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=ticket&action=checkIn">
        <div>
            <label>Ticket Code</label>
            <input type="text" name="ticket_code" required>
        </div>
        <button type="submit">Check-In</button>
    </form>
    <script src="../assets/js/main.js"></script>
</body>
</html>