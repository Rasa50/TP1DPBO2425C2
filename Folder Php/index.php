<?php
session_start();
include "TokoElektronik.php";

// Array data dalam session
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

    // Handle upload gambar
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);
        $t->setGambar($targetFile);
    }

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
    $_SESSION['daftar'] = array_values($_SESSION['daftar']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Elektronik</title>
</head>
<body>
    <h2>Tambah Data</h2>
    <form method="post" enctype="multipart/form-data">
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
        Gambar: <input type="file" name="gambar"><br>
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

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>No</th>
                <th>Nama Toko</th>
                <th>Pemilik</th>
                <th>Alamat</th>
                <th>No Izin</th>
                <th>Nama Produk</th>
                <th>Merk</th>
                <th>No Seri</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>";

        $found = false;
        foreach ($_SESSION['daftar'] as $i => $item) {
            $t = unserialize($item);

            // Filter pencarian
            if (!empty($keyword)) {
                if ($by == "namatoko" && strpos(strtolower($t->getNamaToko()), $keyword) === false) continue;
                if ($by == "namaproduk" && strpos(strtolower($t->getNamaProduk()), $keyword) === false) continue;
            }

            $found = true;
            echo "<tr>";
            echo "<td>".($i+1)."</td>";
            echo "<td>".$t->getNamaToko()."</td>";
            echo "<td>".$t->getPemilikToko()."</td>";
            echo "<td>".$t->getAlamatToko()."</td>";
            echo "<td>".$t->getNoIzinToko()."</td>";
            echo "<td>".$t->getNamaProduk()."</td>";
            echo "<td>".$t->getMerk()."</td>";
            echo "<td>".$t->getNoSeri()."</td>";
            echo "<td>".$t->getDeskripsi()."</td>";
            echo "<td>".$t->getHarga()."</td>";
            echo "<td>".$t->getStok()."</td>";
            echo "<td>";
            if ($t->getGambar() != "") {
                echo "<img src='".$t->getGambar()."' width='100'>";
            }
            echo "</td>";
            echo "<td>
                    <a href='?hapus={$i}'>Hapus</a>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";

        if (!$found && !empty($keyword)) {
            echo "Data tidak ditemukan!";
        }
    }
    ?>
</body>
</html>
