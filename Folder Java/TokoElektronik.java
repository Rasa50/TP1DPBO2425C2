import java.util.ArrayList;
import java.util.Scanner;

class TokoElektronik {
    // Data toko
    String nama = "-";
    String pemilik = "-";
    String alamat = "-";
    String noIzinUsaha = "-";
    // Data produk
    String namaProduk = "-";
    String merk = "-";
    String noSeri = "-";
    String deskripsi = "-";
    String harga = "-";
    int stok = 0;

    void viewToko() {
        System.out.println("Nama Toko     : " + nama);
        System.out.println("Pemilik       : " + pemilik);
        System.out.println("Alamat        : " + alamat);
        System.out.println("No Izin Usaha : " + noIzinUsaha);
    }

    void viewProduk() {
        System.out.println("Nama Produk   : " + namaProduk);
        System.out.println("Merk          : " + merk);
        System.out.println("No Seri       : " + noSeri);
        System.out.println("Deskripsi     : " + deskripsi);
        System.out.println("Harga         : Rp " + harga);
        System.out.println("Stok          : " + stok);
        System.out.println();
    }

    public String getNamaToko() {
        return this.nama;
    }

    public String getNamaProduk() {
        return this.namaProduk;
    }

}