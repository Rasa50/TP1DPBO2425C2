<?php
include "TokoElektronik.php";

// --- Array daftar toko ---
$daftarToko = array();

// Tambah toko 1
$toko1 = new TokoElektronik("Elektronik Jaya", "Budi", "Jl. Merdeka 123", "IZN-001");
$toko1->tambahProduk(new Produk("TV LED", "Samsung", "TV123", "TV 32 inch Full HD", 2500000, 10));
$toko1->tambahProduk(new Produk("Kulkas", "LG", "KLG456", "Kulkas 2 pintu hemat energi", 3500000, 5));
$daftarToko[] = $toko1;

// Tambah toko 2
$toko2 = new TokoElektronik("Gadget Center", "Siti", "Jl. Asia Afrika 45", "IZN-002");
$toko2->tambahProduk(new Produk("Laptop", "Asus", "LP789", "Laptop gaming ROG", 15000000, 3));
$daftarToko[] = $toko2;

// --- Tampilkan semua toko & produk awal ---
echo "<h2>Data Awal</h2>";
foreach ($daftarToko as $i => $toko){
    echo "<h3>=== Toko ke-".($i+1)." ===</h3>";
    $toko->viewToko();
    $toko->tampilkanProduk();
}

// --- Hapus Produk dari Toko 1 (misalnya produk index 0 = TV LED) ---
echo "<h2>Hapus Produk</h2>";
$daftarToko[0]->hapusProduk(0);

// --- Tampilkan lagi setelah hapus produk ---
$daftarToko[0]->tampilkanProduk();

// --- Hapus Toko ke-2 (index 1) ---
echo "<h2>Hapus Toko</h2>";
if (isset($daftarToko[1])){
    for ($i = 1; $i < count($daftarToko); $i++){
        $daftarToko[$i-1] = $daftarToko[$i];
    }
    array_pop($daftarToko);
    echo "Toko ke-2 berhasil dihapus.<br/>";
}

// --- Tampilkan semua toko lagi ---
echo "<h2>Data Setelah Hapus Toko</h2>";
foreach ($daftarToko as $i => $toko){
    echo "<h3>=== Toko ke-".($i+1)." ===</h3>";
    $toko->viewToko();
    $toko->tampilkanProduk();
}
?>
