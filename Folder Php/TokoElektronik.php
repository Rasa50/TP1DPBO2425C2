<?php
class TokoElektronik {
    // Data produk
    private $namaProduk;
    private $merk;
    private $noSeri;
    private $deskripsi;
    private $harga;
    private $stok;
    private $gambar;

    public function __construct() {
        $this->namaProduk = "-";
        $this->merk = "-";
        $this->noSeri = "-";
        $this->deskripsi = "-";
        $this->harga = "-";
        $this->stok = 0;
        $this->gambar = "";
    }

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

    public function setGambar($g) { $this->gambar = $g; }
    public function getGambar() { return $this->gambar; }

    // === View Produk ===
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
