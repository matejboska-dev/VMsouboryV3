<?php
include 'db.php';
$username = $_GET['user'];
$qr_code = $_GET['code'];

// Ověření QR kódu
if (verify_qr_code($username, $qr_code)) {
    login_user($username);
    echo "<h1>QR Code verified. Please set your password:</h1>";
    echo "<form action='dashboard.php' method='post'>";
    echo "<label>Password: <input type='password' name='password' required></label><br>";
    echo "<button type='submit'>Submit</button>";
    echo "</form>";
} else {
    echo "Invalid or expired QR code.";
}
?>