<?php

namespace App\Services;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Motor;
use Exception;

class KendaraanService
{
    private string $sessionKey = 'daftar_kendaraan_app';

    public function __construct()
    {
        if (!session()->has($this->sessionKey)) {
            $this->resetToInitialData();
        }
    }

    public function resetToInitialData(): void
    {
        $daftarKendaraan = [
            'MBL01' => new Mobil('MBL01', 'Toyota Avanza', 350000, 50000),
            'MBL02' => new Mobil('MBL02', 'Honda CR-V', 600000, 75000),
            'MTR01' => new Motor('MTR01', 'Honda Vario 160', 90000),
            'MTR02' => new Motor('MTR02', 'Yamaha NMAX', 110000),
        ];

        session([$this->sessionKey => $daftarKendaraan]);
    }

    public function getAllKendaraan(): array
    {
        $daftarKendaraan = session($this->sessionKey, []);
        $list = [];

        foreach ($daftarKendaraan as $k) {
            $list[] = $k->getData();
        }

        return $list;
    }

    public function sewaKendaraan(string $kode, int $lamaSewa): array
    {
        $daftar = session($this->sessionKey, []);

        if (!isset($daftar[$kode])) {
            throw new Exception("Kendaraan tidak ditemukan!");
        }

        /** @var Kendaraan $kendaraan */
        $kendaraan = $daftar[$kode];

        // Validasi dan pengubahan status sewa
        $kendaraan->sewa();
        $totalBiaya = $kendaraan->hitungBiaya($lamaSewa);

        session([$this->sessionKey => $daftar]);

        $data = $kendaraan->getData();
        return [
            'merek' => $data['merek'],
            'total_biaya' => $totalBiaya,
            'lama_sewa' => $lamaSewa,
        ];
    }

    public function kembalikanKendaraan(string $kode): string
    {
        $daftar = session($this->sessionKey, []);

        if (!isset($daftar[$kode])) {
            throw new Exception("Kendaraan tidak ditemukan!");
        }

        /** @var Kendaraan $kendaraan */
        $kendaraan = $daftar[$kode];
        $kendaraan->kembalikan();

        session([$this->sessionKey => $daftar]);

        $data = $kendaraan->getData();
        return $data['merek'];
    }
}