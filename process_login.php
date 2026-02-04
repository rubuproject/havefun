<?php
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$identifier = trim((string)($_POST['identifier'] ?? ''));
$password   = (string)($_POST['password'] ?? '');

if ($identifier === '' || $password === '') {
    setFlash('error', 'Mohon isi semua kolom.');
    header('Location: login.php');
    exit;
}

// Find user by username or email
$found = null;
foreach ($users as $u) {
    if (strcasecmp($u['username'], $identifier) === 0 || strcasecmp($u['email'], $identifier) === 0) {
        $found = $u;
        break;
    }
}

if (!$found) {
    setFlash('error', 'Username/email atau password salah.');
    header('Location: login.php');
    exit;
}

if (!password_verify($password, $found['password'])) {
    setFlash('error', 'Username/email atau password salah.');
    header('Location: login.php');
    exit;
}

// Success
$_SESSION['login'] = true;
$_SESSION['user'] = [
    'username' => $found['username'],
    'email'    => $found['email'],
    'name'     => $found['name'],
    'role'     => $found['role'],
];

header('Location: portfolio.php');
exit;
