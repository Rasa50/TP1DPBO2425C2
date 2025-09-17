class TokoElektronik:
    def __init__(self):
        # Data toko
        self.nama = "-"
        self.pemilik = "-"
        self.alamat = "-"
        self.noIzinUsaha = "-"
        # Data produk
        self.namaProduk = "-"
        self.merk = "-"
        self.noSeri = "-"
        self.deskripsi = "-"
        self.harga = "-"
        self.stok = 0

    def viewToko(self):
        print(f"Nama Toko     : {self.nama}")
        print(f"Pemilik       : {self.pemilik}")
        print(f"Alamat        : {self.alamat}")
        print(f"No Izin Usaha : {self.noIzinUsaha}")

    def viewProduk(self):
        print(f"Nama Produk   : {self.namaProduk}")
        print(f"Merk          : {self.merk}")
        print(f"No Seri       : {self.noSeri}")
        print(f"Deskripsi     : {self.deskripsi}")
        print(f"Harga         : Rp {self.harga}")
        print(f"Stok          : {self.stok}")
        print("")