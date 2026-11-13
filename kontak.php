<?php
$judulHalaman = "Kontak Kami";
$halamanAktif = "kontak";

$pesanTerkirim = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama  = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $pesan = trim($_POST["pesan"] ?? "");
    if ($nama !== "" && $email !== "" && $pesan !== "") {
        $pesanTerkirim = true;
    }
}

include "includes/header.php";
?>

  <!-- ===== ISI HALAMAN KONTAK ===== -->
  <main class="container">
    <section class="intro">
      <h2>Hubungi Kontak Kami</h2>
      <p>Punya pertanyaan, kritik, atau saran? Kirimkan pesan Anda melalui formulir di bawah ini.</p>
    </section>

    <div class="produk-layout" style="justify-content: center;">
      <aside class="filter-sidebar" style="width: 100%; max-width: 600px;">
        <h3>Kirim Pesan Anda</h3>

        <?php if ($pesanTerkirim): ?>
          <div style="background: #e6f4ea; color: #137333; padding: 14px 18px; border-radius: 8px; margin-top: 14px; font-weight: 600;">
            ✓ Terima kasih <?= htmlspecialchars($nama) ?>, pesan Anda telah kami terima!
          </div>
        <?php endif; ?>

        <form method="post" action="kontak.php" style="display: flex; flex-direction: column; gap: 14px; margin-top: 14px;">
          <div>
            <label style="font-size: 14px; font-weight: 600; display: block; margin-bottom: 4px;">Nama</label>
            <input type="text" name="nama" class="search-input" placeholder="Masukkan nama Anda..." required />
          </div>
          <div>
            <label style="font-size: 14px; font-weight: 600; display: block; margin-bottom: 4px;">Email</label>
            <input type="email" name="email" class="search-input" placeholder="Masukkan email Anda..." required />
          </div>
          <div>
            <label style="font-size: 14px; font-weight: 600; display: block; margin-bottom: 4px;">Pesan</label>
            <textarea name="pesan" class="search-input" rows="4" placeholder="Tuliskan pesan Anda di sini..." style="resize: vertical;" required></textarea>
          </div>
          <button type="submit" class="btn-search" style="padding: 12px 0; font-size: 15px;">Kirim Pesan</button>
        </form>
      </aside>
    </div>
  </main>

<?php include "includes/footer.php"; ?>
