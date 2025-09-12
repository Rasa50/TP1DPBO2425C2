import java.util.ArrayList;

class Produk {
    String nama, merk, noSeri, deskripsi, harga;
    int stok;

    Produk(String nama, String merk, String noSeri, String deskripsi, String harga, int stok) {
        this.nama = nama; this.merk = merk; this.noSeri = noSeri;
        this.deskripsi = deskripsi; this.harga = harga; this.stok = stok;
    }

    void viewProduk() {
        System.out.println("Nama Produk : " + nama);
        System.out.println("Merk        : " + merk);
        System.out.println("No Seri     : " + noSeri);
        System.out.println("Deskripsi   : " + deskripsi);
        System.out.println("Harga       : Rp " + harga);
        System.out.println("Stok        : " + stok + "\n");
    }
}

class TokoElektronik {
    String nama, pemilik, alamat, noIzin;
    ArrayList<Produk> listProduk = new ArrayList<>();

    TokoElektronik(String nama, String pemilik, String alamat, String noIzin) {
        this.nama = nama; this.pemilik = pemilik;
        this.alamat = alamat; this.noIzin = noIzin;
    }

    void viewToko() {
        System.out.println("Nama Toko      : " + nama);
        System.out.println("Alamat Toko    : " + alamat);
        System.out.println("Pemilik        : " + pemilik);
        System.out.println("No Izin Usaha  : " + noIzin + "\n");
    }

    void tambahProduk(Produk p) {
        listProduk.add(p);
    }

    void tampilkanProduk() {
        if (listProduk.isEmpty()) {
            System.out.println("Belum ada produk!");
        } else {
            for (int i = 0; i < listProduk.size(); i++) {
                System.out.println("Produk ke-" + (i+1) + ":");
                listProduk.get(i).viewProduk();
            }
        }
    }
}