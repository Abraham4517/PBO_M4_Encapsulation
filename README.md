# Encapsulation
Studi Kasus : Sistem Pengelolaan Uang Kas Kelas 

## Penjelasan 
Pencatatan pembayaran uang kas mingguan oleh bendahara kelas saat ini masih menggunakan buku tulis manual, yang menyebabkan pelacakan tunggakan siswa menjadi lambat, rentan terhadap kesalahan perhitungan saldo, berisiko kehilangan data jika buku rusak, serta kurangnya transparansi laporan keuangan bagi anggota kelas. Tujuan pembuatan sistem pengelolaan uang kas untuk mendigitalisasi pengelolaan uang kas sehingga pencatatan transaksi masuk dan keluar menjadi lebih akurat, aman, dan seluruh siswa dapat memantau transparansi dana secara real-time.

[Previous Code](https://github.com/Abraham4517/PBO_M3_PHPOOPFundamental )

## Requirements
Untuk menjalankan aplikasi sederhana ini, pastikan komputer/laptop Anda telah terinstal perangkat lunak berikut:
1.  **XAMPP:** Sebagai *local web server* dan menyediakan *environment* PHP (PHP 8.x direkomendasikan).
2.  **Visual Studio Code (VS Code):** Sebagai *code editor* untuk menulis dan menjalankan kode.

## Penjelasan 2
Pada kodingan refactoring berdasarkan di atas, property $nama_siswa, $nis, dan $jumlah_tunggakan diubah akses nya yang dari public menjadi private untuk mengamankan data. 
Data yang sudah dikunci harus membuat "pintu khusus" untuk mengakses isinya, ditambahkan method getter (getNamaSiswa()) untuk membaca data tanpa menggunakan kode luar. 
Menambahkan aturan pengecekan (validasi) saat data siswa pertama kali dimasukkan (__construct) dan saat siswa melakukan pembayaran (bayar_kas()). Jadi, segala bentuk perubahan pada sisa tunggakan kas sekarang wajib melewati aturan di dalam fungsi bayar_kas() tersebut. 
Perubahan tersebut memiliki alasan utama, yaitu untuk keamanan data agar tidak rusak atau berantakan. Coba bayangkan ketika property dibuat akses public, pihak luar bisa saja memasukkan data yang tidak masuk akal, seperti mengetik nominal tunggakan menjadi minus ($siswa1->jumlah_tunggakan = -50000) atau memasukkan nama kosong. 
Dengan menetapkan batasan (validasi) dan menyembunyikan property (private), class Siswa sekarang dapat bertanggung jawab menjaga konsistensi dirinya sendiri, menolak input yang salah secara eksplisit melalui Exception, dan menjamin alur pencatatan kas menjadi lebih terkendali.
