<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include "partials/nav.php"; ?>

    <h1>Dashboard</h1>

    <div class="stats">
        <div class="card">
            <h3>Total Registered</h3>
            <p><?= $totalRegistered ?></p>
        </div>
        <div class="card">
            <h3>Total Checked-In</h3>
            <p><?= $totalCheckedIn ?></p>
        </div>
    </div>

    <h2>Recent Tickets</h2>
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Event</th>
                <th>Code</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $recentTickets->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['full_name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['event_name']) ?></td>
                <td><?= htmlspecialchars($row['ticket_code']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>