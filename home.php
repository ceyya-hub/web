<?php
$judulHalaman = "Beranda";
$halamanAktif = "home";
include "includes/header.php";
?>

  <!-- ===== ISI HALAMAN ===== -->
  <main>
    <!-- Hero banner -->
    <section class="hero" id="hero-banner">
      <img src="asset/BANNER_INA_BALI_TRANS_HD_V3.png" width="1920px" alt="Banner Ina Bali Trans & Travel" />
    </section>

    <section class="intro">
      <div class="container">
        <h2>Your Journey Begins With Us.</h2>
        <p>
          Your Trusted Transportation and Travel partner in Bali, for more comfortable and memorable journey.
        </p>
        <p id="sapaan" style="margin-top: 14px; font-weight: 700; color: #e2a809"></p>
      </div>
    </section>

    <!-- Keunggulan -->
    <section class="keunggulan" id="keunggulan">
      <div class="container">
        <h2>Kenapa Memilih <?= htmlspecialchars($namaToko) ?></h2>
        <div class="keunggulan-grid">
          <div class="keunggulan-card">
            <h3>Kenyamanan &amp; Keamanan</h3>
            <p>
              Kami berkomitmen memberikan pengalaman perjalanan yang nyaman dan aman bagi setiap pelanggan.
              Dengan kendaraan yang bersih dan terawat, kami berusaha memastikan setiap perjalanan berlangsung
              dengan lancar sehingga anda dapat menikmati perjalanan tanpa khawatir.
            </p>
          </div>
          <div class="keunggulan-card">
            <h3>Pelayanan Profesional &amp; Ramah</h3>
            <p>
              Kepuasan pelanggan merupakan prioritas kami. Kami mengutamakan pelayanan yang ramah, sopan, dan responsif
              dalam membantu setiap kebutuhan perjalanan. Mulai dari proses pemesanan hingga tiba di tujuan, kami berusaha
              memberikan pengalaman pelayanan terbaik.
            </p>
          </div>
          <div class="keunggulan-card">
            <h3>Perjalanan Fleksibel &amp; Harga Kompetitif</h3>
            <p>
              Kami menyediakan pilihan layanan perjalanan yang dapat disesuaikan dengan kebutuhan dan tujuan pelanggan.
              Jelajahi berbagai destinasi menarik di Bali dengan perjalanan yang lebih praktis, fleksibel, serta penawaran
              harga yang kompetitif tanpa mengesampingkan kenyamanan dan kualitas pelayanan.
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include "includes/footer.php"; ?>
