<?php
// ===== DATA BERSAMA INA BALI TRANS & TRAVEL =====
$namaToko    = "Ina Bali Trans & Travel";
$tagline     = "Beyond Destinations, Into Experiences.";
$tahun       = date("Y");
$waAdmin     = "6285710837901";
$emailAdmin  = "inabalitrans@gmail.com";
$alamatToko  = "Denpasar, Bali";

$kategoriList = [
    "mpv"     => "MPV Keluarga",
    "suv"     => "SUV",
    "premium" => "Premium",
    "van"     => "Minibus / Van"
];

$produk = [
    "avanza-g" => [
        "nama"             => "Toyota Avanza G",
        "kategori"         => "mpv",
        "kategoriLabel"    => "MPV Keluarga",
        "harga"            => 600000,
        "gambar"           => "asset/toyota_avanza_G_new.png",
        "badge"            => "",
        "deskripsi"        => "MPV 7 penumpang yang irit dan nyaman, pilihan favorit untuk liburan keluarga di Bali.",
        "deskripsiLengkap" => "Toyota Avanza G adalah MPV 7 penumpang yang irit, lincah, dan nyaman. Pilihan paling populer untuk liburan keluarga atau grup kecil berkeliling Bali, dengan kabin luas dan bagasi yang cukup untuk koper dan oleh-oleh.",
        "spesifikasi"      => [
            "Kapasitas" => "7 penumpang",
            "Mesin"     => "1.3L bensin",
            "Transmisi" => "Manual / Otomatis",
            "Bagasi"    => "Sedang"
        ],
        "fasilitas"        => [
            "AC double blower",
            "Audio dengan Bluetooth",
            "Kursi baris ketiga lipat",
            "Kabin luas dan nyaman"
        ],
        "cocok"            => "Keluarga kecil, liburan santai, perjalanan antar kota."
    ],
    "avanza-veloz" => [
        "nama"             => "Toyota Avanza Veloz",
        "kategori"         => "mpv",
        "kategoriLabel"    => "MPV Keluarga",
        "harga"            => 650000,
        "gambar"           => "asset/toyota_avanza_veloz.png",
        "badge"            => "",
        "deskripsi"        => "MPV bergaya sporty dengan kabin lega, cocok untuk rombongan kecil yang ingin tampil beda.",
        "deskripsiLengkap" => "Toyota Avanza Veloz tampil lebih sporty dengan desain depan yang tegas namun tetap menawarkan kabin lega untuk 7 penumpang. Cocok untuk rombongan kecil yang ingin perjalanan nyaman dan tampil beda.",
        "spesifikasi"      => [
            "Kapasitas" => "7 penumpang",
            "Mesin"     => "1.5L bensin",
            "Transmisi" => "Manual / Otomatis",
            "Bagasi"    => "Sedang"
        ],
        "fasilitas"        => [
            "AC double blower",
            "Audio dengan Bluetooth",
            "Tampilan eksterior sporty",
            "Kabin luas dan nyaman"
        ],
        "cocok"            => "Rombongan kecil, teman atau keluarga muda, wisata keliling Bali."
    ],
    "innova-reborn" => [
        "nama"             => "Toyota Innova Reborn",
        "kategori"         => "mpv",
        "kategoriLabel"    => "MPV Keluarga",
        "harga"            => 800000,
        "gambar"           => "asset/toyota_innova_reborn.png",
        "badge"            => "Best Seller",
        "deskripsi"        => "MPV lega dan stabil untuk perjalanan jauh keliling Bali dengan kenyamanan kelas atas.",
        "deskripsiLengkap" => "Toyota Innova Reborn menawarkan kenyamanan kelas atas dengan kabin lega dan suspensi stabil, ideal untuk perjalanan jauh. Salah satu mobil favorit wisatawan yang menginginkan kenyamanan lebih saat menjelajah Bali dari ujung ke ujung.",
        "spesifikasi"      => [
            "Kapasitas" => "7 penumpang",
            "Mesin"     => "2.0L bensin / 2.4L diesel",
            "Transmisi" => "Manual / Otomatis",
            "Bagasi"    => "Luas"
        ],
        "fasilitas"        => [
            "AC double blower",
            "Audio dengan Bluetooth",
            "Kursi empuk dan lega",
            "Suspensi stabil untuk jarak jauh"
        ],
        "cocok"            => "Perjalanan jauh, keluarga besar, tamu yang mengutamakan kenyamanan."
    ],
    "raize-turbo" => [
        "nama"             => "Toyota Raize G Turbo",
        "kategori"         => "suv",
        "kategoriLabel"    => "SUV",
        "harga"            => 650000,
        "gambar"           => "asset/toyota_raize_G_turbo.png",
        "badge"            => "",
        "deskripsi"        => "SUV kompak bermesin turbo yang lincah, pas untuk pasangan atau keluarga kecil.",
        "deskripsiLengkap" => "Toyota Raize G Turbo adalah SUV kompak bermesin turbo yang responsif dan lincah di jalanan Bali. Desainnya modern, cocok untuk pasangan atau keluarga kecil yang ingin perjalanan seru dan bergaya.",
        "spesifikasi"      => [
            "Kapasitas" => "5 penumpang",
            "Mesin"     => "1.0L turbo bensin",
            "Transmisi" => "Otomatis (CVT)",
            "Bagasi"    => "Kecil - sedang"
        ],
        "fasilitas"        => [
            "AC digital",
            "Audio dengan Bluetooth",
            "Mesin turbo responsif",
            "Desain SUV kompak dan modern"
        ],
        "cocok"            => "Pasangan, honeymoon, keluarga kecil, jalan sempit dan area wisata."
    ],
    "alphard" => [
        "nama"             => "Toyota Alphard",
        "kategori"         => "premium",
        "kategoriLabel"    => "Premium",
        "harga"            => 2500000,
        "gambar"           => "asset/toyota_alphard.png",
        "badge"            => "Premium",
        "deskripsi"        => "Minivan mewah dengan kursi captain untuk tamu VIP, honeymoon, dan perjalanan eksklusif.",
        "deskripsiLengkap" => "Toyota Alphard adalah minivan mewah dengan kursi captain yang luas dan empuk. Pilihan utama untuk tamu VIP, honeymoon, dan perjalanan eksklusif dengan kenyamanan setara kabin kelas satu.",
        "spesifikasi"      => [
            "Kapasitas" => "6 - 7 penumpang",
            "Mesin"     => "2.5L bensin",
            "Transmisi" => "Otomatis",
            "Bagasi"    => "Luas"
        ],
        "fasilitas"        => [
            "Kursi captain mewah",
            "AC multi-zona",
            "Pintu geser elektrik",
            "Kabin senyap dan nyaman"
        ],
        "cocok"            => "Tamu VIP, honeymoon, jemputan bandara, acara spesial."
    ],
    "hiace-commuter" => [
        "nama"             => "Toyota HiAce Commuter",
        "kategori"         => "van",
        "kategoriLabel"    => "Minibus / Van",
        "harga"            => 1200000,
        "gambar"           => "asset/toyota_van_hiace_commuter.png",
        "badge"            => "",
        "deskripsi"        => "Minibus kapasitas besar untuk rombongan, study tour, dan perjalanan wisata grup.",
        "deskripsiLengkap" => "Toyota HiAce Commuter adalah minibus berkapasitas besar untuk rombongan. Kabinnya tinggi dan lega, dengan bagasi luas, cocok untuk study tour, gathering kantor, dan wisata grup berkeliling Bali.",
        "spesifikasi"      => [
            "Kapasitas" => "Hingga 14 - 15 penumpang",
            "Mesin"     => "2.5L diesel",
            "Transmisi" => "Manual",
            "Bagasi"    => "Sangat luas"
        ],
        "fasilitas"        => [
            "AC kabin penumpang",
            "Kabin tinggi dan lega",
            "Bagasi besar",
            "Cocok untuk rombongan"
        ],
        "cocok"            => "Rombongan besar, study tour, gathering, wisata grup."
    ]
];

// Helper: Format Rupiah
function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ",", ".");
}
