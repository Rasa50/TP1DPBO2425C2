#include "TokoElektronik.cpp"   // Import class TokoElektronik
#include <iostream>
using namespace std;

int main() {
    // Array untuk simpan data (maks 100 data)
    TokoElektronik daftar[100];                      
    int jumlahData = 0, stop = 0, pilihan;        

    // Variabel input
    string namaToko, pemilikToko, alamatToko, noIzin;
    string namaProduk, merk, noSeri, deskripsi, harga;  
    int stok;

    while (stop != 1 && jumlahData < 100) {    
        // Menu utama
        cout << "========== MENU ==========" << endl;
        cout << "1 : Tambah Data" << endl;
        cout << "2 : Lihat Data" << endl;
        cout << "3 : Edit Data" << endl;
        cout << "4 : Hapus Data" << endl;
        cout << "5 : Cari Data" << endl; // <-- tambahan
        cout << "0 : Keluar" << endl;
        cout << "===========================" << endl;
        cout << "Option : ";
        cin >> pilihan;
        
        switch (pilihan) {
            // ================== CASE 1 : CREATE ==================
            case 1: {   
                cout << "Masukkan Nama Toko : "; cin >> namaToko;
                cout << "Masukkan Nama Pemilik Toko : "; cin >> pemilikToko;
                cout << "Masukkan Alamat Toko : "; cin >> alamatToko;
                cout << "Masukkan Nomor Izin Toko : "; cin >> noIzin;
                cout << "Masukkan Nama Produk : "; cin >> namaProduk;
                cout << "Masukkan Merk Produk : "; cin >> merk;
                cout << "Masukkan No. Seri Produk : "; cin >> noSeri;
                cout << "Masukkan Deskripsi Produk : "; cin >> deskripsi;
                cout << "Masukkan Harga Produk : "; cin >> harga;
                cout << "Masukkan Jumlah Stok : "; cin >> stok;

                daftar[jumlahData].setNamatoko(namaToko);
                daftar[jumlahData].setPemiliktoko(pemilikToko);
                daftar[jumlahData].setAlamatToko(alamatToko);
                daftar[jumlahData].setNoIzinUsahaToko(noIzin);
                daftar[jumlahData].setNamaProduk(namaProduk);
                daftar[jumlahData].setMerk(merk);
                daftar[jumlahData].setNoSeri(noSeri);
                daftar[jumlahData].setDeskripsi(deskripsi);
                daftar[jumlahData].setHarga(harga);
                daftar[jumlahData].setStok(stok);

                jumlahData++;
                cout << "Data berhasil ditambahkan!" << endl;
                break;
            }
            
            // ================== CASE 2 : READ ==================
            case 2: {   
                if (jumlahData == 0) {
                    cout << "Belum ada data!" << endl;
                } else {
                    for (int i = 0; i < jumlahData; i++) {
                        cout << "=== Data ke-" << i + 1 << " ===" << endl;
                        daftar[i].viewToko();
                        daftar[i].viewProduk();
                    }
                }
                break;
            }

            // ================== CASE 3 : UPDATE ==================
            case 3: {   
                int index;
                if (jumlahData == 0) {
                    cout << "Belum ada data!" << endl;
                    break;
                } else {
                    for (int i = 0; i < jumlahData; i++) {
                        cout << "=== Data ke-" << i + 1 << " ===" << endl;
                        daftar[i].viewToko();
                        daftar[i].viewProduk();
                    }
                }
                cout << "Pilih nomor data yang ingin diedit: ";
                cin >> index;

                if (index < 1 || index > jumlahData) {
                    cout << "Nomor tidak valid!" << endl;
                    break;
                }

                int editPilihan;
                cout << "1. Nama Toko" << endl;
                cout << "2. Pemilik Toko" << endl;
                cout << "3. Alamat Toko" << endl;
                cout << "4. No Izin Usaha" << endl;
                cout << "5. Nama Produk" << endl;
                cout << "6. Merk Produk" << endl;
                cout << "7. No Seri Produk" << endl;
                cout << "8. Deskripsi Produk" << endl;
                cout << "9. Harga Produk" << endl;
                cout << "10. Stok Produk" << endl;
                cout << "Pilih: ";
                cin >> editPilihan;

                switch (editPilihan) {
                    case 1: cout << "Nama Toko baru: "; cin >> namaToko; daftar[index-1].setNamatoko(namaToko); break;
                    case 2: cout << "Pemilik baru: "; cin >> pemilikToko; daftar[index-1].setPemiliktoko(pemilikToko); break;
                    case 3: cout << "Alamat baru: "; cin >> alamatToko; daftar[index-1].setAlamatToko(alamatToko); break;
                    case 4: cout << "No Izin baru: "; cin >> noIzin; daftar[index-1].setNoIzinUsahaToko(noIzin); break;
                    case 5: cout << "Nama Produk baru: "; cin >> namaProduk; daftar[index-1].setNamaProduk(namaProduk); break;
                    case 6: cout << "Merk baru: "; cin >> merk; daftar[index-1].setMerk(merk); break;
                    case 7: cout << "No Seri baru: "; cin >> noSeri; daftar[index-1].setNoSeri(noSeri); break;
                    case 8: cout << "Deskripsi baru: "; cin >> deskripsi; daftar[index-1].setDeskripsi(deskripsi); break;
                    case 9: cout << "Harga baru: "; cin >> harga; daftar[index-1].setHarga(harga); break;
                    case 10: cout << "Stok baru: "; cin >> stok; daftar[index-1].setStok(stok); break;
                    default: cout << "Pilihan tidak valid!" << endl;
                }
                cout << "Data berhasil diperbarui!" << endl;
                break;
            }

            // ================== CASE 4 : DELETE ==================
            case 4: {   
                int index;
                if (jumlahData == 0) {
                    cout << "Belum ada data!" << endl;
                    break;
                } else {
                    for (int i = 0; i < jumlahData; i++) {
                        cout << "=== Data ke-" << i + 1 << " ===" << endl;
                        daftar[i].viewToko();
                    }
                }
                cout << "Pilih nomor data yang ingin dihapus: ";
                cin >> index;

                if (index < 1 || index > jumlahData) {
                    cout << "Nomor tidak valid!" << endl;
                    break;
                }

                // Geser array
                for (int i = index - 1; i < jumlahData - 1; i++) {
                    daftar[i] = daftar[i + 1];
                }
                jumlahData--;
                cout << "Data berhasil dihapus!" << endl;
                break;
            }

            // ================== CASE 5 : SEARCH ==================
            case 5: {
                if (jumlahData == 0) {
                    cout << "Belum ada data untuk dicari!" << endl;
                    break;
                }

                int searchPilihan;
                cout << "Cari berdasarkan:" << endl;
                cout << "1. Nama Toko" << endl;
                cout << "2. Nama Produk" << endl;
                cout << "Pilih: ";
                cin >> searchPilihan;

                string keyword;
                cout << "Masukkan kata kunci: ";
                cin >> keyword;

                bool found = false;
                for (int i = 0; i < jumlahData; i++) {
                    if ((searchPilihan == 1 && daftar[i].getNamaToko() == keyword) ||
                        (searchPilihan == 2 && daftar[i].getNamaProduk() == keyword)) {
                        cout << "=== Hasil ditemukan di data ke-" << i + 1 << " ===" << endl;
                        daftar[i].viewToko();
                        daftar[i].viewProduk();
                        found = true;
                    }
                }

                if (!found) {
                    cout << "Data tidak ditemukan!" << endl;
                }
                break;
            }


            // ================== CASE 0 : EXIT ==================
            case 0:
                stop = 1;
                cout << "Keluar dari program..." << endl;
                break;

            default:
                cout << "Pilihan tidak valid!" << endl;
                break;
        }
        cout << endl; // spasi antar menu
    }
    return 0;
}