<?php
require __DIR__ . '/config.php';
redirectIfLoggedIn();
$error = getFlash('error');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk • Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="auth-bg">
  <main class="centered">
    <section class="card login-card animate-fade">
      <h1 class="brand">Welcome Back</h1>
      <p class="muted">Masuk untuk mengakses portfolio</p>
      <?php if ($error): ?>
        <div class="alert alert-error"><?= e($error) ?></div>
      <?php endif; ?>
      <form class="form" action="process_login.php" method="post" autocomplete="off" novalidate>
        <div class="field">
          <label for="identifier">Username atau Email</label>
          <input type="text" id="identifier" name="identifier" placeholder="mis. admin atau admin@example.com" required>
        </div>
        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-primary">Masuk</button>
      </form>
      <p class="tiny muted">Demo: admin / Secret123!</p>
    </section>
  </main>
  <script src="assets/js/script.js"></script>
</body>
</html>
