<?php
class BukuService {
    private array $daftarBuku;
    public function __construct() { $this->daftarBuku = $this->getInitialData(); }
    private function getInitialData(): array {
        return [
            'B001' => ['kode' => 'B001', 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'tahunTerbit' => 2005, 'status' => 'Tersedia'],
            'B002' => ['kode' => 'B002', 'judul' => 'Bumi', 'penulis' => 'Tere Liye', 'tahunTerbit' => 2014, 'status' => 'Tersedia'],
            'B003' => ['kode' => 'B003', 'judul' => 'Filosfi Teras', 'penulis' => 'Henry Manampiring', 'tahunTerbit' => 2018, 'status' => 'Tersedia'],
        ];
    }
    public function getAllBuku(): array { return ['daftarBuku' => $this->daftarBuku]; }
    public function pinjamBuku(string $kode): array {
        if (!isset($this->daftarBuku[$kode])) return ['status' => false, 'message' => 'Buku tidak ditemukan!'];
        if ($this->daftarBuku[$kode]['status'] === 'Dipinjam') return ['status' => false, 'message' => "Buku '{$this->daftarBuku[$kode]['judul']}' sedang dipinjam dan tidak boleh dipinjam kembali."];
        $this->daftarBuku[$kode]['status'] = 'Dipinjam';
        return ['status' => true, 'message' => "Berhasil meminjam buku '{$this->daftarBuku[$kode]['judul']}'."];
    }
    public function kembalikanBuku(string $kode): array {
        if (!isset($this->daftarBuku[$kode])) return ['status' => false, 'message' => 'Buku tidak ditemukan!'];
        if ($this->daftarBuku[$kode]['status'] === 'Tersedia') return ['status' => false, 'message' => "Buku '{$this->daftarBuku[$kode]['judul']}' belum dipinjam."];
        $this->daftarBuku[$kode]['status'] = 'Tersedia';
        return ['status' => true, 'message' => "Berhasil mengembalikan buku '{$this->daftarBuku[$kode]['judul']}'."];
    }
}
