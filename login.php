<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;

            if (isset($user['is_admin']) && $user['is_admin'] == 1) {
                $_SESSION['admin'] = true;
                header("Location: admin_dashboard.php");
            } else {
                header("Location: home.php"); // or index.html if that's your user homepage
            }
            exit();
        } else {
            echo "❌ Invalid password.";
        }
    } else {
        echo "❌ User not found.";
    }
} else {
    echo "Please submit the form.";
}
?>
