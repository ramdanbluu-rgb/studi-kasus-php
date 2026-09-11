<?php

namespace App\Models;

use Exception;

class Menu
{
    private string $kode;
    protected string $nama;
    protected float $harga;
    protected string $kategori;
    protected int $stok;

    public function __construct(string $kode, string $nama, float $harga, string $kategori, int $stok)
    {
        if ($harga < 0 || $stok < 0) {
            throw new Exception("Harga dan stok tidak boleh negatif!");
        }

        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
        $this->stok = $stok;
    }

    public function kurangiStok(int $jumlah): void
    {
        if ($this->stok === 0) {
            throw new Exception("Menu {$this->nama} berstatus Habis!");
        }
        if ($jumlah > $this->stok) {
            throw new Exception("Pesanan melebihi stok yang tersedia!");
        }
        $this->stok -= $jumlah;
    }

    public function hitungTotalHarga(int $jumlah): float
    {
        return $this->harga * $jumlah;
    }

    public function getData(): array
    {
        $kode = $this->kode;
        $nama = $this->nama;
        $harga = $this->harga;
        $kategori = $this->kategori;
        $stok = $this->stok;
        $status = ($this->stok > 0) ? 'Tersedia' : 'Habis';

        return compact('kode', 'nama', 'harga', 'kategori', 'stok', 'status');
    }
}