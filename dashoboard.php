<?php
include 'db.php';

// Kontrola, zda je uživatel přihlášen
if (!isset($_SESSION['current_user'])) {
    header("Location: index.php");
    exit;
}

echo "<h1>Welcome, " . $_SESSION['current_user'] . "!</h1>";
echo "<a href='logout.php'>Logout</a>";
?>