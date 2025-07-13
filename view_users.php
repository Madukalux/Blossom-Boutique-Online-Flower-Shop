<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

require 'db.php';
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Users</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            background: url('images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Alice', serif;
            margin: 0;
            padding: 0;
            color: white;
        }

        .container {
            max-width: 90%;
            margin: 60px auto;
            background-color: rgba(128, 0, 128, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            color: black;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #5a0064;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f3f3f3;
        }

        a.back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: white;
            color: purple;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        a.back:hover {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>👥 All Registered Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Admin?</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['gender'] ?></td>
                    <td><?= $user['address'] ?></td>
                    <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="admin_dashboard.php" class="back">⬅ Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
