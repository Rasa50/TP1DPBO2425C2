#include <iostream>
#include <string>
using namespace std;

class TokoElektronik {
private:
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
        namaProduk = "-";
        merk = "-";
        noSeri = "-";
        deskripsi = "-";
        harga = "-";
        stok = 0;
    }

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

    // === View Produk ===
    void viewProduk() {
        cout << "Nama Produk : " << namaProduk << endl;
        cout << "Merk        : " << merk << endl;
        cout << "No Seri     : " << noSeri << endl;
        cout << "Deskripsi   : " << deskripsi << endl;
        cout << "Harga       : Rp " << harga << endl;
        cout << "Stok        : " << stok << endl << endl;
    }
};
