import java.util.ArrayList;
import java.util.Scanner;

class Main {
    public static void main(String[] args) {
        ArrayList<TokoElektronik> daftar = new ArrayList<>();
        Scanner sc = new Scanner(System.in);

        int pilihan;
        do {
            System.out.println("===== MENU =====");
            System.out.println("1. Tambah Produk");
            System.out.println("2. Lihat Produk");
            System.out.println("3. Edit Produk");
            System.out.println("4. Hapus Produk");
            System.out.println("5. Cari Produk");
            System.out.println("0. Keluar");
            System.out.print("Pilih: ");
            pilihan = sc.nextInt();
            sc.nextLine();

            switch (pilihan) {
                case 1: {
                    TokoElektronik t = new TokoElektronik();
                    System.out.print("Nama Produk: "); t.setNamaProduk(sc.nextLine());
                    System.out.print("Merk: "); t.setMerk(sc.nextLine());
                    System.out.print("No Seri: "); t.setNoSeri(sc.nextLine());
                    System.out.print("Deskripsi: "); t.setDeskripsi(sc.nextLine());
                    System.out.print("Harga: "); t.setHarga(sc.nextLine());
                    System.out.print("Stok: "); t.setStok(sc.nextInt());
                    sc.nextLine();
                    daftar.add(t);
                    System.out.println("Produk berhasil ditambahkan!\n");
                    break;
                }

                case 2: {
                    if (daftar.isEmpty()) {
                        System.out.println("Belum ada produk!\n");
                    } else {
                        for (int i = 0; i < daftar.size(); i++) {
                            System.out.println("=== Produk ke-" + (i + 1) + " ===");
                            daftar.get(i).viewProduk();
                        }
                    }
                    break;
                }

                case 3: {
                    if (daftar.isEmpty()) {
                        System.out.println("Belum ada produk!\n");
                    } else {
                        for (int i = 0; i < daftar.size(); i++) {
                            System.out.println((i + 1) + ". " + daftar.get(i).getNamaProduk());
                        }
                        System.out.print("Pilih nomor produk yang ingin diedit: ");
                        int idx = sc.nextInt() - 1;
                        sc.nextLine();
                        if (idx >= 0 && idx < daftar.size()) {
                            TokoElektronik t = daftar.get(idx);
                            System.out.println("1. Nama Produk\n2. Merk\n3. No Seri\n4. Deskripsi\n5. Harga\n6. Stok");
                            System.out.print("Pilih: ");
                            int edit = sc.nextInt();
                            sc.nextLine();
                            switch (edit) {
                                case 1: System.out.println("Nama Lama: " + t.getNamaProduk()); System.out.print("Nama Baru: "); t.setNamaProduk(sc.nextLine()); break;
                                case 2: System.out.println("Merk Lama: " + t.getMerk()); System.out.print("Merk Baru: "); t.setMerk(sc.nextLine()); break;
                                case 3: System.out.println("No Seri Lama: " + t.getNoSeri()); System.out.print("No Seri Baru: "); t.setNoSeri(sc.nextLine()); break;
                                case 4: System.out.println("Deskripsi Lama: " + t.getDeskripsi()); System.out.print("Deskripsi Baru: "); t.setDeskripsi(sc.nextLine()); break;
                                case 5: System.out.println("Harga Lama: " + t.getHarga()); System.out.print("Harga Baru: "); t.setHarga(sc.nextLine()); break;
                                case 6: System.out.println("Stok Lama: " + t.getStok()); System.out.print("Stok Baru: "); t.setStok(sc.nextInt()); sc.nextLine(); break;
                            }
                            System.out.println("Produk berhasil diperbarui!\n");
                        }
                    }
                    break;
                }

                case 4: {
                    if (daftar.isEmpty()) {
                        System.out.println("Belum ada produk!\n");
                    } else {
                        for (int i = 0; i < daftar.size(); i++) {
                            System.out.println((i + 1) + ". " + daftar.get(i).getNamaProduk());
                        }
                        System.out.print("Pilih nomor produk yang ingin dihapus: ");
                        int idx = sc.nextInt() - 1;
                        sc.nextLine();
                        if (idx >= 0 && idx < daftar.size()) {
                            daftar.remove(idx);
                            System.out.println("Produk berhasil dihapus!\n");
                        }
                    }
                    break;
                }

                case 5: {
                    if (daftar.isEmpty()) {
                        System.out.println("Belum ada produk!\n");
                    } else {
                        System.out.print("Masukkan kata kunci nama produk: ");
                        String keyword = sc.nextLine().toLowerCase();

                        boolean found = false;
                        for (int i = 0; i < daftar.size(); i++) {
                            TokoElektronik data = daftar.get(i);
                            if (data.getNamaProduk().toLowerCase().contains(keyword)) {
                                System.out.println("=== Produk ditemukan di data ke-" + (i + 1) + " ===");
                                data.viewProduk();
                                found = true;
                            }
                        }
                        if (!found) {
                            System.out.println("Produk tidak ditemukan!\n");
                        }
                    }
                    break;
                }

                case 0:
                    System.out.println("Keluar...");
                    break;
            }
        } while (pilihan != 0);

        sc.close();
    }
}