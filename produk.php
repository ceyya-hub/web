<?php
$judulHalaman = "Daftar Mobil & Produk";
$halamanAktif = "produk";
include "includes/header.php";
?>

  <main>
    <div class="container">
      <!-- Kotak pencarian -->
      <div class="search-bar">
        <input
          type="text"
          class="search-input"
          id="input-cari"
          placeholder="Cari berdasarkan nama mobil atau kategori..."
        />
        <button class="btn-search" id="btn-cari" type="button">Cari</button>
      </div>

      <!-- Layout 2 kolom: filter + daftar produk -->
      <div class="produk-layout">
        <!-- Kolom kiri: filter + keranjang -->
        <div class="produk-sidebar">
          <aside class="filter-sidebar" id="filter-kategori">
            <h3>Kategori Filter</h3>
            <ul class="filter-list">
              <?php foreach ($kategoriList as $key => $label): ?>
              <li>
                <label><input class="cek-kategori" type="checkbox" value="<?= $key ?>" /> <?= htmlspecialchars($label) ?></label>
              </li>
              <?php endforeach; ?>
            </ul>
          </aside>

          <section class="cart-panel" aria-live="polite">
            <div class="cart-heading">
              <div>
                <h2>Keranjang belanja</h2>
                <p><span id="jumlah-keranjang">0</span> item dipilih</p>
              </div>
              <span class="cart-icon" aria-hidden="true">🛒</span>
            </div>
            <p id="keranjang-kosong" class="cart-empty">Keranjang masih kosong. Tambahkan mobil pilihanmu.</p>
            <ul id="daftar-keranjang" class="cart-list"></ul>
            <div class="cart-total"><strong>Total</strong><strong id="total-harga">Rp 0</strong></div>
            <button type="button" id="btn-checkout" class="btn-checkout" disabled>Checkout via WhatsApp</button>
          </section>
        </div>

        <!-- Grid kartu produk: digenerate otomatis oleh PHP -->
        <div class="product-grid">
          <?php foreach ($produk as $id => $p): ?>
          <div class="product-card" data-id="<?= $id ?>" data-kategori="<?= $p['kategori'] ?>" data-nama="<?= htmlspecialchars($p['nama']) ?>" data-harga="<?= $p['harga'] ?>">
            <div class="product-image">
              <a href="detail.php?id=<?= $id ?>">
                <img src="<?= htmlspecialchars($p['gambar']) ?>" alt="<?= htmlspecialchars($p['nama']) ?>" />
              </a>
              <?php if (!empty($p['badge'])): ?>
                <span class="badge <?= $p['badge'] === 'Best Seller' ? 'badge-bestseller' : 'badge-promo' ?>">
                  <?= htmlspecialchars($p['badge']) ?>
                </span>
              <?php endif; ?>
            </div>
            <div class="product-info">
              <h3 class="product-title">
                <a href="detail.php?id=<?= $id ?>"><?= htmlspecialchars($p['nama']) ?></a>
              </h3>
              <p class="product-desc"><?= htmlspecialchars($p['deskripsi']) ?></p>
              <div class="product-footer">
                <span class="product-price" data-harga="<?= $p['harga'] ?>"><?= rupiah($p['harga']) ?> / hari</span>
                <a class="btn-detail" href="detail.php?id=<?= $id ?>">Detail</a>
                <button class="btn-keranjang" type="button">Tambah ke Keranjang</button>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <p id="pesan-kosong" hidden>Produk tidak ditemukan.</p>
      </div>
    </div>
  </main>

<?php include "includes/footer.php"; ?>
