# TP_One

saya Rafi Ahmad Al Farisi dengan NIM 2409829
mengerjakan TP 1 dalam mata kuliah Design Pemrograman Berbasis Object
untuk keberkahannya maka saya tidak akan melakukan kecurangan
sepertu yang telah di spesifikasikan Aamiin.


Penjelasan Design

1. Struktur Kelas
    Class TokoElektronik
    Atribut (private): nama, pemilik, alamat, noIzinUsaha → identitas toko.
    
    Nested Class Produk: Atribut: namaproduk, merk, noSeri, deskripsi, harga, stok.
    Semua atribut private → diakses lewat getter & setter.
    
    Method: viewProduk() untuk menampilkan detail produk.

    Atribut lain:

    Produk listProduk[50] → array produk dalam 1 toko (maksimal 50).
    int jumlahProduk → pencatat jumlah produk aktif.

    Method utama:
    ViewToko() → menampilkan detail toko.
    set... / get... → setter-getter untuk toko.
    tambahProduk(Produk p) → menambah produk baru.
    tampilkanProduk() → menampilkan semua produk dalam toko.

2. Struktur Program Utama (Main.cpp)

    Ada array TokoElektronik daftarToko[10] → maksimal 10 toko.
    Variabel global untuk input data toko & produk.
    Loop while → menampilkan menu utama:
        Tambah Toko → buat objek toko baru dan isi atributnya.
        Tambah Produk → pilih toko → input produk → simpan ke array produk toko tersebut.
        Lihat Toko/Produk
            Mode 1: tampilkan semua toko + semua produk.
            Mode 2: pilih toko → tampilkan produk (semua atau spesifik).
        Edit Toko → pilih toko, edit field tertentu (nama, alamat, pemilik, izin).
        Edit Produk → pilih toko → pilih produk → edit field tertentu (nama, merk, stok, dll).
        Hapus Toko → pilih toko, lalu array bergeser (data toko dihapus).
        Hapus Produk → pilih toko, pilih produk, lalu array produk bergeser.
        Keluar → berhenti dari program.

3. Desain Data

    Tingkat 1: Program menyimpan banyak toko (daftarToko[10]).
    Tingkat 2: Tiap toko bisa punya banyak produk (listProduk[50]).
    Hubungan: TokoElektronik memiliki (has-a) Produk.

4. Alur Utama

    User pilih menu.
    Program minta input atau menampilkan data sesuai case.
    Jika tambah/edit, data dimasukkan ke dalam array (daftarToko atau listProduk).
    Jika hapus, array digeser untuk menutup celah data.
    Selalu kembali ke menu utama sampai user pilih 0 (Keluar).

flowCode

1. Mulai
2. Tampilkan Menu Utama
    - Pilih Menu (1 - 7, 0) ?
        - (1) Tambah Toko
            --> [Input data toko (nama, pemilik, alamat, no izin)]
            --> [Simpan ke daftarToko[]]
            --> [Kembali ke Menu]
        - (2) Tambah Produk
            --> [Tampilkan daftar toko]
            --> [Pilih toko]
            --> [Input data produk (nama, merk, no seri, deskripsi, harga, stok)]
            --> [Simpan ke listProduk[] toko]
            --> [Kembali ke Menu]
        - (3) Lihat Toko / Produk
            --> [Pilih mode: semua / spesifik]
                - Semua --> [Tampilkan semua toko dan produk]
                - Spesifik --> [Pilih toko]
                    - Semua produk
                        --> [Tampil]
                    - Produk spesifik
                        --> [Tampil] 
            --> [Kembali ke Menu]
        - (4) Edit Toko
            --> [Pilih toko]
            --> [Pilih field (nama/pemilik/alamat/izin)]
            --> [Update data]
            --> [Kembali ke Menu]
        - (5) Edit Produk
            --> [Pilih toko]
            --> [Pilih produk]
            --> [Pilih field (nama, merk, no seri, deskripsi, harga, stok)]
            --> [Update data]
            --> [Kembali ke Menu]
        - (6) Hapus Toko
            --> [Pilih toko]
            --> [Hapus dari daftarToko[]]
            --> [Shift array toko]
            --> [Kembali ke Menu]
        - (7) Hapus Produk 
            --> [Pilih toko]
            --> [Pilih produk]
            --> [Hapus dari listProduk[]]
            --> [Shift array produk]
            --> [Kembali ke Menu]
        - (0) Keluar
3. Selesai