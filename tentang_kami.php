<?php
$judulHalaman = "Tentang Kami";
$halamanAktif = "tentang_kami";

$extraHead = <<<HTML
<style>
  .about-main {
    padding: 60px 0;
    background-color: #fafafa;
  }
  .about-container {
    max-width: 900px;
    margin: 0 auto;
    background-color: #ffffff;
    border: 1px solid #e5e5e5;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
  }
  .about-header-text {
    text-align: center;
    margin-bottom: 36px;
  }
  .about-header-text h2 {
    color: #2b3990;
    font-size: 32px;
    margin-bottom: 10px;
  }
  .about-header-text p {
    color: #666666;
    font-size: 15px;
  }
  .about-section {
    margin-bottom: 40px;
  }
  .about-section h3 {
    color: #e2a809;
    font-size: 22px;
    margin-bottom: 16px;
    border-bottom: 2px solid #fdf3df;
    padding-bottom: 8px;
  }
  .about-section p {
    font-size: 15px;
    color: #555555;
    line-height: 1.8;
    margin-bottom: 14px;
  }
  .misi-list {
    padding-left: 22px;
    color: #555555;
    font-size: 15px;
    line-height: 1.8;
  }
  .misi-list li {
    margin-bottom: 8px;
    padding-left: 4px;
  }
  .misi-list li::marker {
    color: #2b3990;
    font-weight: 700;
  }
  @media (max-width: 768px) {
    .about-container {
      padding: 20px;
    }
  }
</style>
HTML;

include "includes/header.php";
?>

  <!-- ===== ISI HALAMAN TENTANG KAMI ===== -->
  <main class="about-main">
    <div class="container">
      <div class="about-container">

        <div class="about-header-text">
          <h2>Tentang Kami</h2>
          <p>Mengenal <?= htmlspecialchars($namaToko) ?></p>
        </div>

        <div class="about-section">
          <h3>Mengenal <?= htmlspecialchars($namaToko) ?></h3>
          <p><?= htmlspecialchars($namaToko) ?> merupakan penyedia layanan transportasi dan perjalanan wisata yang hadir untuk memberikan kemudahan bagi setiap pelanggan dalam menjelajahi keindahan Pulau Bali. Kami berkomitmen untuk menghadirkan pengalaman perjalanan yang nyaman, aman, dan menyenangkan melalui pelayanan yang profesional serta mengutamakan kepuasan pelanggan.</p>
          <p>Dengan mengutamakan kenyamanan perjalanan, kualitas pelayanan, dan fleksibilitas kebutuhan pelanggan, kami berusaha menjadi mitra perjalanan terpercaya bagi wisatawan lokal maupun mancanegara. Kami memahami bahwa setiap perjalanan memiliki tujuan dan cerita tersendiri. Oleh karena itu, kami selalu berupaya memberikan pelayanan terbaik mulai dari proses pemesanan hingga pelanggan tiba di destinasi tujuan.</p>
          <p>Bagi kami, perjalanan bukan hanya tentang mencapai suatu tempat, tetapi juga tentang menciptakan pengalaman berharga di setiap perjalanan. Bersama <?= htmlspecialchars($namaToko) ?>, nikmati kemudahan menjelajahi berbagai destinasi dengan lebih nyaman, praktis, dan berkesan.</p>
        </div>

        <div class="about-section">
          <h3>Visi Kami</h3>
          <p>Menjadi penyedia layanan transportasi dan perjalanan wisata yang terpercaya, profesional, serta menjadi pilihan utama pelanggan dalam menjelajahi Bali.</p>
        </div>

        <div class="about-section">
          <h3>Misi Kami</h3>
          <ol class="misi-list">
            <li>Memberikan pelayanan transportasi yang mengutamakan kenyamanan dan keamanan pelanggan.</li>
            <li>Menghadirkan pelayanan yang ramah, profesional, dan responsif.</li>
            <li>Menyediakan pilihan perjalanan yang fleksibel sesuai kebutuhan pelanggan.</li>
            <li>Membangun kepercayaan dan hubungan jangka panjang dengan setiap pelanggan.</li>
          </ol>
        </div>

      </div>
    </div>
  </main>

<?php include "includes/footer.php"; ?>
