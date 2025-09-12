from TokoElektronik import TokoElektronik, Produk

# ========== PROGRAM UTAMA ==========
daftar_toko = []

while True:
    print("========== MENU ==========")
    print("1. Tambah Toko")
    print("2. Tambah Produk")
    print("3. Lihat Toko/Produk")
    print("4. Edit Toko")
    print("5. Edit Produk")
    print("6. Hapus Toko")
    print("7. Hapus Produk")
    print("0. Keluar")
    pilihan = input("Pilih: ")

    if pilihan == "1":  # Tambah Toko
        nama = input("Nama Toko: ")
        pemilik = input("Pemilik: ")
        alamat = input("Alamat: ")
        no_izin = input("No Izin Usaha: ")
        daftar_toko.append(TokoElektronik(nama, pemilik, alamat, no_izin))
        print("Toko berhasil ditambahkan!\n")

    elif pilihan == "2":  # Tambah Produk
        if not daftar_toko:
            print("Belum ada toko!\n")
            continue
        for i, toko in enumerate(daftar_toko, 1):
            print(f"{i}. {toko.nama}")
        idx = int(input("Pilih toko: ")) - 1
        nama = input("Nama Produk: ")
        merk = input("Merk: ")
        no_seri = input("No Seri: ")
        deskripsi = input("Deskripsi: ")
        harga = input("Harga: ")
        stok = int(input("Stok: "))
        daftar_toko[idx].tambah_produk(Produk(nama, merk, no_seri, deskripsi, harga, stok))
        print("Produk berhasil ditambahkan!\n")

    elif pilihan == "3":  # Lihat
        if not daftar_toko:
            print("Belum ada toko!\n")
            continue
        for i, toko in enumerate(daftar_toko, 1):
            print(f"{i}. {toko.nama}")
        idx = int(input("Pilih toko: ")) - 1
        daftar_toko[idx].view_toko()
        daftar_toko[idx].tampilkan_produk()

    elif pilihan == "4":  # Edit Toko
        if not daftar_toko:
            print("Belum ada toko!\n")
            continue
        for i, toko in enumerate(daftar_toko, 1):
            print(f"{i}. {toko.nama}")
        idx = int(input("Pilih toko yang ingin diedit: ")) - 1
        field = input("Edit [nama/pemilik/alamat/izin]: ")
        if field == "nama": daftar_toko[idx].nama = input("Nama baru: ")
        elif field == "pemilik": daftar_toko[idx].pemilik = input("Pemilik baru: ")
        elif field == "alamat": daftar_toko[idx].alamat = input("Alamat baru: ")
        elif field == "izin": daftar_toko[idx].no_izin = input("Izin baru: ")
        print("Toko berhasil diperbarui!\n")

    elif pilihan == "5":  # Edit Produk
        if not daftar_toko:
            print("Belum ada toko!\n")
            continue
        for i, toko in enumerate(daftar_toko, 1):
            print(f"{i}. {toko.nama}")
        idx = int(input("Pilih toko: ")) - 1
        daftar_toko[idx].tampilkan_produk()
        pidx = int(input("Pilih produk yang ingin diedit: ")) - 1
        field = input("Edit [nama/merk/no_seri/deskripsi/harga/stok]: ")
        if field == "nama": daftar_toko[idx].list_produk[pidx].nama = input("Nama baru: ")
        elif field == "merk": daftar_toko[idx].list_produk[pidx].merk = input("Merk baru: ")
        elif field == "no_seri": daftar_toko[idx].list_produk[pidx].no_seri = input("No Seri baru: ")
        elif field == "deskripsi": daftar_toko[idx].list_produk[pidx].deskripsi = input("Deskripsi baru: ")
        elif field == "harga": daftar_toko[idx].list_produk[pidx].harga = input("Harga baru: ")
        elif field == "stok": daftar_toko[idx].list_produk[pidx].stok = int(input("Stok baru: "))
        print("Produk berhasil diperbarui!\n")

    elif pilihan == "6":  # Hapus Toko
        if not daftar_toko:
            print("Belum ada toko!\n")
            continue
        for i, toko in enumerate(daftar_toko, 1):
            print(f"{i}. {toko.nama}")
        idx = int(input("Pilih toko yang ingin dihapus: ")) - 1
        daftar_toko.pop(idx)
        print("Toko berhasil dihapus!\n")

    elif pilihan == "7":  # Hapus Produk
        if not daftar_toko:
            print("Belum ada toko!\n")
            continue
        for i, toko in enumerate(daftar_toko, 1):
            print(f"{i}. {toko.nama}")
        idx = int(input("Pilih toko: ")) - 1
        daftar_toko[idx].tampilkan_produk()
        pidx = int(input("Pilih produk yang ingin dihapus: ")) - 1
        daftar_toko[idx].list_produk.pop(pidx)
        print("Produk berhasil dihapus!\n")

    elif pilihan == "0":
        print("Keluar dari program...")
        break

    else:
        print("Pilihan tidak valid!\n")