<?php
session_start();

// Jika sudah login, arahkan ke portofolio
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$error = null;
$email = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        $error = 'Email dan password wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid.';
    } else {
        // Kredensial demo
        $validEmail = 'payung@gmail.com';
        $validPass = 'koncet123';

        if (hash_equals($validEmail, $email) && hash_equals($validPass, $password)) {
            $_SESSION['user'] = [
                'email' => $email,
                'name' => 'Demo User'
            ];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Email atau password salah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Portofolio</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    .auth-wrap { min-height: 100vh; display: grid; place-items: center; }
    .auth-card { width: min(420px, 92%); }
    .auth-header { text-align: center; margin-bottom: 1rem; }
    .hint { font-size: .85rem; color: var(--muted); margin-top: .6rem; }
  </style>
</head>
<body>
  <main class="auth-wrap">
    <div class="panel auth-card">
      <div class="auth-header">
        <h1 style="margin:0 0 .25rem">Masuk</h1>
        <p class="muted" style="margin:0">Silakan login untuk mengakses portofolio.</p>
      </div>

      <?php if ($error): ?>
        <div class="msg error" role="alert"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="post" novalidate>
        <div>
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="user@example.com" value="<?= htmlspecialchars($email) ?>" required />
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required />
        </div>
        <button class="btn" type="submit" style="width:100%">Masuk</button>
        <p class="hint">Kredensial demo: user@example.com / secret123</p>
      </form>
    </div>
  </main>
</body>
</html>