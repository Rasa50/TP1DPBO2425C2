class TokoElektronik:
    def __init__(self):
        # Hanya data produk
        self.namaProduk = "-"
        self.merk = "-"
        self.noSeri = "-"
        self.deskripsi = "-"
        self.harga = "-"
        self.stok = 0

    # Getter & Setter Produk
    def setNamaProduk(self, nama):
        self.namaProduk = nama
    def getNamaProduk(self):
        return self.namaProduk

    def setMerk(self, merk):
        self.merk = merk
    def getMerk(self):
        return self.merk

    def setNoSeri(self, noSeri):
        self.noSeri = noSeri
    def getNoSeri(self):
        return self.noSeri

    def setDeskripsi(self, deskripsi):
        self.deskripsi = deskripsi
    def getDeskripsi(self):
        return self.deskripsi

    def setHarga(self, harga):
        self.harga = harga
    def getHarga(self):
        return self.harga

    def setStok(self, stok):
        self.stok = stok
    def getStok(self):
        return self.stok

    # View Produk
    def viewProduk(self):
        print(f"Nama Produk   : {self.namaProduk}")
        print(f"Merk          : {self.merk}")
        print(f"No Seri       : {self.noSeri}")
        print(f"Deskripsi     : {self.deskripsi}")
        print(f"Harga         : Rp {self.harga}")
        print(f"Stok          : {self.stok}")
        print("")
