<?php
require __DIR__ . '/config.php';
requireLogin();
$user = $_SESSION['user'] ?? ['name' => 'User', 'role' => 'Web Developer', 'email' => '', 'username' => ''];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($user['name']) ?> • Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="nav">
    <div class="container nav-inner">
      <div class="brand-row">
        <span class="brand-logo">•</span>
        <a class="brand-name" href="portfolio.php"><?= e($user['name']) ?></a>
      </div>
      <nav class="nav-actions">
        <a class="btn btn-ghost" href="logout.php">Logout</a>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero container animate-fade">
      <div class="hero-content">
        <h1 class="hero-title"><?= e($user['name']) ?></h1>
        <p class="hero-subtitle"><?= e($user['role']) ?></p>
        <div class="hero-meta">
          <span class="badge">@<?= e($user['username']) ?></span>
          <span class="dot"></span>
          <span class="muted"><?= e($user['email']) ?></span>
        </div>
      </div>
      <div class="hero-media">
        <img class="avatar" src="assets/images/profile.svg" alt="Foto profil <?= e($user['name']) ?>">
      </div>
    </section>

    <section class="container section animate-fade">
      <h2 class="section-title">Skills</h2>
      <ul class="chip-list">
        <li class="chip">PHP</li>
        <li class="chip">JavaScript</li>
        <li class="chip">HTML</li>
        <li class="chip">CSS</li>
        <li class="chip">MySQL</li>
        <li class="chip">Git</li>
      </ul>
    </section>

    <section class="container section animate-fade">
      <h2 class="section-title">Projects</h2>
      <div class="grid cards">
        <article class="card">
          <div class="card-body">
            <h3 class="card-title">Portfolio Minimalis</h3>
            <p class="card-text">Website portfolio dengan desain clean, responsif, dan fokus pada konten.</p>
            <div class="tag-list">
              <span class="tag">PHP</span>
              <span class="tag">CSS Grid</span>
              <span class="tag">Vanilla JS</span>
            </div>
          </div>
          <div class="card-footer">
            <a class="btn btn-secondary" href="#">Detail</a>
          </div>
        </article>

        <article class="card">
          <div class="card-body">
            <h3 class="card-title">Auth Session</h3>
            <p class="card-text">Implementasi login sederhana berbasis PHP Session, siap dikembangkan.</p>
            <div class="tag-list">
              <span class="tag">Session</span>
              <span class="tag">Security</span>
            </div>
          </div>
          <div class="card-footer">
            <a class="btn btn-secondary" href="#">Detail</a>
          </div>
        </article>

        <article class="card">
          <div class="card-body">
            <h3 class="card-title">Responsive UI Kit</h3>
            <p class="card-text">Komponen UI reusable dengan fokus minimalis dan aksesibilitas.</p>
            <div class="tag-list">
              <span class="tag">UI/UX</span>
              <span class="tag">Accessibility</span>
            </div>
          </div>
          <div class="card-footer">
            <a class="btn btn-secondary" href="#">Detail</a>
          </div>
        </article>
      </div>
    </section>

    <section class="container section animate-fade">
      <h2 class="section-title">Connect</h2>
      <div class="socials">
        <a href="#" class="social">LinkedIn</a>
        <a href="#" class="social">GitHub</a>
        <a href="#" class="social">Twitter</a>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">
      <p class="muted tiny">© <?= date('Y') ?> <?= e($user['name']) ?>. All rights reserved.</p>
    </div>
  </footer>

  <script src="assets/js/script.js"></script>
</body>
</html>
