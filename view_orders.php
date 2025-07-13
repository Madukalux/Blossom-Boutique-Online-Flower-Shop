<?php
require 'db.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

// Handle delete request
if (isset($_GET['delete'])) {
    $orderId = (int) $_GET['delete'];
    $conn->query("DELETE FROM orders WHERE id = $orderId");
    header("Location: view_orders.php");
    exit();
}

$sql = "SELECT * FROM orders ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Orders</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            font-family: 'Alice', serif;
            background: url('images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #5a0064;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        a.delete-btn {
            color: white;
            background-color: crimson;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a.delete-btn:hover {
            background-color: darkred;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            background-color: white;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            color: purple;
        }

        .back-link:hover {
            background-color: #eee;
        }
    </style>
</head>
<body>

    <h2>📦 Order List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First</th>
                <th>Last</th>
                <th>Governorate</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Delivery Date</th>
                <th>Notes</th>
                <th>Ordered At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($order = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['first_name'] ?></td>
                <td><?= $order['last_name'] ?></td>
                <td><?= $order['governorate'] ?></td>
                <td><?= $order['phone_number'] ?></td>
                <td><?= $order['email'] ?></td>
                <td><?= $order['delivery_date'] ?></td>
                <td><?= $order['notes'] ?></td>
                <td><?= $order['created_at'] ?></td>
                <td>
                    <a class="delete-btn" href="view_orders.php?delete=<?= $order['id'] ?>" onclick="return confirm('Are you sure you want to delete this order?');">🗑 Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="text-center">
        <a href="admin_dashboard.php" class="back-link">⬅ Back to Dashboard</a>
    </div>

</body>
</html>
