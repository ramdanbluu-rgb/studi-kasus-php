<?php

namespace App\Services;

class BukuService
{
    private string $sessionKey = 'daftar_buku';

    public function __construct()
    {
        if (!session()->has($this->sessionKey)) {
            session([$this->sessionKey => $this->getInitialData()]);
        }
    }

    private function getInitialData(): array
    {
        return [
            'B001' => ['kode' => 'B001', 'judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'tahunTerbit' => 2005, 'status' => 'Tersedia'],
            'B002' => ['kode' => 'B002', 'judul' => 'Bumi', 'penulis' => 'Tere Liye', 'tahunTerbit' => 2014, 'status' => 'Tersedia'],
            'B003' => ['kode' => 'B003', 'judul' => 'Filosfi Teras', 'penulis' => 'Henry Manampiring', 'tahunTerbit' => 2018, 'status' => 'Tersedia'],
        ];
    }


    public function getAllBuku(): array
    {
        $daftarBuku = session($this->sessionKey, []);
        return compact('daftarBuku');
    }
    public function pinjamBuku(string $kode): array
    {
        $bukuList = session($this->sessionKey);

        if (!isset($bukuList[$kode])) {
            return ['status' => false, 'message' => 'Buku tidak ditemukan!'];
        }

        if ($bukuList[$kode]['status'] === 'Dipinjam') {
            return ['status' => false, 'message' => "Buku '{$bukuList[$kode]['judul']}' sedang dipinjam dan tidak boleh dipinjam kembali."];
        }

        // Ubah status
        $bukuList[$kode]['status'] = 'Dipinjam';
        session([$this->sessionKey => $bukuList]);

        return ['status' => true, 'message' => "Berhasil meminjam buku '{$bukuList[$kode]['judul']}'."];
    }
    public function kembalikanBuku(string $kode): array
    {
        $bukuList = session($this->sessionKey);

        if (!isset($bukuList[$kode])) {
            return ['status' => false, 'message' => 'Buku tidak ditemukan!'];
        }

        if ($bukuList[$kode]['status'] === 'Tersedia') {
            return ['status' => false, 'message' => "Buku '{$bukuList[$kode]['judul']}' belum dipinjam."];
        }
        $bukuList[$kode]['status'] = 'Tersedia';
        session([$this->sessionKey => $bukuList]);

        return ['status' => true, 'message' => "Berhasil mengembalikan buku '{$bukuList[$kode]['judul']}'."];
    }
}