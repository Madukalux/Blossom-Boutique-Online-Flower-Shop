<?php
require 'db.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

// Delete product if requested
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM products WHERE id = $id");
    header("Location: view_products.php");
    exit();
}

$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Products</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #fff0f5;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #8e24aa;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #8e24aa;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        img {
            max-height: 80px;
        }
        .delete-btn {
            padding: 6px 12px;
            background: crimson;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .delete-btn:hover {
            background: darkred;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
            color: purple;
        }
    </style>
</head>
<body>

    <h2>🌸 All Products</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Preview</th>
                <th>Name</th>
                <th>Price (LKR)</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><img src="<?= $row['image_url'] ?>" alt="Product Image"></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td>
                        <a href="view_products.php?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure to delete this product?')">🗑 Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a href="admin_dashboard.php" class="back-link">⬅ Back to Dashboard</a>

</body>
</html>
