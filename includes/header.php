<?php require_once __DIR__ . "/data.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $namaToko ?> - <?= $judulHalaman ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="main-header">
      <div class="container header-content">
        <div class="logo-area">
          <img src="asset/Logo.png" alt="Warung Ananta" class="logo-img" />
          <div class="logo-text">
            <h1 class="logo">Warung Ananta</h1>
            <p class="tagline">
              Menghadirkan Berbagai Pilihan Makanan Nusantara
            </p>
          </div>
        </div>
        <nav class="main-nav">
          <ul>
            <li><a href="home.html" class="nav-link active">Beranda</a></li>
            <li><a href="produk.html" class="nav-link">Produk</a></li>
            <li><a href="kontak.html" class="nav-link">Kontak</a></li>
            <li>
              <a href="tentang_kami.html" class="nav-link">Tentang Kami</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>