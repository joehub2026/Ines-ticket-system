<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Lookup</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include "partials/nav.php"; ?>

    <h1>Lookup Ticket</h1>

    <?php if (!empty($error)) : ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=ticket&action=lookup">
        <div>
            <label>Ticket Code</label>
            <input type="text" name="ticket_code" required>
        </div>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($ticketData)) : ?>
        <h2>Ticket Details</h2>
        <table>
            <tr>
                <th>Full Name</th>
                <td><?= htmlspecialchars($ticketData['full_name']) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($ticketData['email']) ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?= htmlspecialchars($ticketData['phone']) ?></td>
            </tr>
            <tr>
                <th>Event</th>
                <td><?= htmlspecialchars($ticketData['event_name']) ?></td>
            </tr>
            <tr>
                <th>Ticket Code</th>
                <td><?= htmlspecialchars($ticketData['ticket_code']) ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?= htmlspecialchars($ticketData['status']) ?></td>
            </tr>
        </table>
    <?php endif; ?>
    <script src="../assets/js/main.js"></script>
</body>
</html>