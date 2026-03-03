<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Ticket</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <?php include "partials/nav.php"; ?>

    <h1>Register Attendee</h1>

    <?php if (!empty($error)) : ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (!empty($success)) : ?>
        <p class="success"><?= $success ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=ticket&action=store">
        <div>
            <label>Full Name</label>
            <input type="text" name="full_name" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Phone</label>
            <input type="text" name="phone" required>
        </div>
        <div>
            <label>Event Name</label>
            <input type="text" name="event_name" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <script src="../assets/js/main.js"></script>
</body>
</html>