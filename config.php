<?php
declare(strict_types=1);

// Basic secure session start
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.use_strict_mode', '1');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Demo user store (ready to be replaced with DB)
$users = [
    [
        'username' => 'admin',
        'email' => 'admin@example.com',
        'name' => 'Alex Dev',
        'role' => 'Web Developer',
        'password' => password_hash('Secret123!', PASSWORD_DEFAULT),
    ],
];

// Helper: escape output
function e(?string $str): string {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}

// Flash messages
function setFlash(string $key, string $message): void {
    $_SESSION['flash'][$key] = $message;
}
function getFlash(string $key): ?string {
    if (isset($_SESSION['flash'][$key])) {
        $msg = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $msg;
    }
    return null;
}

// Auth helpers
function isLoggedIn(): bool {
    return !empty($_SESSION['login']) && $_SESSION['login'] === true;
}
function requireLogin(): void {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}
function redirectIfLoggedIn(): void {
    if (isLoggedIn()) {
        header('Location: portfolio.php');
        exit;
    }
}

?>
