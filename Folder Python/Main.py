from TokoElektronik import TokoElektronik

# ===== Program utama =====
daftar = []
while True:
    print("===== MENU =====")
    print("1. Tambah Data")
    print("2. Lihat Data")
    print("3. Edit Data")
    print("4. Hapus Data")
    print("5. Cari Data")
    print("0. Keluar")
    pilihan = input("Pilih: ")

    if pilihan == "1":
        t = TokoElektronik()
        t.nama = input("Nama Toko: ")
        t.pemilik = input("Pemilik: ")
        t.alamat = input("Alamat: ")
        t.noIzinUsaha = input("No Izin Usaha: ")
        t.namaProduk = input("Nama Produk: ")
        t.merk = input("Merk: ")
        t.noSeri = input("No Seri: ")
        t.deskripsi = input("Deskripsi: ")
        t.harga = input("Harga: ")
        t.stok = int(input("Stok: "))
        daftar.append(t)
        print("Data berhasil ditambahkan!\n")

    elif pilihan == "2":
        if not daftar:
            print("Belum ada data!\n")
        else:
            for i, t in enumerate(daftar, start=1):
                print(f"=== Data ke-{i} ===")
                t.viewToko()
                t.viewProduk()

    elif pilihan == "3":
        if not daftar:
            print("Belum ada data!\n")
        else:
            for i, t in enumerate(daftar, start=0):
                print(f"{i+1}. {t.nama} - {t.namaProduk}")
            idx = int(input("Pilih data: ")) - 1
            if 0 <= idx < len(daftar):
                print("Pilih field yang ingin diedit:")
                print("1. Nama Toko")
                print("2. Pemilik")
                print("3. Alamat")
                print("4. No Izin Usaha")
                print("5. Nama Produk")
                print("6. Merk")
                print("7. No Seri")
                print("8. Deskripsi")
                print("9. Harga")
                print("10. Stok")
                pilihan_edit = input("Pilih: ")

                if pilihan_edit == "1": daftar[idx].nama = input("Nama Toko baru: ")
                elif pilihan_edit == "2": daftar[idx].pemilik = input("Pemilik baru: ")
                elif pilihan_edit == "3": daftar[idx].alamat = input("Alamat baru: ")
                elif pilihan_edit == "4": daftar[idx].noIzinUsaha = input("No Izin baru: ")
                elif pilihan_edit == "5": daftar[idx].namaProduk = input("Nama Produk baru: ")
                elif pilihan_edit == "6": daftar[idx].merk = input("Merk baru: ")
                elif pilihan_edit == "7": daftar[idx].noSeri = input("No Seri baru: ")
                elif pilihan_edit == "8": daftar[idx].deskripsi = input("Deskripsi baru: ")
                elif pilihan_edit == "9": daftar[idx].harga = input("Harga baru: ")
                elif pilihan_edit == "10": daftar[idx].stok = int(input("Stok baru: "))
                else: print("Pilihan tidak valid!")

                print("Data berhasil diperbarui!\n")

    elif pilihan == "4":
        if not daftar:
            print("Belum ada data!\n")
        else:
            for i, t in enumerate(daftar, start=0):
                print(f"{i+1}. {t.nama} - {t.namaProduk}")
            idx = int(input("Pilih data yang ingin dihapus: ")) - 1
            if 0 <= idx < len(daftar):
                daftar.pop(idx)
                print("Data berhasil dihapus!\n")

    elif pilihan == "5":
        if not daftar:
            print("Belum ada data!\n")
        else:
            print("Cari berdasarkan:")
            print("1. Nama Toko")
            print("2. Nama Produk")
            searchPilihan = input("Pilih: ")
            keyword = input("Masukkan kata kunci: ")

            found = False
            for i, t in enumerate(daftar, start=1):
                if (searchPilihan == "1" and keyword.lower() in t.nama.lower()) or \
                   (searchPilihan == "2" and keyword.lower() in t.namaProduk.lower()):
                    print(f"=== Hasil ditemukan di data ke-{i} ===")
                    t.viewToko()
                    t.viewProduk()
                    found = True

            if not found:
                print("Data tidak ditemukan!\n")


    elif pilihan == "0":
        print("Keluar...")
        break
    else:
        print("Pilihan tidak valid!\n")