  <!-- ===== FOOTER ===== -->
  <footer class="main-footer">
    <div class="container footer-content">
      <div class="footer-about">
        <h3><?= htmlspecialchars($namaToko) ?></h3>
        <p>Guide &amp; Rent Mobil Di Bali Dengan Harga Affordable</p>
      </div>
      <div class="footer-links">
        <h4>Tautan</h4>
        <ul>
          <li><a href="home.php">Beranda</a></li>
          <li><a href="produk.php">Produk</a></li>
          <li><a href="kontak.php">Kontak</a></li>
          <li><a href="tentang_kami.php">Tentang Kami</a></li>
        </ul>
      </div>
      <div class="footer-contact" id="kontak">
        <h4>Kontak Kami</h4>
        <p>Email: <?= htmlspecialchars($emailAdmin) ?></p>
        <p>Telp: <?= htmlspecialchars($waAdmin) ?></p>
      </div>
    </div>
    <p class="copyright">
      &copy; <?= $tahun ?> <?= htmlspecialchars($namaToko) ?>. Seluruh hak cipta dilindungi.
    </p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
