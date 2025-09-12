#include <iostream>
#include <string>

using namespace std;

class TokoElektronik{
    private :

    string nama;
    string pemilik;
    string alamat;
    string noIzinUsaha;
    
    public:

    class Produk{
        
        private :
        string namaproduk;
        string merk;
        string noSeri;
        string deskripsi;
        string harga;
        int stok;

        public :

        void setNamaProduk(string namaProduk){
            this->namaproduk = namaProduk;
        }

        string getNamaProduk(){
            return this->namaproduk;
        }

        void setMerk(string merk){
            this->merk = merk;
        }

        string getMerk(){
            return this->merk;
        }

        void setNoSeri(string noSeri){
            this->noSeri = noSeri;
        }

        string getNoSeri(){
            return this->noSeri;
        }

        void setDeskripsi(string deskripsi){
            this->deskripsi = deskripsi;
        }

        string getDeskripsi(){
            return this->deskripsi;
        }

        void setHarga(string harga){
            this->harga = harga;
        }

        string getHarga(){
            return this->harga;
        }

        void setStok(int stok){
            this->stok = stok;
        }

        int getStok(){
            return this->stok;
        }

        void viewProduk(){
            cout << "Nama Produk : " << namaproduk << endl;
            cout << "Merk        : " << merk << endl;
            cout << "No Seri     : " << noSeri << endl;
            cout << "Deskripsi   : " << deskripsi << endl;
            cout << "Harga       : Rp " << harga << endl;
            cout << "Stok        : " << stok << endl << endl;
        }

        Produk(){
            namaproduk = "-";
            merk = "-";
            noSeri = "-";
            deskripsi = "-";
            harga = "-";
            stok = 0;
        }
    };

    Produk listProduk[50];
    int jumlahProduk;

    TokoElektronik(){
        nama = "-";
        pemilik = "-";
        alamat = "-";
        noIzinUsaha = "-";
    }
    
    void ViewToko(){
        cout << "Nama Toko      : " << nama << endl;
        cout << "Alamat Toko    : " << alamat << endl;
        cout << "Pemilik        : " << pemilik << endl;
        cout << "No Izin Usaha  : " << noIzinUsaha << endl << endl;
    }

    void setNamatoko(string nama){
        this->nama = nama;
    }

    string getNamaToko(){
        return this->nama;
    }

    void setAlamatToko(string alamat){
        this->alamat = alamat;
    }

    string getAlamatToko(){
        return this->alamat;
    }

    void setPemiliktoko(string pemilik){
        this->pemilik = pemilik;
    }

    string getPemilikToko(){
        return this->nama;
    }

    void setNoIzinUsahaToko(string noIzinUsaha){
        this->noIzinUsaha = noIzinUsaha;
    }

    string getNoIzinToko(){
        return this->noIzinUsaha;
    }
    
    void tambahProduk(Produk p) {
        if (jumlahProduk < 100) {
            listProduk[jumlahProduk] = p;
            jumlahProduk++;
        } else {
            cout << "Kapasitas gudang penuh!" << endl;
        }
    }

    void tampilkanProduk() {
        if (jumlahProduk == 0){
            cout << "Belum Ada Produk Di Toko Ini!" << endl;
        }else{
            cout << "=== Daftar Produk ===" << endl;
            for (int i = 0; i < jumlahProduk; i++) {
                listProduk[i].viewProduk();
            }
        }
    }

    ~TokoElektronik() {
    }
};