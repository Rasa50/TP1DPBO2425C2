#include "TokoElektronik.cpp"   // Import class TokoElektronik

int main() {
    // Array toko (maksimal 10 toko)
    TokoElektronik daftarToko[10];                      
    
    // Variabel global untuk kontrol
    int jumlahToko = 0, stop = 0, pilihan, stok;        
    
    // Variabel atribut toko
    string namaToko, pemilikToko, alamatToko, noIzin;   
    
    // Variabel atribut produk
    string namaProduk, merk, noSeri, deskripsi, harga;  

    // Loop menu utama
    while (stop != 1 && jumlahToko <= 10) {    
        // Menu utama
        cout << "========== MENU ==========" << endl;
        cout << "1 : Tambah Toko" << endl;
        cout << "2 : Tambah Produk" << endl;
        cout << "3 : Lihat Toko / Produk" << endl;
        cout << "4 : Edit Toko" << endl;
        cout << "5 : Edit Produk" << endl;
        cout << "6 : Hapus Toko" << endl;
        cout << "7 : Hapus Produk" << endl;
        cout << "0 : Keluar" << endl;
        cout << "===========================" << endl;
        cout << "Option : ";
        cin >> pilihan;
        
        switch (pilihan) {
            // ================== CASE 1 : TAMBAH TOKO ==================
            case 1: {   
                cout << "Masukkan Nama Toko : ";
                cin >> namaToko;
                daftarToko[jumlahToko].setNamatoko(namaToko);

                cout << "Masukkan Nama Pemilik Toko : ";
                cin >> pemilikToko;
                daftarToko[jumlahToko].setPemiliktoko(pemilikToko);

                cout << "Masukkan Alamat Toko : ";
                cin >> alamatToko;
                daftarToko[jumlahToko].setAlamatToko(alamatToko);

                cout << "Masukkan Nomor Izin Toko : ";
                cin >> noIzin;
                daftarToko[jumlahToko].setNoIzinUsahaToko(noIzin);

                // Increment jumlah toko
                jumlahToko++;
                cout << "Toko berhasil ditambahkan!" << endl;
                break;
            }
            
            // ================== CASE 2 : TAMBAH PRODUK ==================
            case 2: {   
                if (jumlahToko == 0) {
                    cout << "Belum ada toko, buat dulu!" << endl;
                    break;
                }

                // Pilih toko
                int poin;
                for (int i = 0; i < jumlahToko; i++) {
                    cout << i + 1 << ". " << daftarToko[i].getNamaToko() << endl;
                }
                cout << "Pilih Toko: ";
                cin >> poin;

                // Input produk baru
                TokoElektronik::Produk p;
                cout << "Masukkan Nama Produk : "; cin >> namaProduk; p.setNamaProduk(namaProduk);
                cout << "Masukkan Merk Produk : "; cin >> merk; p.setMerk(merk);
                cout << "Masukkan No. Seri Produk : "; cin >> noSeri; p.setNoSeri(noSeri);
                cout << "Masukkan Deskripsi Produk : "; cin >> deskripsi; p.setDeskripsi(deskripsi);
                cout << "Masukkan Harga Produk : "; cin >> harga; p.setHarga(harga);
                cout << "Masukkan Jumlah Stok : "; cin >> stok; p.setStok(stok);

                // Tambahkan ke toko
                daftarToko[poin - 1].tambahProduk(p);
                cout << "Produk berhasil ditambahkan!" << endl;
                break;
            }

            // ================== CASE 3 : LIHAT TOKO/PRODUK ==================
            case 3: {   
                int mode;
                cout << "1. Lihat semua toko" << endl;
                cout << "2. Lihat toko spesifik" << endl;
                cout << "Pilih mode: ";
                cin >> mode;

                if (mode == 1) {
                    // Tampilkan semua toko + produk
                    for (int i = 0; i < jumlahToko; i++) {
                        cout << "Toko ke-" << i + 1 << endl;
                        daftarToko[i].ViewToko();
                        daftarToko[i].tampilkanProduk();
                    }
                } else if (mode == 2) {
                    // Pilih toko tertentu
                    int pilihToko;
                    for (int i = 0; i < jumlahToko; i++) {
                        cout << i + 1 << ". " << daftarToko[i].getNamaToko() << endl;
                    }
                    cout << "Pilih toko: ";
                    cin >> pilihToko;

                    daftarToko[pilihToko - 1].ViewToko();

                    // Pilih mode produk
                    int pilihProdukMode;
                    cout << "1. Lihat semua produk" << endl;
                    cout << "2. Lihat produk spesifik" << endl;
                    cout << "Pilih: ";
                    cin >> pilihProdukMode;

                    if (pilihProdukMode == 1) {
                        daftarToko[pilihToko - 1].tampilkanProduk();
                    } else if (pilihProdukMode == 2) {
                        int pilihProduk;
                        daftarToko[pilihToko - 1].tampilkanProduk();
                        cout << "Pilih produk: ";
                        cin >> pilihProduk;
                        daftarToko[pilihToko - 1].listProduk[pilihProduk - 1].viewProduk();
                    }
                }
                break;
            }

            // ================== CASE 4 : EDIT TOKO ==================
            case 4: {   
                int pilihToko;
                for (int i = 0; i < jumlahToko; i++) {
                    cout << i + 1 << ". " << daftarToko[i].getNamaToko() << endl;
                }
                cout << "Pilih toko yang ingin diedit: ";
                cin >> pilihToko;

                // Pilih field spesifik
                int editPilihan;
                cout << "1. Nama" << endl;
                cout << "2. Pemilik" << endl;
                cout << "3. Alamat" << endl;
                cout << "4. Nomor Izin Usaha" << endl;
                cout << "Pilih: ";
                cin >> editPilihan;

                switch (editPilihan) {
                    case 1: cout << "Nama baru: "; cin >> namaToko; daftarToko[pilihToko - 1].setNamatoko(namaToko); break;
                    case 2: cout << "Pemilik baru: "; cin >> pemilikToko; daftarToko[pilihToko - 1].setPemiliktoko(pemilikToko); break;
                    case 3: cout << "Alamat baru: "; cin >> alamatToko; daftarToko[pilihToko - 1].setAlamatToko(alamatToko); break;
                    case 4: cout << "Nomor Izin baru: "; cin >> noIzin; daftarToko[pilihToko - 1].setNoIzinUsahaToko(noIzin); break;
                    default: cout << "Pilihan tidak valid!" << endl;
                }
                cout << "Data toko berhasil diperbarui!" << endl;
                break;
            }

            // ================== CASE 5 : EDIT PRODUK ==================
            case 5: {   
                int pilihToko, pilihProduk;
                for (int i = 0; i < jumlahToko; i++) {
                    cout << i + 1 << ". " << daftarToko[i].getNamaToko() << endl;
                }
                cout << "Pilih toko: ";
                cin >> pilihToko;

                daftarToko[pilihToko - 1].tampilkanProduk();
                cout << "Pilih produk: ";
                cin >> pilihProduk;

                // Pilih field produk yang ingin diedit
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
                    case 1: cout << "Nama produk baru: "; cin >> namaProduk; daftarToko[pilihToko - 1].listProduk[pilihProduk - 1].setNamaProduk(namaProduk); break;
                    case 2: cout << "Merk baru: "; cin >> merk; daftarToko[pilihToko - 1].listProduk[pilihProduk - 1].setMerk(merk); break;
                    case 3: cout << "No seri baru: "; cin >> noSeri; daftarToko[pilihToko - 1].listProduk[pilihProduk - 1].setNoSeri(noSeri); break;
                    case 4: cout << "Deskripsi baru: "; cin >> deskripsi; daftarToko[pilihToko - 1].listProduk[pilihProduk - 1].setDeskripsi(deskripsi); break;
                    case 5: cout << "Harga baru: "; cin >> harga; daftarToko[pilihToko - 1].listProduk[pilihProduk - 1].setHarga(harga); break;
                    case 6: cout << "Stok baru: "; cin >> stok; daftarToko[pilihToko - 1].listProduk[pilihProduk - 1].setStok(stok); break;
                    default: cout << "Pilihan tidak valid!" << endl;
                }
                cout << "Produk berhasil diperbarui!" << endl;
                break;
            }

            // ================== CASE 6 : HAPUS TOKO ==================
            case 6: {   
                int pilihToko;
                for (int i = 0; i < jumlahToko; i++) {
                    cout << i + 1 << ". " << daftarToko[i].getNamaToko() << endl;
                }
                cout << "Pilih toko yang ingin dihapus: ";
                cin >> pilihToko;

                // Geser array ke kiri untuk hapus
                for (int i = pilihToko - 1; i < jumlahToko - 1; i++) {
                    daftarToko[i] = daftarToko[i + 1];
                }
                jumlahToko--;
                cout << "Toko berhasil dihapus!" << endl;
                break;
            }

            // ================== CASE 7 : HAPUS PRODUK ==================
            case 7: {   
                int pilihToko, pilihProduk;
                for (int i = 0; i < jumlahToko; i++) {
                    cout << i + 1 << ". " << daftarToko[i].getNamaToko() << endl;
                }
                cout << "Pilih toko: ";
                cin >> pilihToko;

                daftarToko[pilihToko - 1].tampilkanProduk();
                cout << "Pilih produk yang ingin dihapus: ";
                cin >> pilihProduk;

                // Geser array produk ke kiri untuk hapus
                for (int i = pilihProduk - 1; i < daftarToko[pilihToko - 1].jumlahProduk - 1; i++) {
                    daftarToko[pilihToko - 1].listProduk[i] = daftarToko[pilihToko - 1].listProduk[i + 1];
                }
                daftarToko[pilihToko - 1].jumlahProduk--;
                cout << "Produk berhasil dihapus!" << endl;
                break;
            }

            // ================== CASE 0 : KELUAR ==================
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