class Produk:
    def __init__(self, nama="-", merk="-", no_seri="-", deskripsi="-", harga="-", stok=0):
        self.nama = nama
        self.merk = merk
        self.no_seri = no_seri
        self.deskripsi = deskripsi
        self.harga = harga
        self.stok = stok

    def view_produk(self):
        print(f"Nama Produk : {self.nama}")
        print(f"Merk        : {self.merk}")
        print(f"No Seri     : {self.no_seri}")
        print(f"Deskripsi   : {self.deskripsi}")
        print(f"Harga       : Rp {self.harga}")
        print(f"Stok        : {self.stok}\n")


class TokoElektronik:
    def __init__(self, nama="-", pemilik="-", alamat="-", no_izin="-"):
        self.nama = nama
        self.pemilik = pemilik
        self.alamat = alamat
        self.no_izin = no_izin
        self.list_produk = []

    def view_toko(self):
        print(f"Nama Toko      : {self.nama}")
        print(f"Alamat Toko    : {self.alamat}")
        print(f"Pemilik        : {self.pemilik}")
        print(f"No Izin Usaha  : {self.no_izin}\n")

    def tambah_produk(self, produk):
        self.list_produk.append(produk)

    def tampilkan_produk(self):
        if not self.list_produk:
            print("Belum ada produk di toko ini!")
        else:
            for i, p in enumerate(self.list_produk, 1):
                print(f"Produk ke-{i}:")
                p.view_produk()