<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts and Styles -->
    <link href="https://fonts.cdnfonts.com/css/mango-vintage-personal-use-only" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/alice-2" rel="stylesheet">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">

    <style>
        body {
            background:url(../images/backgroundImg.jpeg);
            background-size: cover;
            font-family: 'Alice', serif;
        }

        .background-img {
            background:url(../images/backgroundImg.jpeg), rgba(255, 255, 255, 35%);
            background-size: cover;
            background-blend-mode: overlay;
        }

        .dashboard-container {
            max-width: 600px;
            margin: 100px auto;
            padding: 40px;
            background-color: rgba(70, 0, 100, 0.9);
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .dashboard-container h1 {
            font-size: 36px;
            margin-bottom: 30px;
            color: #fff;
            font-family: 'Mango Vintage Personal Use Only', sans-serif;
        }

        .dashboard-container .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .dashboard-container a.btn {
            font-size: 18px;
            padding: 12px 20px;
            font-weight: bold;
            background-color: #fff;
            color: #800080;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .dashboard-container a.btn:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="p-3 mb-0">
        <ul class="d-flex justify-content-around align-items-center mb-0">
            <li><a href="home.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li class="none"><h2 class="mb-0">Blooming Beauty</h2></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="logout.php" class="btn btn-outline-light btn-sm ms-3">Logout</a></li>
        </ul>
    </nav>

    <!-- Dashboard -->
    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>
        <div class="btn-group">
            <a href="view_users.php" class="btn">View Users</a>
            <a href="view_orders.php" class="btn">View Orders</a>
            <a href="add_product.php" class="btn">Add Product</a>
            <a href="view_products.php" class="btn">Manage Products</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="ani mt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-sm-4">
                    <h3 class="text-white">Links</h3>
                    <ul>
                        <li><a class="text-white-50" href="home.php">Home</a></li>
                        <li><a class="text-white-50" href="products.php">Products</a></li>
                        <li><a class="text-white-50" href="about.html">About Us</a></li>
                        <li><a class="text-white-50" href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3 class="text-white">Follow Us</h3>
                    <ul>
                        <li><a class="text-white-50" href="#"><i class="fa-brands fa-facebook me-2"></i>Facebook</a></li>
                        <li><a class="text-white-50" href="#"><i class="fa-brands fa-instagram me-2"></i>Instagram</a></li>
                        <li><a class="text-white-50" href="#"><i class="fa-brands fa-pinterest me-2"></i>Pinterest</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3 class="text-white">Team Members</h3>
                    <ul>
                        <li><a class="text-white-50" href="about.html#randima">Randima Nikapitiya</a></li>
                        <li><a class="text-white-50" href="about.html#gaganthara">Gaganthara Suraweera</a></li>
                        <li><a class="text-white-50" href="about.html#gagani">Gagani Jayasekara</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
