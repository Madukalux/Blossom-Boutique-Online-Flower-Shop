<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- fonts -->
    <link href="https://fonts.cdnfonts.com/css/mango-vintage-personal-use-only" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/alice-2" rel="stylesheet">

    <!-- style & bootstrap -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="CSS/style.css">

    <!-- icon -->
    <link rel="icon" href="images/icon.png">
</head>

<body class="background-color">
    <!-- Start nav bar -->
    <nav class="p-3 mb-0">
        <ul class="d-flex justify-content-around align-items-center mb-0">
            <li><a href="home.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li class="none">
                <h2 class="mb-0">Blooming Beauty</h2>
            </li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="logout.php" class="btn btn-outline-danger btn-sm ms-3">Logout</a></li>
        </ul>
    </nav>
    <!-- end nav bar -->


    <!-- Start background section -->
    <div class="background animation">
        <h1 class="head text-center">Our Products</h1>
    </div>
    <!-- end background section -->


    <!-- Start products section -->
    <div class="products ani pt-5">
        <div class="container text-center"></div>
    </div>
    <!-- end products section -->


<!-- footer -->
<footer class="ani mt-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="text-white">Links</h3>
                <ul>
                    <li><a class="text-white-50" href="home.html">Home</a></li>
                    <li><a class="text-white-50" href="products.html">Products</a></li>
                    <li><a class="text-white-50" href="about.html">About Us</a></li>
                    <li><a class="text-white-50" href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3 class="text-white">Follow Us</h3>
                <ul>
                    <li><a class="text-white-50" ><i class="fa-brands fa-facebook me-2"></i> Facebook</a>
                    </li>
                    <li><a class="text-white-50" href=""><i class="fa-brands fa-instagram me-2"></i> Instagram</a>
                    </li>
                    <li><a class="text-white-50" href=><i class="fa-brands fa-pinterest me-2"></i> Pinterest</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3 class="text-white">Team Members</h3>
                <ul>
                    <li><a class="text-white-50" href="about.html#randima">Randima Nikapitiya</a></li>
                    <li><a class="text-white-50" href="about.html#gaganathara">Gaganthara Suraweera</a></li>
                    <li><a class="text-white-50" href="about.html#gagani">Gagani Jayasekara</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

    <script src="JS/main.js"></script>
    <script src="JS/products.js"></script>
</body>

</html>