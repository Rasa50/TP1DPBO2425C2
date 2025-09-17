<?php
session_start();
include "TokoElektronik.php";

// Inisialisasi session array
if (!isset($_SESSION['daftar'])) {
    $_SESSION['daftar'] = [];
}

// Tambah produk
if (isset($_POST['tambah'])) {
    $t = new TokoElektronik();
    $t->setNamaProduk($_POST['namaproduk']);
    $t->setMerk($_POST['merk']);
    $t->setNoSeri($_POST['noseri']);
    $t->setDeskripsi($_POST['deskripsi']);
    $t->setHarga($_POST['harga']);
    $t->setStok((int)$_POST['stok']);

    // Upload gambar ke folder 'uploads/'
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);
        $t->setGambar($targetFile);
    }

    $_SESSION['daftar'][] = serialize($t);
}

// Hapus produk
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($_SESSION['daftar'][$index]);
    $_SESSION['daftar'] = array_values($_SESSION['daftar']);

    // Redirect kembali ke halaman awal
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk Elektronik</title>
</head>
<body>
<h2>Tambah Produk</h2>
<form method="post" enctype="multipart/form-data">
    Nama Produk: <input type="text" name="namaproduk"><br>
    Merk: <input type="text" name="merk"><br>
    No Seri: <input type="text" name="noseri"><br>
    Deskripsi: <input type="text" name="deskripsi"><br>
    Harga: <input type="text" name="harga"><br>
    Stok: <input type="number" name="stok"><br>
    Gambar: <input type="file" name="gambar"><br>
    <input type="submit" name="tambah" value="Tambah">
</form>

<h2>Daftar Produk</h2>
<?php
if (empty($_SESSION['daftar'])) {
    echo "Belum ada data!";
} else {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Merk</th>
            <th>No Seri</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>";

    foreach ($_SESSION['daftar'] as $i => $item) {
        $t = unserialize($item);
        echo "<tr>";
        echo "<td>" . ($i+1) . "</td>";
        echo "<td>" . $t->getNamaProduk() . "</td>";
        echo "<td>" . $t->getMerk() . "</td>";
        echo "<td>" . $t->getNoSeri() . "</td>";
        echo "<td>" . $t->getDeskripsi() . "</td>";
        echo "<td>" . $t->getHarga() . "</td>";
        echo "<td>" . $t->getStok() . "</td>";
        echo "<td>";
        if ($t->getGambar() != "") {
            echo "<img src='" . $t->getGambar() . "' width='100'>";
        }
        echo "</td>";
        echo "<td><a href='?hapus={$i}'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
</body>
</html>
