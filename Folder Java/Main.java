import java.util.Scanner;
import java.util.ArrayList;

class Main {
    public static void main(String[] args) {
        ArrayList<TokoElektronik> daftar = new ArrayList<>();
        Scanner sc = new Scanner(System.in);

        int pilihan;
        do {
            System.out.println("===== MENU =====");
            System.out.println("1. Tambah Data");
            System.out.println("2. Lihat Data");
            System.out.println("3. Edit Data");
            System.out.println("4. Hapus Data");
            System.out.println("5. Cari Data");
            System.out.println("0. Keluar");
            System.out.print("Pilih: ");
            pilihan = sc.nextInt();
            sc.nextLine();

            switch (pilihan) {
                case 1:
                    TokoElektronik t = new TokoElektronik();
                    System.out.print("Nama Toko: "); t.nama = sc.nextLine();
                    System.out.print("Pemilik: "); t.pemilik = sc.nextLine();
                    System.out.print("Alamat: "); t.alamat = sc.nextLine();
                    System.out.print("No Izin Usaha: "); t.noIzinUsaha = sc.nextLine();
                    System.out.print("Nama Produk: "); t.namaProduk = sc.nextLine();
                    System.out.print("Merk: "); t.merk = sc.nextLine();
                    System.out.print("No Seri: "); t.noSeri = sc.nextLine();
                    System.out.print("Deskripsi: "); t.deskripsi = sc.nextLine();
                    System.out.print("Harga: "); t.harga = sc.nextLine();
                    System.out.print("Stok: "); t.stok = sc.nextInt();
                    daftar.add(t);
                    System.out.println("Data berhasil ditambahkan!");
                    break;

                case 2:
                    if (daftar.isEmpty()) {
                        System.out.println("Belum ada data!");
                    } else {
                        for (int i = 0; i < daftar.size(); i++) {
                            System.out.println("=== Data ke-" + (i+1) + " ===");
                            daftar.get(i).viewToko();
                            daftar.get(i).viewProduk();
                        }
                    }
                    break;

                case 3:
                    if (daftar.isEmpty()) {
                        System.out.println("Belum ada data!");
                    } else {
                        for (int i = 0; i < daftar.size(); i++) {
                            System.out.println("=== Data ke-" + (i+1) + " ===");
                            daftar.get(i).viewToko();
                        }
                        System.out.print("Pilih nomor data yang ingin diedit: ");
                        int idx = sc.nextInt() - 1;
                        sc.nextLine();
                        if (idx >= 0 && idx < daftar.size()) {
                            System.out.println("1. Nama Toko\n2. Pemilik\n3. Alamat\n4. No Izin Usaha");
                            System.out.println("5. Nama Produk\n6. Merk\n7. No Seri\n8. Deskripsi\n9. Harga\n10. Stok");
                            System.out.print("Pilih: ");
                            int edit = sc.nextInt();
                            sc.nextLine();
                            switch (edit) {
                                case 1: System.out.println("Nama Toko Lama: " + daftar.get(idx).nama); System.out.print("Nama Toko baru: "); daftar.get(idx).nama = sc.nextLine(); break;
                                case 2: System.out.println("Pemilik Lama: " + daftar.get(idx).pemilik);System.out.print("Pemilik baru: "); daftar.get(idx).pemilik = sc.nextLine(); break;
                                case 3: System.out.println("Alamat Lama: " + daftar.get(idx).alamat);System.out.print("Alamat baru: "); daftar.get(idx).alamat = sc.nextLine(); break;
                                case 4: System.out.println("No Izin Lama: " + daftar.get(idx).noIzinUsaha);System.out.print("No Izin baru: "); daftar.get(idx).noIzinUsaha = sc.nextLine(); break;
                                case 5: System.out.println("Nama Produk Lama: " + daftar.get(idx).namaProduk);System.out.print("Nama Produk baru: "); daftar.get(idx).namaProduk = sc.nextLine(); break;
                                case 6: System.out.println("Merk Lama: " + daftar.get(idx).merk);System.out.print("Merk baru: "); daftar.get(idx).merk = sc.nextLine(); break;
                                case 7: System.out.println("No Seri Lama: " + daftar.get(idx).noSeri);System.out.print("No Seri baru: "); daftar.get(idx).noSeri = sc.nextLine(); break;
                                case 8: System.out.println("Deskripsi Lama: " + daftar.get(idx).deskripsi);System.out.print("Deskripsi baru: "); daftar.get(idx).deskripsi = sc.nextLine(); break;
                                case 9: System.out.println("Harga Lama: " + daftar.get(idx).harga);System.out.print("Harga baru: "); daftar.get(idx).harga = sc.nextLine(); break;
                                case 10: System.out.println("Stok Lama: " + daftar.get(idx).stok);System.out.print("Stok baru: "); daftar.get(idx).stok = sc.nextInt(); break;
                            }
                            System.out.println("Data berhasil diperbarui!");
                        }
                    }
                    break;

                case 4:
                    if (daftar.isEmpty()) {
                        System.out.println("Belum ada data!");
                    } else {
                        for (int i = 0; i < daftar.size(); i++) {
                            System.out.println("=== Data ke-" + (i+1) + " ===");
                            daftar.get(i).viewToko();
                        }
                        System.out.print("Pilih nomor data yang ingin dihapus: ");
                        int idx = sc.nextInt() - 1;
                        if (idx >= 0 && idx < daftar.size()) {
                            daftar.remove(idx);
                            System.out.println("Data berhasil dihapus!");
                        }
                    }
                    break;

                case 5: {
                    if (daftar.isEmpty()) {
                        System.out.println("Belum ada data!\n");
                    } else {
                        System.out.println("Cari berdasarkan:");
                        System.out.println("1. Nama Toko");
                        System.out.println("2. Nama Produk");
                        System.out.print("Pilih: ");
                        int searchPilihan = sc.nextInt();
                        sc.nextLine(); // buang enter

                        System.out.print("Masukkan kata kunci: ");
                        String keyword = sc.nextLine().toLowerCase();

                        boolean found = false;
                        for (int i = 0; i < daftar.size(); i++) {
                            TokoElektronik data = daftar.get(i); // jangan pakai 't', biar gak bentrok
                            if ((searchPilihan == 1 && data.getNamaToko().toLowerCase().contains(keyword)) ||
                                (searchPilihan == 2 && data.getNamaProduk().toLowerCase().contains(keyword))) {
                                System.out.println("=== Hasil ditemukan di data ke-" + (i + 1) + " ===");
                                data.viewToko();
                                data.viewProduk();
                                found = true;
                            }
                        }

                        if (!found) {
                            System.out.println("Data tidak ditemukan!\n");
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
