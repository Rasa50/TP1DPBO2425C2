# TP_One

saya Rafi Ahmad Al Farisi dengan NIM 2409829
mengerjakan TP 1 dalam mata kuliah Design Pemrograman Berbasis Object
untuk keberkahannya maka saya tidak akan melakukan kecurangan
seperti yang telah di spesifikasikan Aamiin.


Penjelasan Design
1. Struktur Kelas

    Class           : TokoElektronik
    Atribut         : (private)
    Identitas toko  : nama, pemilik, alamat, noIzinUsaha.
    Data produk     : namaProduk, merk, noSeri, deskripsi, harga, stok.

    -> Method
        set... / get... : setter dan getter untuk semua atribut.
        viewToko()      : menampilkan detail data toko.
        viewProduk()    : menampilkan detail data produk.

2. Struktur Program Utama (Main.cpp)

    Ada array TokoElektronik daftar[100]    : maksimal menyimpan 100 data toko + produk.
    Variabel input                          : string untuk data teks (nama, merk, deskripsi, dll) dan integer untuk stok.
    Loop while                              : menampilkan menu utama dengan pilihan:
    Tambah Data                             : isi semua data toko + produk, simpan ke daftar[jumlahData].
    Lihat Data                              : tampilkan semua data toko & produk yang ada.
    Edit Data                               : pilih data ke berapa, lalu pilih field mana yang mau diubah (nama toko, pemilik, alamat, produk, harga, stok, dll).
    Hapus Data                              : pilih data ke berapa, lalu hapus dengan cara menggeser array (shift array).
    Cari Data                               : pilih kriteria (nama toko / nama produk), input kata kunci, cari dalam array (substring search).
    Keluar                                  : hentikan program.

3. Desain Data

    Level 1 : Array daftar[100] → menyimpan banyak object TokoElektronik.
    Level 2 : Tiap object TokoElektronik menyimpan detail 1 toko + 1 produk.
    Relasi  : Program ini lebih ke array of object, bukan has-a seperti contoh nested class.

4. Alur Utama
    Program mulai, tampilkan menu utama.
    User pilih opsi menu:
    Tambah -> input semua data -> simpan ke daftar[jumlahData] -> jumlahData++.
    Lihat -> looping dari 0 sampai jumlahData-1, panggil viewToko() + viewProduk().
    Edit -> tampilkan semua data -> pilih index data -> pilih field -> setter untuk update nilai.
    Hapus -> pilih index data -> lakukan shift array -> jumlahData--.
    Cari -> Pilih kriteria → Input kata kunci → Looping data → Cocok? → tampilkan / kalau kosong → tampilkan pesan gagal → balik ke menu.
    Keluar -> set stop = 1, program berhenti.
    Setelah setiap operasi (selain keluar), kembali ke menu utama.

Flow Code

1. Mulai
2. Tampilkan Menu Utama
    -> Pilih Menu (1–4, 0)?
        -> (1) Tambah Data
            -> Input data toko + produk.
            -> Simpan ke daftar[jumlahData].
            -> jumlahData++.
            -> Kembali ke Menu.
        -> (2) Lihat Data
            -> Jika kosong, tampil pesan "Belum ada data".
            -> Jika ada, tampilkan semua isi array dengan viewToko() + viewProduk().
            -> Kembali ke Menu.
        -> (3) Edit Data
            -> Tampilkan semua data.
            -> Pilih nomor data.
            -> Pilih field (nama toko, pemilik, alamat, produk, merk, no seri, deskripsi, harga, stok).
            -> Update nilai dengan setter.
            -> Kembali ke Menu.
        -> (4) Hapus Data
            -> Tampilkan semua data.
            -> Pilih nomor data.
            -> Geser array (shift) untuk menghapus data.
            -> jumlahData--.
            -> Kembali ke Menu.
        -> (5) Cari Data (NEW)
            -> Pilih kriteria pencarian: Nama Toko / Nama Produk
            -> Input kata kunci (string)
            -> Looping array
                -> tampilkan data yang cocok (case-insensitive / substring match)
            -> Jika tidak ada yang cocok 
                ->tampilkan "Data tidak ditemukan"
            -> Kembali ke Menu
        -> (0) Keluar
            -> Set stop = 1.
3. Selesai



1. C++

![create]("Folder Dokumentasi/C++/create.png")
![view]("Folder Dokumentasi/C++/view.png")
![beforeAndEdit]("Folder Dokumentasi/C++/beforeAndEdit.png")
![afterEdit]("Folder Dokumentasi/C++/afterEdit.png")
![listBuatSearch]("Folder Dokumentasi/C++/listBuatSearch.png")
![search]("Folder Dokumentasi/C++/search.png")
![delete]("Folder Dokumentasi/C++/delete.png")

2. Python

![create]("Folder Dokumentasi/Python/create.png")
![show(view)]("Folder Dokumentasi/Python/show(view).png")
![edit]("Folder Dokumentasi/Python/edit.png")
![afterEdit]("Folder Dokumentasi/Python/afterEdit.png")
![search]("Folder Dokumentasi/Python/search.png")
![delete]("Folder Dokumentasi/Python/delete.png")

3. Java

![create]("Folder Dokumentasi/Java/create.png")
![show]("Folder Dokumentasi/Java/show.png")
![edit]("Folder Dokumentasi/Java/edit.png")
![listSearch]("Folder Dokumentasi/Java/listSearch.png")
![search]("Folder Dokumentasi/Java/search.png")
![delete]("Folder Dokumentasi/Java/delete.png")

3. Php

![create]("Folder Dokumentasi/Php/create.png")
![update]("Folder Dokumentasi/Php/update.png")
![listSearch]("Folder Dokumentasi/Php/listSearch.png")
![search]("Folder Dokumentasi/Php/search.png")
![hapus]("Folder Dokumentasi/Php/hapus.png")
