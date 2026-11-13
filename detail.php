<?php
require_once __DIR__ . "/includes/data.php";

$id = $_GET["id"] ?? "";
$ada = isset($produk[$id]);

if ($ada) {
    $p = $produk[$id];
    $judulHalaman = $p["nama"];
} else {
    $judulHalaman = "Mobil Tidak Ditemukan";
}

$halamanAktif = "produk";
include "includes/header.php";
?>

  <!-- ===== DETAIL PRODUK ===== -->
  <main>
    <div class="container">
      <?php if (!$ada): ?>
        <div style="text-align: center; padding: 60px 20px; background: #fff; border-radius: 12px; margin: 40px auto; max-width: 600px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
          <h2>Mobil Tidak Ditemukan</h2>
          <p style="color: #666; margin: 14px 0 24px;">Maaf, data mobil yang Anda cari tidak tersedia atau URL salah.</p>
          <a class="btn-detail" href="produk.php" style="display: inline-block;">&larr; Kembali ke Daftar Produk</a>
        </div>
      <?php else: ?>
        <p class="breadcrumb">
          <a href="home.php">Beranda</a> / <a href="produk.php">Produk</a> / <?= htmlspecialchars($p["nama"]) ?>
        </p>

        <section class="detail-card" data-id="<?= htmlspecialchars($id) ?>" data-nama="<?= htmlspecialchars($p["nama"]) ?>" data-harga="<?= $p["harga"] ?>">
          <div class="detail-image">
            <img src="<?= htmlspecialchars($p["gambar"]) ?>" alt="<?= htmlspecialchars($p["nama"]) ?>" />
          </div>

          <div class="detail-info">
            <span class="detail-kategori"><?= htmlspecialchars($p["kategoriLabel"]) ?></span>
            <h2 class="detail-title"><?= htmlspecialchars($p["nama"]) ?></h2>
            <p class="detail-price"><?= rupiah($p["harga"]) ?> <small>/ hari</small></p>
            <p class="detail-desc"><?= htmlspecialchars($p["deskripsiLengkap"] ?? $p["deskripsi"]) ?></p>

            <?php if (!empty($p["spesifikasi"])): ?>
            <h3>Spesifikasi</h3>
            <table class="detail-spec">
              <?php foreach ($p["spesifikasi"] as $specKey => $specVal): ?>
              <tr>
                <th><?= htmlspecialchars($specKey) ?></th>
                <td><?= htmlspecialchars($specVal) ?></td>
              </tr>
              <?php endforeach; ?>
            </table>
            <?php endif; ?>

            <?php if (!empty($p["fasilitas"])): ?>
            <h3>Fasilitas</h3>
            <ul class="detail-list">
              <?php foreach ($p["fasilitas"] as $fasilitas): ?>
              <li><?= htmlspecialchars($fasilitas) ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if (!empty($p["cocok"])): ?>
            <p class="detail-cocok"><strong>Cocok untuk:</strong> <?= htmlspecialchars($p["cocok"]) ?></p>
            <?php endif; ?>

            <div class="detail-actions">
              <button class="btn-keranjang" type="button">Tambah ke Keranjang</button>
              <button class="btn-checkout btn-checkout-detail" type="button" id="btn-checkout" disabled>Checkout via WhatsApp</button>
              <a class="btn-wa" href="https://wa.me/<?= $waAdmin ?>?text=<?= urlencode("Halo $namaToko, saya ingin menanyakan sewa " . $p["nama"] . ".") ?>" target="_blank" rel="noopener">Tanya via WhatsApp</a>
            </div>
            <p class="detail-links">
              <a href="produk.php">&larr; Kembali ke Produk</a>
              <a href="produk.php">Lihat Keranjang (<span class="jumlah-keranjang-nav">0</span>)</a>
            </p>
            <p class="detail-note">Harga dapat berubah sesuai musim dan durasi sewa. Hubungi kami untuk penawaran terbaik.</p>

            <!-- Form Pemesanan Langsung (seperti di latihanphp) -->
            <div style="margin-top: 32px; padding: 24px; background: #fbfbfb; border: 1px solid #e2e8f0; border-radius: 10px;">
              <h3 style="margin-top: 0; color: #2b3990;">Form Pemesanan Cepat</h3>
              <form method="post" action="pesan.php" style="display: flex; flex-direction: column; gap: 14px; margin-top: 14px;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                
                <div>
                  <label style="font-size: 13px; font-weight: 600; display: block; margin-bottom: 4px;">Nama Lengkap *</label>
                  <input type="text" name="nama" class="search-input" placeholder="Masukkan nama pemesan..." required style="width: 100%;">
                </div>
                <div>
                  <label style="font-size: 13px; font-weight: 600; display: block; margin-bottom: 4px;">Nomor WhatsApp *</label>
                  <input type="tel" name="wa" class="search-input" placeholder="Contoh: 081234567890" required style="width: 100%;">
                </div>
                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                  <div style="flex: 1; min-width: 160px;">
                    <label style="font-size: 13px; font-weight: 600; display: block; margin-bottom: 4px;">Tanggal Mulai Sewa *</label>
                    <input type="date" name="tanggal" class="search-input" value="<?= date('Y-m-d') ?>" required style="width: 100%;">
                  </div>
                  <div style="flex: 1; min-width: 120px;">
                    <label style="font-size: 13px; font-weight: 600; display: block; margin-bottom: 4px;">Durasi (Hari) *</label>
                    <input type="number" name="durasi" class="search-input" value="1" min="1" max="30" required style="width: 100%;">
                  </div>
                </div>
                <div>
                  <label style="font-size: 13px; font-weight: 600; display: block; margin-bottom: 4px;">Lokasi Penjemputan / Catatan</label>
                  <textarea name="lokasi" class="search-input" rows="2" placeholder="Contoh: Bandara Ngurah Rai atau Hotel di Kuta..." style="width: 100%; resize: vertical;"></textarea>
                </div>
                <button type="submit" class="btn-search" style="padding: 12px 0; font-size: 15px; font-weight: 600; background: #e2a809;">
                  Booking Sekarang &rarr;
                </button>
              </form>
            </div>
          </div>
        </section>

        <!-- Pilihan Mobil Lainnya -->
        <section class="related">
          <h3>Pilihan Mobil Lainnya</h3>
          <div class="related-grid">
            <?php foreach ($produk as $otherId => $otherP): ?>
              <?php if ($otherId !== $id): ?>
              <a class="related-card" href="detail.php?id=<?= $otherId ?>">
                <img src="<?= htmlspecialchars($otherP["gambar"]) ?>" alt="<?= htmlspecialchars($otherP["nama"]) ?>" />
                <span><?= htmlspecialchars($otherP["nama"]) ?></span>
              </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>
    </div>
  </main>

<?php include "includes/footer.php"; ?>
