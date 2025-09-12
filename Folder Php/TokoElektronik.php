<?php
// === PRODUK ===
class Produk {
    private $namaproduk = "";
    private $merk = "";
    private $noSeri = "";
    private $deskripsi = "";
    private $harga = 0;
    private $stok = 0;

    public function __construct($namaproduk = "", $merk = "", $noSeri = "", $deskripsi = "", $harga = 0, $stok = 0) {
        $this->namaproduk = $namaproduk;
        $this->merk = $merk;
        $this->noSeri = $noSeri;
        $this->deskripsi = $deskripsi;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    // setter / getter
    public function setNamaProduk($n){ $this->namaproduk = $n; }
    public function getNamaProduk(){ return $this->namaproduk; }

    public function setMerk($m){ $this->merk = $m; }
    public function getMerk(){ return $this->merk; }

    public function setNoSeri($s){ $this->noSeri = $s; }
    public function getNoSeri(){ return $this->noSeri; }

    public function setDeskripsi($d){ $this->deskripsi = $d; }
    public function getDeskripsi(){ return $this->deskripsi; }

    public function setHarga($h){ $this->harga = $h; }
    public function getHarga(){ return $this->harga; }

    public function setStok($st){ $this->stok = $st; }
    public function getStok(){ return $this->stok; }

    public function viewProduk(){
        echo "Nama Produk : " . $this->namaproduk . "<br/>";
        echo "Merk        : " . $this->merk . "<br/>";
        echo "No Seri     : " . $this->noSeri . "<br/>";
        echo "Deskripsi   : " . $this->deskripsi . "<br/>";
        echo "Harga       : " . $this->harga . "<br/>";
        echo "Stok        : " . $this->stok . "<br/><br/>";
    }
}

// === TOKO ELEKTRONIK ===
class TokoElektronik {
    private $nama = "";
    private $pemilik = "";
    private $alamat = "";
    private $noIzinUsaha = "";

    // array untuk menyimpan objek Produk
    private $listProduk = array();
    private $jumlahProduk = 0; // maksimal 50

    public function __construct($nama = "", $pemilik = "", $alamat = "", $noIzin = "") {
        $this->nama = $nama;
        $this->pemilik = $pemilik;
        $this->alamat = $alamat;
        $this->noIzinUsaha = $noIzin;
    }

    // setter/getter toko
    public function setNama($n){ $this->nama = $n; }
    public function getNama(){ return $this->nama; }

    public function setPemilik($p){ $this->pemilik = $p; }
    public function getPemilik(){ return $this->pemilik; }

    public function setAlamat($a){ $this->alamat = $a; }
    public function getAlamat(){ return $this->alamat; }

    public function setIzin($i){ $this->noIzinUsaha = $i; }
    public function getIzin(){ return $this->noIzinUsaha; }

    public function viewToko(){
        echo "<h3>Detail Toko</h3>";
        echo "Nama Toko   : " . $this->nama . "<br/>";
        echo "Pemilik     : " . $this->pemilik . "<br/>";
        echo "Alamat      : " . $this->alamat . "<br/>";
        echo "No Izin     : " . $this->noIzinUsaha . "<br/><br/>";
    }

    // tambah produk (maks 50)
    public function tambahProduk(Produk $p){
        if ($this->jumlahProduk < 50) {
            $this->listProduk[$this->jumlahProduk] = $p;
            $this->jumlahProduk++;
            return true;
        }
        return false;
    }

    public function tampilkanProduk(){
        if ($this->jumlahProduk == 0) {
            echo "Belum ada produk.<br/>";
            return;
        }
        for ($i = 0; $i < $this->jumlahProduk; $i++) {
            echo "<strong>=== Produk ".($i+1)." ===</strong><br/>";
            $this->listProduk[$i]->viewProduk();
        }
    }

    // hapus produk
    public function hapusProduk($index){
        if ($index >= 0 && $index < $this->jumlahProduk) {
            for ($i = $index; $i < $this->jumlahProduk - 1; $i++) {
                $this->listProduk[$i] = $this->listProduk[$i+1];
            }
            unset($this->listProduk[$this->jumlahProduk - 1]);
            $this->jumlahProduk--;
            return true;
        }
        return false;
    }

    public function getJumlahProduk(){ return $this->jumlahProduk; }
}

// === DAFTAR TOKO ===
class DaftarToko {
    private $listToko = array();
    private $jumlahToko = 0;

    public function tambahToko(TokoElektronik $t){
        $this->listToko[$this->jumlahToko] = $t;
        $this->jumlahToko++;
    }

    public function tampilkanToko(){
        if ($this->jumlahToko == 0) {
            echo "Belum ada toko.<br/>";
            return;
        }
        for ($i = 0; $i < $this->jumlahToko; $i++) {
            echo "<h2>Toko ".($i+1)."</h2>";
            $this->listToko[$i]->viewToko();
        }
    }

    public function hapusToko($index){
        if ($index >= 0 && $index < $this->jumlahToko) {
            for ($i = $index; $i < $this->jumlahToko - 1; $i++) {
                $this->listToko[$i] = $this->listToko[$i+1];
            }
            unset($this->listToko[$this->jumlahToko - 1]);
            $this->jumlahToko--;
            return true;
        }
        return false;
    }
}
?>