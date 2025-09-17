<?php
session_start();
include "TokoElektronik.php";

// Array data dalam session (mirip array daftar[100] di C++)
if (!isset($_SESSION['daftar'])) {
    $_SESSION['daftar'] = [];
}

// CREATE
if (isset($_POST['tambah'])) {
    $t = new TokoElektronik();
    $t->setNamatoko($_POST['namatoko']);
    $t->setPemiliktoko($_POST['pemilik']);
    $t->setAlamatToko($_POST['alamat']);
    $t->setNoIzinUsahaToko($_POST['noizin']);
    $t->setNamaProduk($_POST['namaproduk']);
    $t->setMerk($_POST['merk']);
    $t->setNoSeri($_POST['noseri']);
    $t->setDeskripsi($_POST['deskripsi']);
    $t->setHarga($_POST['harga']);
    $t->setStok($_POST['stok']);

    $_SESSION['daftar'][] = serialize($t);
}

// UPDATE
if (isset($_POST['update'])) {
    $index = $_POST['index'];
    $t = unserialize($_SESSION['daftar'][$index]);
    $field = $_POST['field'];
    $value = $_POST['value'];

    switch ($field) {
        case 'namatoko': $t->setNamatoko($value); break;
        case 'pemilik': $t->setPemiliktoko($value); break;
        case 'alamat': $t->setAlamatToko($value); break;
        case 'noizin': $t->setNoIzinUsahaToko($value); break;
        case 'namaproduk': $t->setNamaProduk($value); break;
        case 'merk': $t->setMerk($value); break;
        case 'noseri': $t->setNoSeri($value); break;
        case 'deskripsi': $t->setDeskripsi($value); break;
        case 'harga': $t->setHarga($value); break;
        case 'stok': $t->setStok($value); break;
    }
    $_SESSION['daftar'][$index] = serialize($t);
}

// DELETE
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($_SESSION['daftar'][$index]);
    $_SESSION['daftar'] = array_values($_SESSION['daftar']); // rapihin index array
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Elektronik</title>
</head>
<body>
    <h2>Tambah Data</h2>
    <form method="post">
        Nama Toko: <input type="text" name="namatoko"><br>
        Pemilik: <input type="text" name="pemilik"><br>
        Alamat: <input type="text" name="alamat"><br>
        No Izin: <input type="text" name="noizin"><br>
        Nama Produk: <input type="text" name="namaproduk"><br>
        Merk: <input type="text" name="merk"><br>
        No Seri: <input type="text" name="noseri"><br>
        Deskripsi: <input type="text" name="deskripsi"><br>
        Harga: <input type="text" name="harga"><br>
        Stok: <input type="number" name="stok"><br>
        <input type="submit" name="tambah" value="Tambah">
    </form>
    <h2>Cari Data</h2>
    <form method="get">
        Cari berdasarkan:
        <select name="by">
            <option value="namatoko">Nama Toko</option>
            <option value="namaproduk">Nama Produk</option>
        </select>
        <input type="text" name="keyword" placeholder="Masukkan kata kunci">
        <input type="submit" name="cari" value="Cari">
    </form>


    <h2>Daftar Data</h2>
    <?php
    if (empty($_SESSION['daftar'])) {
        echo "Belum ada data!";
    } else {
        $keyword = isset($_GET['keyword']) ? strtolower($_GET['keyword']) : "";
        $by = isset($_GET['by']) ? $_GET['by'] : "";

        $found = false;
        foreach ($_SESSION['daftar'] as $i => $item) {
            $t = unserialize($item);

            // cek filter jika ada pencarian
            if (!empty($keyword)) {
                if ($by == "namatoko" && strpos(strtolower($t->getNamatoko()), $keyword) === false) continue;
                if ($by == "namaproduk" && strpos(strtolower($t->getNamaProduk()), $keyword) === false) continue;
            }

            $found = true;
            echo "<div style='border:1px solid #000; margin:5px; padding:5px;'>";
            echo "<b>Data ke-".($i+1)."</b><br>";
            echo $t->viewToko();
            echo $t->viewProduk();

            echo "
            <form method='post'>
                <input type='hidden' name='index' value='{$i}'>
                <select name='field'>
                    <option value='namatoko'>Nama Toko</option>
                    <option value='pemilik'>Pemilik</option>
                    <option value='alamat'>Alamat</option>
                    <option value='noizin'>No Izin Usaha</option>
                    <option value='namaproduk'>Nama Produk</option>
                    <option value='merk'>Merk Produk</option>
                    <option value='noseri'>No Seri Produk</option>
                    <option value='deskripsi'>Deskripsi Produk</option>
                    <option value='harga'>Harga Produk</option>
                    <option value='stok'>Stok Produk</option>
                </select>
                <input type='text' name='value'>
                <input type='submit' name='update' value='Update'>
            </form>
            <a href='?hapus={$i}'>Hapus</a>
            ";
            echo "</div>";
        }

        if (!$found && !empty($keyword)) {
            echo "Data tidak ditemukan!";
        }
    }
    ?>
</body>
</html>