<?php
class Kendaraan {
    protected string $kode; protected string $merek; protected float $tarifPerHari; protected bool $isSewa;
    public function __construct(string $k, string $m, float $t) {
        if ($t < 0) throw new Exception("Tarif per hari tidak boleh negatif!");
        $this->kode = $k; $this->merek = $m; $this->tarifPerHari = $t; $this->isSewa = false;
    }
    public function getKode(): string { return $this->kode; }
    public function sewa(): void { if ($this->isSewa) throw new Exception("Kendaraan {$this->merek} ({$this->kode}) sedang disewa dan tidak boleh disewa lagi!"); $this->isSewa = true; }
    public function kembalikan(): void { if (!$this->isSewa) throw new Exception("Kendaraan {$this->merek} ({$this->kode}) belum disewa!"); $this->isSewa = false; }
    public function hitungBiaya(int $l): float { if ($l <= 0) throw new Exception("Lama sewa minimal 1 hari!"); return $this->tarifPerHari * $l; }
    public function getStatus(): string { return $this->isSewa ? 'Disewa' : 'Tersedia'; }
    public function getData(): array { $kode = $this->kode; $merek = $this->merek; $tarifPerHari = $this->tarifPerHari; $status = $this->getStatus(); return compact('kode','merek','tarifPerHari','status'); }
}
class Mobil extends Kendaraan {
    private float $biayaAsuransi;
    public function __construct(string $k, string $m, float $t, float $b = 50000) { parent::__construct($k,$m,$t); $this->biayaAsuransi = $b; }
    public function hitungBiaya(int $l): float { return parent::hitungBiaya($l) + $this->biayaAsuransi; }
    public function getData(): array { $d = parent::getData(); $d['jenis'] = 'Mobil'; $d['biayaAsuransi'] = $this->biayaAsuransi; return $d; }
}
class Motor extends Kendaraan {
    public function getData(): array { $d = parent::getData(); $d['jenis'] = 'Motor'; $d['biayaAsuransi'] = 0; return $d; }
}
