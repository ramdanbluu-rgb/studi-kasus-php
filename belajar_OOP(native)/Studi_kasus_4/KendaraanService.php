<?php
require_once __DIR__ . '/Kendaraan.php';
class KendaraanService {
    private array $daftarKendaraan;
    public function __construct() { $this->resetToInitialData(); }
    public function resetToInitialData(): void {
        $this->daftarKendaraan = [
            'MBL01' => new Mobil('MBL01','Toyota Avanza',350000,50000),
            'MBL02' => new Mobil('MBL02','Honda CR-V',600000,75000),
            'MTR01' => new Motor('MTR01','Honda Vario 160',90000),
            'MTR02' => new Motor('MTR02','Yamaha NMAX',110000),
        ];
    }
    public function getAllKendaraan(): array { $l = []; foreach ($this->daftarKendaraan as $k) $l[] = $k->getData(); return $l; }
    public function sewaKendaraan(string $kode, int $lama): array {
        if (!isset($this->daftarKendaraan[$kode])) throw new Exception("Kendaraan tidak ditemukan!");
        $k = $this->daftarKendaraan[$kode]; $k->sewa(); $t = $k->hitungBiaya($lama); $d = $k->getData();
        return ['merek' => $d['merek'], 'total_biaya' => $t, 'lama_sewa' => $lama];
    }
    public function kembalikanKendaraan(string $kode): string {
        if (!isset($this->daftarKendaraan[$kode])) throw new Exception("Kendaraan tidak ditemukan!");
        $k = $this->daftarKendaraan[$kode]; $k->kembalikan(); return $k->getData()['merek'];
    }
}
