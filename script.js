// Fitur interaktif Ina Bali Trans & Travel.
function sapa() {
  const target = document.getElementById("sapaan");
  if (!target) return;
  const jam = new Date().getHours();
  const salam = jam < 11 ? "Selamat pagi" : jam < 15 ? "Selamat siang" : jam < 18 ? "Selamat sore" : "Selamat malam";
  target.textContent = `${salam}, Welcome to INA BALI TRANS & TRAVEL! Let's make every journey memorable!`;
}

// ===== Keranjang (disimpan di localStorage agar tetap ada saat pindah halaman) =====
const KUNCI_KERANJANG = "ina-bali-keranjang";
const keranjang = new Map();

function muatKeranjang() {
  try {
    const data = JSON.parse(localStorage.getItem(KUNCI_KERANJANG) ?? "[]");
    data.forEach((item) => {
      if (item && item.id && Number.isFinite(item.harga) && item.jumlah > 0) keranjang.set(item.id, item);
    });
  } catch {
    keranjang.clear();
  }
}

function simpanKeranjang() {
  try {
    localStorage.setItem(KUNCI_KERANJANG, JSON.stringify([...keranjang.values()]));
  } catch {
    /* penyimpanan tidak tersedia, keranjang tetap jalan di memori */
  }
}

// Ambil data produk dari kartu produk (produk.html) atau dari halaman detail
function ambilDataProduk(tombol) {
  const kartu = tombol.closest("[data-id]");
  if (!kartu) return null;
  const harga = Number(kartu.dataset.harga ?? kartu.querySelector(".product-price")?.dataset.harga);
  const nama = kartu.dataset.nama ?? kartu.querySelector(".product-title")?.textContent.trim();
  if (!nama || !Number.isFinite(harga) || harga <= 0) return null;
  return { id: kartu.dataset.id, nama, harga };
}

function tambahKeranjang(tombol) {
  const produk = ambilDataProduk(tombol);
  if (!produk) return;
  const item = keranjang.get(produk.id);
  if (item) item.jumlah++;
  else keranjang.set(produk.id, { ...produk, jumlah: 1 });
  simpanKeranjang();
  renderKeranjang();
  const teksAsli = tombol.dataset.teks ?? tombol.textContent;
  tombol.dataset.teks = teksAsli;
  tombol.textContent = "Ditambahkan ✓";
  window.setTimeout(() => { tombol.textContent = teksAsli; }, 1000);
}

function ubahJumlahKeranjang(id, delta) {
  const item = keranjang.get(id);
  if (!item) return;
  item.jumlah += delta;
  if (item.jumlah <= 0) keranjang.delete(id);
  simpanKeranjang();
  renderKeranjang();
}

function hapusDariKeranjang(id) {
  keranjang.delete(id);
  simpanKeranjang();
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
  document.querySelectorAll(".jumlah-keranjang-nav").forEach((el) => { el.textContent = jumlah; });
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
  const checkout = document.getElementById("btn-checkout");
  if (checkout) checkout.disabled = jumlah === 0;
}

// Checkout: kirim isi keranjang ke WhatsApp admin
const NOMOR_WA = "6285710837901";

function checkout() {
  if (keranjang.size === 0) return;
  let total = 0;
  const baris = [...keranjang.values()].map((item, i) => {
    const subtotal = item.harga * item.jumlah;
    total += subtotal;
    return `${i + 1}. ${item.nama} x${item.jumlah} hari - Rp ${subtotal.toLocaleString("id-ID")}`;
  });
  const pesan = [
    "Halo Ina Bali Trans & Travel, saya ingin memesan:",
    ...baris,
    `Total: Rp ${total.toLocaleString("id-ID")}`,
    "Mohon info ketersediaan dan langkah selanjutnya. Terima kasih.",
  ].join("\n");
  window.open(`https://wa.me/${NOMOR_WA}?text=${encodeURIComponent(pesan)}`, "_blank", "noopener");
}

// ===== Pencarian & filter di halaman produk =====
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
  muatKeranjang();
  document.querySelectorAll(".btn-keranjang").forEach((tombol) => tombol.addEventListener("click", () => tambahKeranjang(tombol)));
  const input = document.getElementById("input-cari");
  const cari = document.getElementById("btn-cari");
  input?.addEventListener("input", terapkanFilter);
  cari?.addEventListener("click", terapkanFilter);
  document.querySelectorAll(".cek-kategori").forEach((cek) => cek.addEventListener("change", terapkanFilter));
  renderKeranjang();
  document.getElementById("btn-checkout")?.addEventListener("click", checkout);
});
