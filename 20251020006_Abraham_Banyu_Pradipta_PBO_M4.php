<?php

class Siswa {
    private string $nama_siswa;
    private string $nis;
    private int $jumlah_tunggakan;

    public function __construct(string $nama_siswa, string $nis, int $jumlah_tunggakan) {
        if (trim($nama_siswa) === "") {
            throw new InvalidArgumentException("Nama siswa tidak boleh kosong.");
        }
        if ($jumlah_tunggakan < 0) {
            throw new InvalidArgumentException("Jumlah tunggakan awal tidak boleh negatif.");
        }
        $this->nama_siswa = $nama_siswa;
        $this->nis = $nis;
        $this->jumlah_tunggakan = $jumlah_tunggakan;
    }

    public function getNamaSiswa(): string {
        return $this->nama_siswa;
    }

    public function getNis(): string {
        return $this->nis;
    }

    public function getJumlahTunggakan(): int {
        return $this->jumlah_tunggakan;
    }

    public function cek_tunggakan(): void {
        echo "Siswa: {$this->nama_siswa} (NIS: {$this->nis})<br>";
        echo "Jumlah Tunggakan: Rp" . number_format($this->jumlah_tunggakan, 0, ',', '.') . "<br>";
    }

    public function bayar_kas(int $nominal): void {
        if ($nominal <= 0) {
            throw new InvalidArgumentException("Nominal pembayaran harus lebih dari Rp0.");
        }

        echo "{$this->nama_siswa} membayar kas sebesar Rp" . number_format($nominal, 0, ',', '.') . "<br>";
        $this->jumlah_tunggakan -= $nominal;

        if ($this->jumlah_tunggakan < 0) {
            $this->jumlah_tunggakan = 0;
        }
    }
}

try {
    echo "<b>=== Pembuatan Objek Normal ===</b><br>";
    $siswa1 = new Siswa("Abraham Banyu Pradipta", "20251020006", 50000);
    $siswa1->cek_tunggakan();
    echo "<br>";

    echo "<b>=== Pembayaran Kas Normal ===</b><br>";
    $siswa1->bayar_kas(30000);
    $siswa1->cek_tunggakan();
    echo "<br>";

    echo "<b>=== Error Validasi Input Constructor ===</b><br>";
    // Skenario Error: Mencoba membuat objek siswa dengan nilai tunggakan negatif
    // Hapus tanda komentar (//) di bawah ini untuk melihat pesan error
    // $siswa2 = new Siswa("Budi Santoso", "20251020007", -10000); 

    echo "<b>=== Error Validasi Method Aksi ===</b><br>";
    // Skenario Error: Mencoba membayar kas dengan nominal Rp0 atau negatif
    // Hapus tanda komentar (//) di bawah ini untuk melihat pesan error
    $siswa1->bayar_kas(0); 

} 
catch (Exception $e) {
    // Menangkap pesan error dari validasi yang gagal sehingga program tidak crash
    echo "<span style='color:red;'><b>ERROR:</b> " . $e->getMessage() . "</span><br>";
}

?>