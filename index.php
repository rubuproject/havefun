<?php
session_start();
// Proteksi: wajib login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Handler Form Kontak Sederhana
$successMsg = null;
$errorMsg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    // Validasi sederhana
    if ($nama === '' || $email === '' || $pesan === '') {
        $errorMsg = 'Semua field wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = 'Format email tidak valid.';
    } else {
        // Di sini Anda bisa menambahkan logika penyimpanan DB atau pengiriman email
        // Untuk demo, kita hanya menampilkan pesan sukses
        $successMsg = 'Terima kasih, ' . htmlspecialchars($nama) . '. Pesan Anda telah diterima.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portofolio | <?= htmlspecialchars('Nama Anda') ?></title>
    <meta name="description" content="Portofolio profesional menampilkan proyek, keterampilan, dan kontak." />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<header>
    <div class="container nav">
        <div class="brand">Nama<span>Anda</span></div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#proyek">Proyek</a></li>
                <li><a href="#kontak">Kontak</a></li>
                <li><a href="sales.php">Penjualan</a></li>
                <li><a class="btn secondary" href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <!-- Hero -->
    <section id="home" class="hero">
        <div>
            <h1>Developer Web Full-Stack</h1>
            <p class="muted">Membangun solusi web modern, cepat, dan andal. Spesialisasi di PHP, JavaScript, dan desain antarmuka yang responsif.</p>
            <div class="cta">
                <a class="btn" href="#proyek">Lihat Proyek</a>
                <a class="btn secondary" href="#kontak">Hubungi Saya</a>
            </div>
            <div class="skills">
                <span class="chip">PHP</span>
                <span class="chip">JavaScript</span>
                <span class="chip">HTML/CSS</span>
                <span class="chip">MySQL</span>
                <span class="chip">Laravel</span>
                <span class="chip">REST API</span>
            </div>
        </div>
        <div class="card hero card">
            <div class="project-thumb">Profil</div>
            <div class="project-body">
                <p>Saya adalah pengembang web dengan fokus pada performa, aksesibilitas, dan pengalaman pengguna. Saya suka mengubah ide menjadi produk yang nyata dan bermanfaat.</p>
            </div>
        </div>
    </section>

    <!-- Tentang -->
    <section id="tentang">
        <h2>Tentang Saya</h2>
        <p class="muted">Saya memiliki pengalaman dalam membangun aplikasi web dari tahap perencanaan hingga produksi. Terbiasa bekerja dengan tim lintas fungsi dan menerapkan praktik terbaik seperti modularisasi, reusable components, dan automasi build/deploy.</p>
        <div class="grid">
            <div class="panel col-6">
                <h3>Keahlian Inti</h3>
                <ul>
                    <li>Backend: PHP (Laravel), Node.js</li>
                    <li>Frontend: JavaScript (ES6+), Vue/React dasar</li>
                    <li>Database: MySQL, PostgreSQL</li>
                    <li>DevOps: Git, CI/CD, Docker dasar</li>
                </ul>
            </div>
            <div class="panel col-6">
                <h3>Pencapaian</h3>
                <ul>
                    <li>Mengoptimalkan performa aplikasi sehingga TTFB turun 40%</li>
                    <li>Mendesain API yang melayani 100k+ request/hari</li>
                    <li>Memimpin migrasi monolith ke arsitektur modular</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Proyek -->
    <section id="proyek">
        <h2>Proyek Unggulan</h2>
        <div class="grid">
            <?php
            $projects = [
                [
                    'title' => 'Dashboard Analytics',
                    'desc' => 'Dashboard interaktif untuk memonitor KPI bisnis secara real-time.',
                    'tags' => ['PHP', 'MySQL', 'Chart.js'],
                    'demo' => '#',
                    'repo' => '#'
                ],
                [
                    'title' => 'E-Commerce Mini',
                    'desc' => 'Toko online sederhana dengan fitur keranjang, checkout, dan admin panel.',
                    'tags' => ['Laravel', 'Blade', 'Stripe'],
                    'demo' => '#',
                    'repo' => '#'
                ],
                [
                    'title' => 'Landing Page Opt-in',
                    'desc' => 'Landing page performa tinggi dengan A/B testing dan tracking.',
                    'tags' => ['HTML', 'CSS', 'Vanilla JS'],
                    'demo' => '#',
                    'repo' => '#'
                ],
            ];

            foreach ($projects as $p): ?>
                <article class="project-card col-4">
                    <div class="project-thumb"><?= htmlspecialchars($p['title'][0]) ?></div>
                    <div class="project-body">
                        <h3><?= htmlspecialchars($p['title']) ?></h3>
                        <p><?= htmlspecialchars($p['desc']) ?></p>
                        <div class="project-tags">
                            <?php foreach ($p['tags'] as $t): ?>
                                <span class="chip"><?= htmlspecialchars($t) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="project-actions">
                            <a class="btn secondary" href="<?= htmlspecialchars($p['demo']) ?>" target="_blank" rel="noopener">Demo</a>
                            <a class="btn" href="<?= htmlspecialchars($p['repo']) ?>" target="_blank" rel="noopener">Repository</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak">
        <h2>Kontak</h2>
        <p class="muted">Tertarik berkolaborasi atau memiliki proyek yang ingin dibahas? Kirim pesan melalui formulir berikut.</p>

        <?php if ($successMsg): ?>
            <div class="msg success"><?= $successMsg ?></div>
        <?php elseif ($errorMsg): ?>
            <div class="msg error"><?= $errorMsg ?></div>
        <?php endif; ?>

        <div class="panel">
            <form method="post" action="#kontak" novalidate>
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Nama lengkap" value="<?= isset($nama) ? htmlspecialchars($nama) : '' ?>" required />
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="email@domain.com" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required />
                </div>
                <div>
                    <label for="pesan">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="5" placeholder="Ceritakan kebutuhan Anda" required><?= isset($pesan) ? htmlspecialchars($pesan) : '' ?></textarea>
                </div>
                <button class="btn" type="submit">Kirim Pesan</button>
            </form>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <small>© <?= date('Y') ?> Nama Anda. Dibuat dengan PHP, HTML, CSS.</small>
    </div>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>