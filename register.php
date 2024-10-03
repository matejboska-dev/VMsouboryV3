<?php
include 'db.php';
$username = $_POST['username'];
$password = $_POST['password'];

// Kontrola, zda uživatel již neexistuje
if (isset($_SESSION['users'][$username])) {
    echo "Username already exists. Please choose another one.";
    exit;
}

// Registrace uživatele
register_user($username, $password);

// Generování QR kódu
$qr_code = md5(uniqid($username, true));  // Unikátní kód pro QR
save_qr_code($username, $qr_code);

// Zobrazení QR kódu
echo "<h2>Scan this QR Code within 5 minutes:</h2>";
echo "<img src='https://api.qrserver.com/v1/create-qr-code/?data=http://s-boska-24.dev.spsejecna.net/qrkodiky/verify_qr.php?user=$username&code=$qr_code&size=150x150' alt='QR Code'>";
?>
