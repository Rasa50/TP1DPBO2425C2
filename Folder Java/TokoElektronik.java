class TokoElektronik {
    // Data produk
    private String namaProduk = "-";
    private String merk = "-";
    private String noSeri = "-";
    private String deskripsi = "-";
    private String harga = "-";
    private int stok = 0;

    // --- Getter & Setter ---
    public String getNamaProduk() {
        return namaProduk;
    }

    public void setNamaProduk(String namaProduk) {
        this.namaProduk = namaProduk;
    }

    public String getMerk() {
        return merk;
    }

    public void setMerk(String merk) {
        this.merk = merk;
    }

    public String getNoSeri() {
        return noSeri;
    }

    public void setNoSeri(String noSeri) {
        this.noSeri = noSeri;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }

    public int getStok() {
        return stok;
    }

    public void setStok(int stok) {
        this.stok = stok;
    }

    // --- Method tampil data produk ---
    public void viewProduk() {
        System.out.println("Nama Produk   : " + namaProduk);
        System.out.println("Merk          : " + merk);
        System.out.println("No Seri       : " + noSeri);
        System.out.println("Deskripsi     : " + deskripsi);
        System.out.println("Harga         : Rp " + harga);
        System.out.println("Stok          : " + stok);
        System.out.println();
    }
}
