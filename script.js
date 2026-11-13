// Fitur interaktif halaman Warung Ananta.
function sapa() {
  const target = document.getElementById("sapaan");
  if (!target) return;
  const jam = new Date().getHours();
  const salam = jam < 11 ? "Selamat pagi" : jam < 15 ? "Selamat siang" : jam < 18 ? "Selamat sore" : "Selamat malam";
  target.textContent = `${salam}, Welcome to INA BALI TRANS & TRAVEL!`;
}

const keranjang = new Map();

function tambahKeranjang(tombol) {
  const kartu = tombol.closest(".product-card");
  const harga = Number(kartu?.querySelector(".product-price")?.dataset.harga);
  if (!kartu || !Number.isFinite(harga) || harga <= 0) return;
  const id = kartu.dataset.id;
  const item = keranjang.get(id);
  if (item) item.jumlah++;
  else keranjang.set(id, {
    id,
    nama: kartu.querySelector(".product-title").textContent,
    harga,
    jumlah: 1,
  });
  renderKeranjang();
  tombol.textContent = "Ditambahkan ✓";
  window.setTimeout(() => { tombol.textContent = "Tambah ke Keranjang"; }, 1000);
}

function ubahJumlahKeranjang(id, delta) {
  const item = keranjang.get(id);
  if (!item) return;
  item.jumlah += delta;
  if (item.jumlah <= 0) keranjang.delete(id);
  renderKeranjang();
}

function hapusDariKeranjang(id) {
  keranjang.delete(id);
  renderKeranjang();
}

function renderKeranjang() {
  const daftar = document.getElementById("daftar-keranjang");
  const jumlahEl = document.getElementById("jumlah-keranjang");
  const totalEl = document.getElementById("total-harga");
  const kosong = document.getElementById("keranjang-kosong");
  const jumlah = [...keranjang.values()].reduce((n, item) => n + item.jumlah, 0);
  const total = [...keranjang.values()].reduce((n, item) => n + item.harga * item.jumlah, 0);
  if (jumlahEl) jumlahEl.textContent = jumlah;
  if (totalEl) totalEl.textContent = `Rp ${total.toLocaleString("id-ID")}`;
  if (daftar) {
    daftar.replaceChildren();
    keranjang.forEach((item) => {
      const baris = document.createElement("li");
      baris.className = "cart-item";
      const info = document.createElement("div");
      info.className = "cart-item-info";
      const nama = document.createElement("strong");
      nama.textContent = item.nama;
      const harga = document.createElement("span");
      harga.textContent = `Rp ${(item.harga * item.jumlah).toLocaleString("id-ID")}`;
      info.append(nama, harga);
      const kontrol = document.createElement("div");
      kontrol.className = "cart-controls";
      const kurang = document.createElement("button");
      kurang.type = "button";
      kurang.textContent = "−";
      kurang.setAttribute("aria-label", `Kurangi ${item.nama}`);
      kurang.addEventListener("click", () => ubahJumlahKeranjang(item.id, -1));
      const hitung = document.createElement("span");
      hitung.textContent = item.jumlah;
      const tambah = document.createElement("button");
      tambah.type = "button";
      tambah.textContent = "+";
      tambah.setAttribute("aria-label", `Tambah ${item.nama}`);
      tambah.addEventListener("click", () => ubahJumlahKeranjang(item.id, 1));
      const hapus = document.createElement("button");
      hapus.type = "button";
      hapus.className = "cart-remove";
      hapus.textContent = "Hapus";
      hapus.addEventListener("click", () => hapusDariKeranjang(item.id));
      kontrol.append(kurang, hitung, tambah, hapus);
      baris.append(info, kontrol);
      daftar.append(baris);
    });
  }
  if (kosong) kosong.hidden = jumlah !== 0;
}

function lihatDetail(tombol) {
  const kartu = tombol.closest(".product-card");
  const judul = document.getElementById("detail-judul");
  const isi = document.getElementById("detail-isi");
  const panel = document.getElementById("detail-panel");
  if (!kartu || !judul || !isi || !panel) return;
  judul.textContent = `${kartu.querySelector(".product-title").textContent} - ${kartu.querySelector(".product-price").textContent}`;
  isi.textContent = kartu.querySelector(".product-desc").textContent.trim();
  panel.hidden = false;
}

function tutupDetail() {
  const panel = document.getElementById("detail-panel");
  if (panel) panel.hidden = true;
}

function terapkanFilter() {
  const kata = (document.getElementById("input-cari")?.value ?? "").trim().toLocaleLowerCase("id-ID");
  const dipilih = [...document.querySelectorAll(".cek-kategori:checked")].map((el) => el.value);
  const kartu = document.querySelectorAll(".product-card");
  let tampil = 0;
  kartu.forEach((item) => {
    const konten = `${item.querySelector(".product-title")?.textContent ?? ""} ${item.querySelector(".product-desc")?.textContent ?? ""} ${item.dataset.kategori ?? ""}`.toLocaleLowerCase("id-ID");
    const cocok = konten.includes(kata) && (dipilih.length === 0 || dipilih.includes(item.dataset.kategori));
    item.hidden = !cocok;
    if (cocok) tampil++;
  });
  const pesan = document.getElementById("pesan-kosong");
  if (pesan) pesan.hidden = tampil !== 0;
}

document.addEventListener("DOMContentLoaded", () => {
  sapa();
  document.querySelectorAll(".btn-detail").forEach((tombol) => tombol.addEventListener("click", () => lihatDetail(tombol)));
  document.querySelectorAll(".btn-keranjang").forEach((tombol) => tombol.addEventListener("click", () => tambahKeranjang(tombol)));
  const input = document.getElementById("input-cari");
  const cari = document.getElementById("btn-cari");
  input?.addEventListener("input", terapkanFilter);
  cari?.addEventListener("click", terapkanFilter);
  document.querySelectorAll(".cek-kategori").forEach((cek) => cek.addEventListener("change", terapkanFilter));
  renderKeranjang();
});
