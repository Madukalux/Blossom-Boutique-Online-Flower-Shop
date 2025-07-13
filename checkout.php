<?php
require 'db.php';

session_start();
if (!isset($_SESSION['user'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

// Get POST data from the form
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$governorate = $_POST['governorate'];
$phone = $_POST['phoneNumber'];
$email = $_POST['email'];
$date = $_POST['date'];
$notes = $_POST['notes'];

// SQL insert
$sql = "INSERT INTO orders (first_name, last_name, governorate, phone_number, email, delivery_date, notes)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $first, $last, $governorate, $phone, $email, $date, $notes);
$stmt->execute();

// Redirect to thank you page
header("Location: thanksContact.html");
exit();
?>
