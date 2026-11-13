<?php require_once __DIR__ . "/data.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($judulHalaman ?? "Beranda") ?> - <?= htmlspecialchars($namaToko) ?></title>
  <link rel="stylesheet" href="style.css">
  <?= $extraHead ?? '' ?>
</head>
<body>

  <!-- ===== INI HEADER ===== -->
  <header class="main-header">
    <div class="container header-content">
      <div class="logo-area">
        <a href="home.php" style="display:flex; align-items:center; gap:12px; text-decoration:none; color:inherit;">
          <img src="asset/Logo_ina_icon.png" alt="<?= htmlspecialchars($namaToko) ?>" class="logo-img" />
          <div class="logo-text">
            <h1 class="logo"><?= htmlspecialchars($namaToko) ?></h1>
            <p class="tagline"><?= htmlspecialchars($tagline) ?></p>
          </div>
        </a>
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="home.php" class="nav-link <?= ($halamanAktif ?? '') === 'home' ? 'active' : '' ?>">Beranda</a></li>
          <li><a href="produk.php" class="nav-link <?= ($halamanAktif ?? '') === 'produk' ? 'active' : '' ?>">Produk</a></li>
          <li><a href="kontak.php" class="nav-link <?= ($halamanAktif ?? '') === 'kontak' ? 'active' : '' ?>">Kontak</a></li>
          <li><a href="tentang_kami.php" class="nav-link <?= ($halamanAktif ?? '') === 'tentang_kami' ? 'active' : '' ?>">Tentang Kami</a></li>
        </ul>
      </nav>
    </div>
  </header>
