# TP_One

saya Rafi Ahmad Al Farisi dengan NIM 2409829
mengerjakan TP 1 dalam mata kuliah Design Pemrograman Berbasis Object
untuk keberkahannya maka saya tidak akan melakukan kecurangan
seperti yang telah di spesifikasikan Aamiin.


Penjelasan Design

1. Struktur Kelas
    Class: TokoElektronik (sekarang fokus ke produk saja)
        Atribut (private):
            Data Produk: namaProduk, merk, noSeri, deskripsi, harga, stok
            Gambar Produk: gambar

    Method:
        Setter & Getter: set...() dan get...() untuk semua atribut produk
        viewProduk(): menampilkan detail data produk beserta gambar (jika ada)

2. Struktur Program Utama
    Array / List: daftar → menyimpan banyak object TokoElektronik (Python: list, PHP: session array, C++: array TokoElektronik daftar[100])
    Variabel Input:
    String: namaProduk, merk, noSeri, deskripsi, harga
    Integer: stok
    Loop Menu Utama (while / do-while):
    Tambah Data → input semua data produk → simpan ke daftar
    Lihat Data → tampilkan semua data produk dengan viewProduk()
    Edit Data → pilih data ke berapa → pilih field → update dengan setter
    Hapus Data → pilih data ke berapa → hapus dari list / geser array → redirect ke awal
    Cari Data → pilih kriteria (Nama Produk) → input kata kunci → tampilkan hasil yang cocok (case-insensitive substring match)
    Keluar → hentikan program

3. Desain Data
    Level 1: Array / list daftar → menyimpan banyak object TokoElektronik
    Level 2: Tiap object TokoElektronik menyimpan detail 1 produk + gambar
    Relasi: Array of object, tidak menggunakan nested class

4. Alur Utama
    Program mulai → tampilkan menu utama
    User pilih opsi:
    Tambah Data → input semua data produk → simpan ke daftar → kembali ke menu
    Lihat Data → looping dari 0 sampai jumlahData-1 → tampilkan viewProduk() → kembali ke menu
    Edit Data → tampilkan semua data → pilih index → pilih field → update nilai dengan setter → kembali ke menu
    Hapus Data → pilih index → hapus → geser array (shift) → kembali ke menu
    Cari Data → pilih kriteria (Nama Produk) → input kata kunci → loop → tampilkan hasil yang cocok → jika kosong → tampilkan "Data tidak ditemukan" → kembali ke menu
    Keluar → program berhenti

Flow Code 

Mulai
    Tampilkan Menu Utama
        -> Pilih Menu (1–5, 0)?
            -> (1) Tambah Data
                -> Input data produk
                -> Simpan ke daftar
                -> Kembali ke Menu
            -> (2) Lihat Data
                -> Jika kosong → tampilkan "Belum ada data"
                -> Jika ada → tampilkan semua dengan viewProduk()
                -> Kembali ke Menu
            -> (3) Edit Data
                -> Tampilkan semua data
                -> Pilih nomor data
                -> Pilih field (namaProduk, merk, noSeri, deskripsi, harga, stok)
                -> Update nilai dengan setter
                -> Kembali ke Menu
            -> (4) Hapus Data
                -> Tampilkan semua data
                -> Pilih nomor data
                -> Geser array untuk hapus data
                -> Kembali ke Menu
            -> (5) Cari Data
                -> Input kata kunci → loop → tampilkan data cocok
                -> Jika tidak ada → tampilkan "Data tidak ditemukan"
                -> Kembali ke Menu
            -> (0) Keluar → program berhenti
Selesai

Dokumentasi

1. C++

create
![create](Folder%20Dokumentasi/C++/create.png)  

view
![view](Folder%20Dokumentasi/C++/view.png)  

Before edit
![beforeAndEdit](Folder%20Dokumentasi/C++/beforeAndEdit.png)

after edit
![afterEdit](Folder%20Dokumentasi/C++/afterEdit.png)  

isi list
![listBuatSearch](Folder%20Dokumentasi/C++/listBuatSearch.png)  

search
![search](Folder%20Dokumentasi/C++/search.png)  

delete
![delete](Folder%20Dokumentasi/C++/delete.png)  

2. Python

create
![create](Folder%20Dokumentasi/Python/create.png)  

show
![show(view)](Folder%20Dokumentasi/Python/show(view).png)  

edit
![edit](Folder%20Dokumentasi/Python/edit.png)  

edit
![afterEdit](Folder%20Dokumentasi/Python/afterEdit.png)  

search
![search](Folder%20Dokumentasi/Python/search.png)  

delete
![delete](Folder%20Dokumentasi/Python/delete.png)  

3. Java

create
![create](Folder%20Dokumentasi/Java/create.png)  

show
![show](Folder%20Dokumentasi/Java/show.png)  

edit
![edit](Folder%20Dokumentasi/Java/edit.png)  

isi list
![listSearch](Folder%20Dokumentasi/Java/listSearch.png)  

search
![search](Folder%20Dokumentasi/Java/search.png)  

delete
![delete](Folder%20Dokumentasi/Java/delete.png)  

4. Php

create
![create](Folder%20Dokumentasi/Php/create.png)  

update
![update](Folder%20Dokumentasi/Php/update.png)  

isi list
![listSearch](Folder%20Dokumentasi/Php/listSearch.png)  

search
![search](Folder%20Dokumentasi/Php/search.png)  

delete
![hapus](Folder%20Dokumentasi/Php/hapus.png)

Foto
![foto](Folder%20Dokumentasi/Php/nambahFoto.png)  
