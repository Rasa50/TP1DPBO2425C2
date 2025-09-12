import java.util.Scanner;
import java.util.ArrayList;

class Main {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        ArrayList<TokoElektronik> daftarToko = new ArrayList<>();

        while (true) {
            System.out.println("========== MENU ==========");
            System.out.println("1. Tambah Toko");
            System.out.println("2. Tambah Produk");
            System.out.println("3. Lihat Toko/Produk");
            System.out.println("4. Edit Toko");
            System.out.println("5. Edit Produk");
            System.out.println("6. Hapus Toko");
            System.out.println("7. Hapus Produk");
            System.out.println("0. Keluar");
            System.out.print("Pilih: ");
            int pilihan = Integer.parseInt(sc.nextLine());

            if (pilihan == 0) {
                System.out.println("Keluar...");
                break;
            }
            else if (pilihan == 1) {
                System.out.print("Nama Toko: "); String nama = sc.nextLine();
                System.out.print("Pemilik: "); String pemilik = sc.nextLine();
                System.out.print("Alamat: "); String alamat = sc.nextLine();
                System.out.print("No Izin: "); String izin = sc.nextLine();
                daftarToko.add(new TokoElektronik(nama,pemilik,alamat,izin));
                System.out.println("Toko ditambahkan!\n");
            }
            else if (pilihan == 2) {
                if (daftarToko.isEmpty()) { System.out.println("Belum ada toko!\n"); continue; }
                for (int i=0;i<daftarToko.size();i++) System.out.println((i+1)+". "+daftarToko.get(i).nama);
                System.out.print("Pilih toko: "); int idx=Integer.parseInt(sc.nextLine())-1;
                System.out.print("Nama Produk: "); String n=sc.nextLine();
                System.out.print("Merk: "); String m=sc.nextLine();
                System.out.print("No Seri: "); String no=sc.nextLine();
                System.out.print("Deskripsi: "); String d=sc.nextLine();
                System.out.print("Harga: "); String h=sc.nextLine();
                System.out.print("Stok: "); int s=Integer.parseInt(sc.nextLine());
                daftarToko.get(idx).tambahProduk(new Produk(n,m,no,d,h,s));
                System.out.println("Produk ditambahkan!\n");
            }
            else if (pilihan == 3) {
                if (daftarToko.isEmpty()) { System.out.println("Belum ada toko!\n"); continue; }
                for (int i=0;i<daftarToko.size();i++) System.out.println((i+1)+". "+daftarToko.get(i).nama);
                System.out.print("Pilih toko: "); int idx=Integer.parseInt(sc.nextLine())-1;
                daftarToko.get(idx).viewToko();
                daftarToko.get(idx).tampilkanProduk();
            }
            else if (pilihan == 4) {
                if (daftarToko.isEmpty()) { System.out.println("Belum ada toko!\n"); continue; }
                for (int i=0;i<daftarToko.size();i++) System.out.println((i+1)+". "+daftarToko.get(i).nama);
                System.out.print("Pilih toko: "); int idx=Integer.parseInt(sc.nextLine())-1;
                System.out.print("Edit [nama/pemilik/alamat/izin]: "); String f=sc.nextLine();
                System.out.print("Nilai baru: "); String v=sc.nextLine();
                if (f.equals("nama")) daftarToko.get(idx).nama=v;
                else if (f.equals("pemilik")) daftarToko.get(idx).pemilik=v;
                else if (f.equals("alamat")) daftarToko.get(idx).alamat=v;
                else if (f.equals("izin")) daftarToko.get(idx).noIzin=v;
                System.out.println("Toko diperbarui!\n");
            }
            else if (pilihan == 5) {
                if (daftarToko.isEmpty()) { System.out.println("Belum ada toko!\n"); continue; }
                for (int i=0;i<daftarToko.size();i++) System.out.println((i+1)+". "+daftarToko.get(i).nama);
                System.out.print("Pilih toko: "); int idx=Integer.parseInt(sc.nextLine())-1;
                daftarToko.get(idx).tampilkanProduk();
                System.out.print("Pilih produk: "); int pidx=Integer.parseInt(sc.nextLine())-1;
                System.out.print("Edit [nama/merk/noSeri/deskripsi/harga/stok]: "); String f=sc.nextLine();
                System.out.print("Nilai baru: "); String v=sc.nextLine();
                Produk p=daftarToko.get(idx).listProduk.get(pidx);
                if (f.equals("nama")) p.nama=v;
                else if (f.equals("merk")) p.merk=v;
                else if (f.equals("noSeri")) p.noSeri=v;
                else if (f.equals("deskripsi")) p.deskripsi=v;
                else if (f.equals("harga")) p.harga=v;
                else if (f.equals("stok")) p.stok=Integer.parseInt(v);
                System.out.println("Produk diperbarui!\n");
            }
            else if (pilihan == 6) {
                if (daftarToko.isEmpty()) { System.out.println("Belum ada toko!\n"); continue; }
                for (int i=0;i<daftarToko.size();i++) System.out.println((i+1)+". "+daftarToko.get(i).nama);
                System.out.print("Pilih toko: "); int idx=Integer.parseInt(sc.nextLine())-1;
                daftarToko.remove(idx);
                System.out.println("Toko dihapus!\n");
            }
            else if (pilihan == 7) {
                if (daftarToko.isEmpty()) { System.out.println("Belum ada toko!\n"); continue; }
                for (int i=0;i<daftarToko.size();i++) System.out.println((i+1)+". "+daftarToko.get(i).nama);
                System.out.print("Pilih toko: "); int idx=Integer.parseInt(sc.nextLine())-1;
                daftarToko.get(idx).tampilkanProduk();
                System.out.print("Pilih produk: "); int pidx=Integer.parseInt(sc.nextLine())-1;
                daftarToko.get(idx).listProduk.remove(pidx);
                System.out.println("Produk dihapus!\n");
            }
        }
        sc.close();
    }
}