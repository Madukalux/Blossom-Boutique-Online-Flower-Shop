<?php
require 'db.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO products (name, price, image_url, description) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $price, $target_file, $description);
    $stmt->execute();

    echo "<script>alert('Product added successfully!'); window.location='admin_dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 40px;
            color: black;
        }
        form {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 {
            text-align: center;
            color: black;
        }
        label {
            font-weight: bold;
            color: black;
        }
        input, textarea {
            width: 100%;
            margin: 10px 0 20px;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            color: black;
        }
        button {
            background: purple;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background: darkmagenta;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: black;
        }
    </style>
</head>
<body>

    <h2>➕ Add New Product</h2>

    <form action="add_product.php" method="POST" enctype="multipart/form-data">
        <label>Product Name:</label>
        <input type="text" name="name" required>

        <label>Price (LKR):</label>
        <input type="number" name="price" required>

        <label>Product Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <button type="submit">Add Product</button>
        <a href="admin_dashboard.php">🔙 Back to Dashboard</a>
    </form>

</body>
</html>
