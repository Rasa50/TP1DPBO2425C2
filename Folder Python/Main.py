from TokoElektronik import TokoElektronik

# ===== Program utama =====
daftar = []
while True:
    print("===== MENU =====")
    print("1. Tambah Data Produk")
    print("2. Lihat Data Produk")
    print("3. Edit Data Produk")
    print("4. Hapus Data Produk")
    print("5. Cari Data Produk")
    print("0. Keluar")
    pilihan = input("Pilih: ")

    if pilihan == "1":
        t = TokoElektronik()
        t.namaProduk = input("Nama Produk: ")
        t.merk = input("Merk: ")
        t.noSeri = input("No Seri: ")
        t.deskripsi = input("Deskripsi: ")
        t.harga = input("Harga: ")
        t.stok = int(input("Stok: "))
        daftar.append(t)
        print("Produk berhasil ditambahkan!\n")

    elif pilihan == "2":
        if not daftar:
            print("Belum ada produk!\n")
        else:
            for i, t in enumerate(daftar, start=1):
                print(f"=== Produk ke-{i} ===")
                t.viewProduk()

    elif pilihan == "3":
        if not daftar:
            print("Belum ada produk!\n")
        else:
            for i, t in enumerate(daftar, start=0):
                print(f"{i+1}. {t.namaProduk}")
            idx = int(input("Pilih produk: ")) - 1
            if 0 <= idx < len(daftar):
                print("Pilih field yang ingin diedit:")
                print("1. Nama Produk")
                print("2. Merk")
                print("3. No Seri")
                print("4. Deskripsi")
                print("5. Harga")
                print("6. Stok")
                pilihan_edit = input("Pilih: ")

                if pilihan_edit == "1": daftar[idx].namaProduk = input("Nama Produk baru: ")
                elif pilihan_edit == "2": daftar[idx].merk = input("Merk baru: ")
                elif pilihan_edit == "3": daftar[idx].noSeri = input("No Seri baru: ")
                elif pilihan_edit == "4": daftar[idx].deskripsi = input("Deskripsi baru: ")
                elif pilihan_edit == "5": daftar[idx].harga = input("Harga baru: ")
                elif pilihan_edit == "6": daftar[idx].stok = int(input("Stok baru: "))
                else: print("Pilihan tidak valid!")

                print("Produk berhasil diperbarui!\n")

    elif pilihan == "4":
        if not daftar:
            print("Belum ada produk!\n")
        else:
            for i, t in enumerate(daftar, start=0):
                print(f"{i+1}. {t.namaProduk}")
            idx = int(input("Pilih produk yang ingin dihapus: ")) - 1
            if 0 <= idx < len(daftar):
                daftar.pop(idx)
                print("Produk berhasil dihapus!\n")

    elif pilihan == "5":
        if not daftar:
            print("Belum ada produk!\n")
        else:
            keyword = input("Masukkan kata kunci nama produk: ")
            found = False
            for i, t in enumerate(daftar, start=1):
                if keyword.lower() in t.namaProduk.lower():
                    print(f"=== Hasil ditemukan di produk ke-{i} ===")
                    t.viewProduk()
                    found = True

            if not found:
                print("Produk tidak ditemukan!\n")

    elif pilihan == "0":
        print("Keluar...")
        break
    else:
        print("Pilihan tidak valid!\n")