<?php
class TokoElektronik {
    private $nama;
    private $pemilik;
    private $alamat;
    private $noIzinUsaha;

    private $namaProduk;
    private $merk;
    private $noSeri;
    private $deskripsi;
    private $harga;
    private $stok;
    private $gambar; // NEW

    public function __construct() {
        $this->nama = "-";
        $this->pemilik = "-";
        $this->alamat = "-";
        $this->noIzinUsaha = "-";
        $this->namaProduk = "-";
        $this->merk = "-";
        $this->noSeri = "-";
        $this->deskripsi = "-";
        $this->harga = "-";
        $this->stok = 0;
        $this->gambar = "";
    }

    // === Setter & Getter Toko ===
    public function setNamatoko($n) { $this->nama = $n; }
    public function getNamaToko() { return $this->nama; }

    public function setAlamatToko($a) { $this->alamat = $a; }
    public function getAlamatToko() { return $this->alamat; }

    public function setPemiliktoko($p) { $this->pemilik = $p; }
    public function getPemilikToko() { return $this->pemilik; }

    public function setNoIzinUsahaToko($n) { $this->noIzinUsaha = $n; }
    public function getNoIzinToko() { return $this->noIzinUsaha; }

    // === Setter & Getter Produk ===
    public function setNamaProduk($np) { $this->namaProduk = $np; }
    public function getNamaProduk() { return $this->namaProduk; }

    public function setMerk($m) { $this->merk = $m; }
    public function getMerk() { return $this->merk; }

    public function setNoSeri($ns) { $this->noSeri = $ns; }
    public function getNoSeri() { return $this->noSeri; }

    public function setDeskripsi($d) { $this->deskripsi = $d; }
    public function getDeskripsi() { return $this->deskripsi; }

    public function setHarga($h) { $this->harga = $h; }
    public function getHarga() { return $this->harga; }

    public function setStok($s) { $this->stok = $s; }
    public function getStok() { return $this->stok; }

    // === Setter & Getter Gambar ===
    public function setGambar($g) { $this->gambar = $g; }
    public function getGambar() { return $this->gambar; }

    // === View Data ===
    public function viewToko() {
        return "
        Nama Toko     : {$this->nama}<br>
        Alamat Toko   : {$this->alamat}<br>
        Pemilik       : {$this->pemilik}<br>
        No Izin Usaha : {$this->noIzinUsaha}<br>
        ";
    }

    public function viewProduk() {
        $out = "
        Nama Produk : {$this->namaProduk}<br>
        Merk        : {$this->merk}<br>
        No Seri     : {$this->noSeri}<br>
        Deskripsi   : {$this->deskripsi}<br>
        Harga       : Rp {$this->harga}<br>
        Stok        : {$this->stok}<br>
        ";

        if (!empty($this->gambar)) {
            $out .= "<img src='{$this->gambar}' alt='Gambar Produk' width='120'><br>";
        }

        return $out;
    }
}
?>
