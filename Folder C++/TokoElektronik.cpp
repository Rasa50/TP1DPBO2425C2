#include <iostream>
#include <string>
using namespace std;

class TokoElektronik {
private:
    // Data toko
    string nama;
    string pemilik;
    string alamat;
    string noIzinUsaha;

    // Data produk
    string namaProduk;
    string merk;
    string noSeri;
    string deskripsi;
    string harga;
    int stok;

public:
    // Constructor
    TokoElektronik() {
        nama = "-";
        pemilik = "-";
        alamat = "-";
        noIzinUsaha = "-";
        namaProduk = "-";
        merk = "-";
        noSeri = "-";
        deskripsi = "-";
        harga = "-";
        stok = 0;
    }

    // === Setter & Getter Toko ===
    void setNamatoko(string n) { this->nama = n; }
    string getNamaToko() { return this->nama; }

    void setAlamatToko(string a) { this->alamat = a; }
    string getAlamatToko() { return this->alamat; }

    void setPemiliktoko(string p) { this->pemilik = p; }
    string getPemilikToko() { return this->pemilik; }

    void setNoIzinUsahaToko(string noIzin) { this->noIzinUsaha = noIzin; }
    string getNoIzinToko() { return this->noIzinUsaha; }

    // === Setter & Getter Produk ===
    void setNamaProduk(string np) { this->namaProduk = np; }
    string getNamaProduk() { return this->namaProduk; }

    void setMerk(string m) { this->merk = m; }
    string getMerk() { return this->merk; }

    void setNoSeri(string ns) { this->noSeri = ns; }
    string getNoSeri() { return this->noSeri; }

    void setDeskripsi(string d) { this->deskripsi = d; }
    string getDeskripsi() { return this->deskripsi; }

    void setHarga(string h) { this->harga = h; }
    string getHarga() { return this->harga; }

    void setStok(int s) { this->stok = s; }
    int getStok() { return this->stok; }

    // === View Data ===
    void viewToko() {
        cout << "Nama Toko      : " << nama << endl;
        cout << "Alamat Toko    : " << alamat << endl;
        cout << "Pemilik        : " << pemilik << endl;
        cout << "No Izin Usaha  : " << noIzinUsaha << endl;
    }

    void viewProduk() {
        cout << "Nama Produk : " << namaProduk << endl;
        cout << "Merk        : " << merk << endl;
        cout << "No Seri     : " << noSeri << endl;
        cout << "Deskripsi   : " << deskripsi << endl;
        cout << "Harga       : Rp " << harga << endl;
        cout << "Stok        : " << stok << endl << endl;
    }
};