<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\MenuMinuman;
use Exception;

class MenuService
{
    private string $sessionKey = 'daftar_menu_app';

    public function __construct()
    {
        if (!session()->has($this->sessionKey)) {
            $this->resetToInitialData();
        }
    }

    public function resetToInitialData(): void
    {
        $daftarMenu = [
            'M01' => new Menu('M01', 'Nasi Goreng Spesial', 25000, 'Makanan', 10),
            'M02' => new Menu('M02', 'Mie Ayam Bakso', 18000, 'Makanan', 2),
            'D01' => new MenuMinuman('D01', 'Es Teh Manis', 5000, 15, 'Dingin'),
            'D02' => new MenuMinuman('D02', 'Kopi Hitam Hot', 10000, 0, 'Hangat'),
            'D03' => new MenuMinuman('D03', 'Jus Alpukat', 15000, 5, 'Dingin'),
        ];

        session([$this->sessionKey => $daftarMenu]);
    }

    public function getMenuGroupedByKategori(): array
    {
        $daftarMenu = session($this->sessionKey, []);
        $grouped = [];

        foreach ($daftarMenu as $menu) {
            $data = $menu->getData();
            $grouped[$data['kategori']][] = $data;
        }

        return $grouped;
    }

    public function beliMenu(string $kode, int $jumlah): array
    {
        $daftarMenu = session($this->sessionKey, []);

        if (!isset($daftarMenu[$kode])) {
            throw new Exception("Menu tidak ditemukan!");
        }

        /** @var Menu $menu */
        $menu = $daftarMenu[$kode];

        $menu->kurangiStok($jumlah);
        $totalHarga = $menu->hitungTotalHarga($jumlah);

        session([$this->sessionKey => $daftarMenu]);

        $dataMenu = $menu->getData();
        return [
            'nama' => $dataMenu['nama'],
            'total_harga' => $totalHarga,
            'sisa_stok' => $dataMenu['stok'],
        ];
    }
}