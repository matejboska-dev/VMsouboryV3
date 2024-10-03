<?php
session_start();

// Simulace databáze uživatelů (uloženo v paměti serveru)
$_SESSION['users'] = $_SESSION['users'] ?? [];

// Funkce pro uložení nového uživatele
function register_user($username, $password) {
    $_SESSION['users'][$username] = [
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'qr_code' => null,
        'is_logged_in' => false,
    ];
}

// Funkce pro ověření uživatele
function verify_user($username, $password) {
    if (isset($_SESSION['users'][$username])) {
        return password_verify($password, $_SESSION['users'][$username]['password']);
    }
    return false;
}

// Funkce pro uložení QR kódu
function save_qr_code($username, $qr_code) {
    if (isset($_SESSION['users'][$username])) {
        $_SESSION['users'][$username]['qr_code'] = $qr_code;
    }
}

// Funkce pro ověření QR kódu
function verify_qr_code($username, $qr_code) {
    return isset($_SESSION['users'][$username]) && $_SESSION['users'][$username]['qr_code'] === $qr_code;
}

// Funkce pro přihlášení uživatele
function login_user($username) {
    if (isset($_SESSION['users'][$username])) {
        $_SESSION['users'][$username]['is_logged_in'] = true;
        $_SESSION['current_user'] = $username;
    }
}

// Funkce pro odhlášení uživatele
function logout_user() {
    session_destroy();
}
?>