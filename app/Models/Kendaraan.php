<?php

namespace App\Models;

use Exception;

class Kendaraan
{
    protected string $kode;
    protected string $merek;
    protected float $tarifPerHari;
    protected bool $isSewa;

    public function __construct(string $kode, string $merek, float $tarifPerHari)
    {
        if ($tarifPerHari < 0) {
            throw new Exception("Tarif per hari tidak boleh negatif!");
        }

        $this->kode = $kode;
        $this->merek = $merek;
        $this->tarifPerHari = $tarifPerHari;
        $this->isSewa = false; 
    }

    public function getKode(): string
    {
        return $this->kode;
    }
    public function sewa(): void
    {
        if ($this->isSewa) {
            throw new Exception("Kendaraan {$this->merek} ({$this->kode}) sedang disewa dan tidak boleh disewa lagi!");
        }
        $this->isSewa = true;
    }

    // Method kembalikan kendaraan
    public function kembalikan(): void
    {
        if (!$this->isSewa) {
            throw new Exception("Kendaraan {$this->merek} ({$this->kode}) belum disewa!");
        }
        $this->isSewa = false;
    }

    // Method hitungBiaya dasar (dapat di-override oleh class turunan)
    public function hitungBiaya(int $lamaSewa): float
    {
        if ($lamaSewa <= 0) {
            throw new Exception("Lama sewa minimal 1 hari!");
        }

        return $this->tarifPerHari * $lamaSewa;
    }
    
    public function getStatus(): string
    {
        return $this->isSewa ? 'Disewa' : 'Tersedia';
    }

    public function getData(): array
    {
        $kode = $this->kode;
        $merek = $this->merek;
        $tarifPerHari = $this->tarifPerHari;
        $status = $this->getStatus();

        return compact('kode', 'merek', 'tarifPerHari', 'status');
    }
}