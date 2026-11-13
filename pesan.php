<?php
$judulHalaman = "Konfirmasi Pemesanan";
$halamanAktif = "produk";
include "includes/header.php";

$ok = false;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id      = trim($_POST["id"] ?? "");
    $nama    = trim($_POST["nama"] ?? "");
    $wa      = trim($_POST["wa"] ?? "");
    $durasi  = (int) ($_POST["durasi"] ?? 1);
    $tanggal = trim($_POST["tanggal"] ?? "");
    $lokasi  = trim($_POST["lokasi"] ?? "");

    if (!isset($produk[$id])) {
        $error[] = "Data mobil tidak ditemukan.";
    }
    if ($nama === "") {
        $error[] = "Nama lengkap wajib diisi.";
    }
    if (!preg_match('/^[0-9+ ]{8,16}$/', $wa)) {
        $error[] = "Nomor WhatsApp tidak valid.";
    }
    if ($durasi < 1 || $durasi > 30) {
        $error[] = "Durasi sewa harus antara 1 sampai 30 hari.";
    }
    if ($tanggal === "") {
        $error[] = "Tanggal mulai sewa wajib dipilih.";
    }

    if (count($error) === 0) {
        $ok    = true;
        $mobil = $produk[$id];
        $total = $mobil["harga"] * $durasi;
        $kode  = "IBT-" . date("ymd") . "-" . rand(100, 999);

        $teksWa = "Halo $namaToko, saya ingin memesan sewa mobil:\n"
                . "Kode Booking: $kode\n"
                . "Mobil: " . $mobil["nama"] . "\n"
                . "Durasi: $durasi hari\n"
                . "Mulai Tanggal: $tanggal\n"
                . "Total Biaya: " . rupiah($total) . "\n\n"
                . "Nama Pemesan: $nama\n"
                . "WhatsApp: $wa\n"
                . "Lokasi Penjemputan / Catatan: " . ($lokasi ?: "-");

        $linkWa = "https://wa.me/" . $waAdmin . "?text=" . rawurlencode($teksWa);
    }
} else {
    $error[] = "Silakan pilih mobil dan isi formulir pemesanan terlebih dahulu.";
}
?>

  <main>
    <div class="container" style="padding: 40px 20px; max-width: 800px;">
    <?php if ($ok): ?>
      <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 32px; box-shadow: 0 4px 16px rgba(0,0,0,0.06);">
        <h2 style="color: #137333; margin-bottom: 8px;">Pesanan Diterima &#10003;</h2>
        <p style="color: #4a5568; margin-bottom: 24px;">
          Terima kasih <strong><?= htmlspecialchars($nama) ?></strong>! Kode booking Anda: <strong style="color: #e2a809;"><?= $kode ?></strong>
        </p>

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 24px;">
          <tr style="border-bottom: 1px solid #edf2f7;"><td style="padding: 10px 0; color: #718096;">Mobil</td><td style="font-weight: 600; text-align: right;"><?= htmlspecialchars($mobil["nama"]) ?></td></tr>
          <tr style="border-bottom: 1px solid #edf2f7;"><td style="padding: 10px 0; color: #718096;">Tarif per Hari</td><td style="text-align: right;"><?= rupiah($mobil["harga"]) ?></td></tr>
          <tr style="border-bottom: 1px solid #edf2f7;"><td style="padding: 10px 0; color: #718096;">Durasi Sewa</td><td style="text-align: right;"><?= $durasi ?> hari</td></tr>
          <tr style="border-bottom: 1px solid #edf2f7;"><td style="padding: 10px 0; color: #718096;">Mulai Tanggal</td><td style="text-align: right;"><?= htmlspecialchars($tanggal) ?></td></tr>
          <tr style="border-bottom: 2px solid #cbd5e0; font-size: 18px; font-weight: 700;"><td style="padding: 14px 0;">Total Estimasi</td><td style="text-align: right; color: #b3541e;"><?= rupiah($total) ?></td></tr>
          <tr style="border-bottom: 1px solid #edf2f7;"><td style="padding: 10px 0; color: #718096;">Nomor WhatsApp</td><td style="text-align: right;"><?= htmlspecialchars($wa) ?></td></tr>
          <tr><td style="padding: 10px 0; color: #718096;">Lokasi / Catatan</td><td style="text-align: right;"><?= nl2br(htmlspecialchars($lokasi ?: "-")) ?></td></tr>
        </table>

        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
          <a class="btn-wa" href="<?= $linkWa ?>" target="_blank" rel="noopener" style="flex: 1; text-align: center; padding: 12px 20px;">
            Kirim Booking ke WhatsApp
          </a>
          <a class="btn-detail" href="produk.php" style="text-align: center; padding: 12px 20px;">
            Pilih Mobil Lain
          </a>
        </div>
      </div>
    <?php else: ?>
      <div style="background: #ffffff; border: 1px solid #fed7d7; border-radius: 12px; padding: 32px; text-align: center;">
        <h2 style="color: #c53030; margin-bottom: 12px;">Pemesanan Belum Dapat Diproses</h2>
        <ul style="list-style: none; padding: 0; color: #e53e3e; margin-bottom: 24px;">
          <?php foreach ($error as $e): ?>
            <li style="margin-bottom: 6px;">&bull; <?= htmlspecialchars($e) ?></li>
          <?php endforeach; ?>
        </ul>
        <a class="btn-detail" href="produk.php">&larr; Kembali ke Daftar Produk</a>
      </div>
    <?php endif; ?>
    </div>
  </main>

<?php include "includes/footer.php"; ?>
