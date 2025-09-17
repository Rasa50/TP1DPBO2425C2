#include "TokoElektronik.cpp"   // Import class Produk
#include <iostream>
using namespace std;

int main() {
    TokoElektronik daftar[100];  // Array produk
    int jumlahData = 0, stop = 0, pilihan;

    // Variabel input
    string namaProduk, merk, noSeri, deskripsi, harga;
    int stok;

    while (stop != 1 && jumlahData < 100) {
        // Menu utama
        cout << "========== MENU ==========" << endl;
        cout << "1 : Tambah Produk" << endl;
        cout << "2 : Lihat Produk" << endl;
        cout << "3 : Edit Produk" << endl;
        cout << "4 : Hapus Produk" << endl;
        cout << "5 : Cari Produk" << endl;
        cout << "0 : Keluar" << endl;
        cout << "===========================" << endl;
        cout << "Option : ";
        cin >> pilihan;

        switch (pilihan) {
            // CREATE
            case 1: {
                cout << "Masukkan Nama Produk : "; cin >> namaProduk;
                cout << "Masukkan Merk Produk : "; cin >> merk;
                cout << "Masukkan No. Seri    : "; cin >> noSeri;
                cout << "Masukkan Deskripsi   : "; cin >> deskripsi;
                cout << "Masukkan Harga       : "; cin >> harga;
                cout << "Masukkan Stok        : "; cin >> stok;

                daftar[jumlahData].setNamaProduk(namaProduk);
                daftar[jumlahData].setMerk(merk);
                daftar[jumlahData].setNoSeri(noSeri);
                daftar[jumlahData].setDeskripsi(deskripsi);
                daftar[jumlahData].setHarga(harga);
                daftar[jumlahData].setStok(stok);

                jumlahData++;
                cout << "Produk berhasil ditambahkan!" << endl;
                break;
            }

            // READ
            case 2: {
                if (jumlahData == 0) {
                    cout << "Belum ada produk!" << endl;
                } else {
                    for (int i = 0; i < jumlahData; i++) {
                        cout << "=== Produk ke-" << i + 1 << " ===" << endl;
                        daftar[i].viewProduk();
                    }
                }
                break;
            }

            // UPDATE
            case 3: {
                int index;
                if (jumlahData == 0) {
                    cout << "Belum ada produk!" << endl;
                    break;
                } else {
                    for (int i = 0; i < jumlahData; i++) {
                        cout << "=== Produk ke-" << i + 1 << " ===" << endl;
                        daftar[i].viewProduk();
                    }
                }
                cout << "Pilih nomor produk yang ingin diedit: ";
                cin >> index;

                if (index < 1 || index > jumlahData) {
                    cout << "Nomor tidak valid!" << endl;
                    break;
                }

                int editPilihan;
                cout << "1. Nama Produk" << endl;
                cout << "2. Merk" << endl;
                cout << "3. No Seri" << endl;
                cout << "4. Deskripsi" << endl;
                cout << "5. Harga" << endl;
                cout << "6. Stok" << endl;
                cout << "Pilih: ";
                cin >> editPilihan;

                switch (editPilihan) {
                    case 1: cout << "Nama baru: "; cin >> namaProduk; daftar[index-1].setNamaProduk(namaProduk); break;
                    case 2: cout << "Merk baru: "; cin >> merk; daftar[index-1].setMerk(merk); break;
                    case 3: cout << "No Seri baru: "; cin >> noSeri; daftar[index-1].setNoSeri(noSeri); break;
                    case 4: cout << "Deskripsi baru: "; cin >> deskripsi; daftar[index-1].setDeskripsi(deskripsi); break;
                    case 5: cout << "Harga baru: "; cin >> harga; daftar[index-1].setHarga(harga); break;
                    case 6: cout << "Stok baru: "; cin >> stok; daftar[index-1].setStok(stok); break;
                    default: cout << "Pilihan tidak valid!" << endl;
                }
                cout << "Produk berhasil diperbarui!" << endl;
                break;
            }

            // DELETE
            case 4: {
                int index;
                if (jumlahData == 0) {
                    cout << "Belum ada produk!" << endl;
                    break;
                } else {
                    for (int i = 0; i < jumlahData; i++) {
                        cout << "=== Produk ke-" << i + 1 << " ===" << endl;
                        daftar[i].viewProduk();
                    }
                }
                cout << "Pilih nomor produk yang ingin dihapus: ";
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
                cout << "Produk berhasil dihapus!" << endl;
                break;
            }

            // SEARCH
            case 5: {
                if (jumlahData == 0) {
                    cout << "Belum ada produk untuk dicari!" << endl;
                    break;
                }

                string keyword;
                cout << "Masukkan nama produk yang dicari: ";
                cin >> keyword;

                bool found = false;
                for (int i = 0; i < jumlahData; i++) {
                    if (daftar[i].getNamaProduk() == keyword) {
                        cout << "=== Produk ditemukan di data ke-" << i + 1 << " ===" << endl;
                        daftar[i].viewProduk();
                        found = true;
                    }
                }

                if (!found) {
                    cout << "Produk tidak ditemukan!" << endl;
                }
                break;
            }

            // EXIT
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
