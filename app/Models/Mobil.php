<?php

namespace App\Models;

class Mobil extends Kendaraan
{
    private float $biayaAsuransi;

    public function __construct(string $kode, string $merek, float $tarifPerHari, float $biayaAsuransi = 50000)
    {
        // Memanggil constructor class induk
        parent::__construct($kode, $merek, $tarifPerHari);
        $this->biayaAsuransi = $biayaAsuransi;
    }

    // Override hitungBiaya: Ditambah biaya asuransi
    public function hitungBiaya(int $lamaSewa): float
    {
        $biayaDasar = parent::hitungBiaya($lamaSewa);
        return $biayaDasar + $this->biayaAsuransi;
    }

    public function getData(): array
    {
        $data = parent::getData();
        $data['jenis'] = 'Mobil';
        $data['biayaAsuransi'] = $this->biayaAsuransi;
        return $data;
    }
}