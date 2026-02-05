<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Penjualan | Portofolio</title>
  <meta name="description" content="Halaman penjualan dengan desain minimalis dan elegan." />
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    .hero-sale { padding: 4rem 0 2rem; text-align: center; }
    .hero-sale h1 { font-size: clamp(2rem, 4vw, 3rem); margin: 0 0 .7rem; }
    .hero-sale p { margin: 0 auto 1.2rem; max-width: 58ch; color: var(--muted); }
    .sale-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1rem; }
    .sale-card { grid-column: span 4; background: var(--card); border: 1px solid var(--border); border-radius: 1rem; overflow: hidden; display: flex; flex-direction: column; }
    .sale-media { aspect-ratio: 4/3; background: linear-gradient(135deg, #0b1220, #0f172a); display: grid; place-items: center; color: #c7d2fe; font-weight: 700; letter-spacing: .3px; }
    .sale-body { padding: 1rem; display: grid; gap: .6rem; }
    .price { font-weight: 700; color: #e2e8f0; font-size: 1.1rem; }
    .muted-small { color: var(--muted); font-size: .92rem; }
    .sale-cta { display: flex; gap: .6rem; }

    .sale-panel { background: linear-gradient(180deg, rgba(255,255,255,.02), rgba(255,255,255,.01)); border: 1px solid var(--border); border-radius: 1rem; padding: 1.2rem; }

    @media (max-width: 880px) {
      .sale-card { grid-column: span 6; }
    }
    @media (max-width: 520px) {
      .sale-card { grid-column: span 12; }
    }
  </style>
</head>
<body>
<header>
  <div class="container nav">
    <div class="brand">Nama<span>Anda</span></div>
    <nav>
      <ul>
        <li><a href="index.php#home">Home</a></li>
        <li><a href="index.php#tentang">Tentang</a></li>
        <li><a href="index.php#proyek">Proyek</a></li>
        <li><a href="index.php#kontak">Kontak</a></li>
        <li><a class="btn secondary" href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>

<main class="container">
  <section class="hero-sale">
    <h1>Produk Unggulan</h1>
    <p>Temukan rangkaian produk digital yang dirancang dengan fokus pada kualitas, performa, dan kemudahan penggunaan.</p>
    <div class="skills" style="justify-content:center">
      <span class="chip">Minimalis</span>
      <span class="chip">Elegan</span>
      <span class="chip">Modern</span>
    </div>
  </section>

  <section>
    <div class="sale-grid">
      <?php
      $items = [
        ['name' => 'Template Landing Page', 'desc' => 'Landing page profesional siap pakai untuk bisnis Anda.', 'price' => 199000, 'label' => 'LP'],
        ['name' => 'UI Kit Komponen', 'desc' => 'Komponen UI konsisten untuk pengembangan cepat.', 'price' => 249000, 'label' => 'UI'],
        ['name' => 'Starter API PHP', 'desc' => 'Paket starter API dengan struktur bersih dan dokumentasi.', 'price' => 299000, 'label' => 'API'],
      ];

      function rupiah($v){ return 'Rp ' . number_format($v, 0, ',', '.'); }

      foreach ($items as $it): ?>
        <article class="sale-card">
          <div class="sale-media"><?= htmlspecialchars($it['label']) ?></div>
          <div class="sale-body">
            <h3 style="margin:0; font-size:1.1rem;"><?= htmlspecialchars($it['name']) ?></h3>
            <p class="muted-small" style="margin:0;"><?= htmlspecialchars($it['desc']) ?></p>
            <div class="price"><?= rupiah($it['price']) ?></div>
            <div class="sale-cta">
              <a class="btn" href="#">Beli Sekarang</a>
              <a class="btn secondary" href="#">Detail</a>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section>
    <div class="sale-panel">
      <h2>Pertanyaan Umum</h2>
      <details>
        <summary>Kapan saya menerima produk?</summary>
        <p class="muted">Produk digital tersedia langsung setelah pembayaran terkonfirmasi.</p>
      </details>
      <details>
        <summary>Apakah ada dukungan setelah pembelian?</summary>
        <p class="muted">Ya, dukungan dasar 14 hari melalui email.</p>
      </details>
    </div>
  </section>
</main>

<footer>
  <div class="container">
    <small>© <?= date('Y') ?> Nama Anda. Halaman Penjualan.</small>
  </div>
</footer>

</body>
</html>