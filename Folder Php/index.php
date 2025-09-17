<?php
session_start();
include "TokoElektronik.php";

// Inisialisasi session
if (!isset($_SESSION['daftar'])) {
    $_SESSION['daftar'] = [];
}

// CREATE / UPDATE
if (isset($_POST['submit'])) {
    $index = $_POST['index'] ?? null;
    $t = new TokoElektronik();
    $t->setNamaProduk($_POST['namaproduk']);
    $t->setMerk($_POST['merk']);
    $t->setNoSeri($_POST['noseri']);
    $t->setDeskripsi($_POST['deskripsi']);
    $t->setHarga($_POST['harga']);
    $t->setStok($_POST['stok']);

    // Upload gambar
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);
        $t->setGambar($targetFile);
    } elseif ($index !== null && isset($_SESSION['daftar'][$index])) {
        // Kalau edit tapi tidak upload gambar baru, pakai gambar lama
        $old = unserialize($_SESSION['daftar'][$index]);
        $t->setGambar($old->getGambar());
    }

    if ($index !== null && isset($_SESSION['daftar'][$index])) {
        // Update data
        $_SESSION['daftar'][$index] = serialize($t);
    } else {
        // Tambah data baru
        $_SESSION['daftar'][] = serialize($t);
    }

    header("Location: index.php");
    exit();
}

// DELETE
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($_SESSION['daftar'][$index]);
    $_SESSION['daftar'] = array_values($_SESSION['daftar']);
    header("Location: index.php");
    exit();
}

// EDIT
$editData = null;
if (isset($_GET['edit'])) {
    $index = $_GET['edit'];
    if (isset($_SESSION['daftar'][$index])) {
        $editData = unserialize($_SESSION['daftar'][$index]);
    }
}

// SEARCH
$searchKeyword = $_GET['keyword'] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk Elektronik</title>
</head>
<body>
<h2><?= $editData ? "Edit Produk" : "Tambah Produk" ?></h2>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="index" value="<?= $editData ? $index : "" ?>">
    Nama Produk: <input type="text" name="namaproduk" value="<?= $editData ? $editData->getNamaProduk() : "" ?>"><br>
    Merk: <input type="text" name="merk" value="<?= $editData ? $editData->getMerk() : "" ?>"><br>
    No Seri: <input type="text" name="noseri" value="<?= $editData ? $editData->getNoSeri() : "" ?>"><br>
    Deskripsi: <input type="text" name="deskripsi" value="<?= $editData ? $editData->getDeskripsi() : "" ?>"><br>
    Harga: <input type="text" name="harga" value="<?= $editData ? $editData->getHarga() : "" ?>"><br>
    Stok: <input type="number" name="stok" value="<?= $editData ? $editData->getStok() : "" ?>"><br>
    Gambar: <input type="file" name="gambar"><br>
    <input type="submit" name="submit" value="<?= $editData ? "Update" : "Tambah" ?>">
</form>

<h2>Cari Produk</h2>
<form method="get">
    <input type="text" name="keyword" placeholder="Masukkan kata kunci" value="<?= htmlspecialchars($searchKeyword) ?>">
    <input type="submit" value="Cari">
</form>

<h2>Daftar Produk</h2>
<?php if (empty($_SESSION['daftar'])): ?>
    <p>Belum ada data!</p>
<?php else: ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Merk</th>
            <th>No Seri</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $found = false;
        foreach ($_SESSION['daftar'] as $i => $item): 
            $t = unserialize($item);

            // Filter pencarian
            if ($searchKeyword !== "" && stripos($t->getNamaProduk(), $searchKeyword) === false) {
                continue;
            }

            $found = true;
        ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= $t->getNamaProduk() ?></td>
            <td><?= $t->getMerk() ?></td>
            <td><?= $t->getNoSeri() ?></td>
            <td><?= $t->getDeskripsi() ?></td>
            <td><?= $t->getHarga() ?></td>
            <td><?= $t->getStok() ?></td>
            <td>
                <?php if ($t->getGambar()): ?>
                    <img src="<?= $t->getGambar() ?>" width="100">
                <?php endif; ?>
            </td>
            <td>
                <a href="?edit=<?= $i ?>">Edit</a> | 
                <a href="?hapus=<?= $i ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>

        <?php if ($searchKeyword !== "" && !$found): ?>
            <tr><td colspan="9" style="text-align:center;">Data tidak ditemukan!</td></tr>
        <?php endif; ?>
    </table>
<?php endif; ?>
</body>
</html>
