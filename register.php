<?php
require 'db.php';

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$address = $_POST['address'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];

$sql = "INSERT INTO users (first_name, last_name, email, password, address, phone, gender)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $first, $last, $email, $password, $address, $phone, $gender);

if ($stmt->execute()) {
    header("Location: login.html");
} else {
    echo "Error: " . $stmt->error;
}
?>
