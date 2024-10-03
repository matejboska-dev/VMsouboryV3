<?php
include 'db.php';
$username = $_POST['username'];
$password = $_POST['password'];

// Ověření uživatele
if (verify_user($username, $password)) {
    login_user($username);
    header("Location: dashboard.php");
    exit;
} else {
    echo "Invalid username or password.";
}
?>