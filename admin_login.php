<?php
require 'db.php';
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE email = ? AND is_admin = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($admin = $result->fetch_assoc()) {
    if (password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ Admin access denied.";
}
?>
