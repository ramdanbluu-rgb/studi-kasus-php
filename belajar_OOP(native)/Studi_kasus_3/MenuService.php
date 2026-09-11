<?php
require_once __DIR__ . '/Menu.php';
class MenuService {
    private array $daftarMenu;
    public function __construct() { $this->resetToInitialData(); }
    public function resetToInitialData(): void {
        $this->daftarMenu = [
            'M01' => new Menu('M01','Nasi Goreng Spesial',25000,'Makanan',10),
            'M02' => new Menu('M02','Mie Ayam Bakso',18000,'Makanan',2),
            'D01' => new MenuMinuman('D01','Es Teh Manis',5000,15,'Dingin'),
            'D02' => new MenuMinuman('D02','Kopi Hitam Hot',10000,0,'Hangat'),
            'D03' => new MenuMinuman('D03','Jus Alpukat',15000,5,'Dingin'),
        ];
    }
    public function getMenuGroupedByKategori(): array {
        $g = []; foreach ($this->daftarMenu as $m) { $d = $m->getData(); $g[$d['kategori']][] = $d; } return $g;
    }
    public function beliMenu(string $kode, int $j): array {
        if (!isset($this->daftarMenu[$kode])) throw new Exception("Menu tidak ditemukan!");
        $m = $this->daftarMenu[$kode]; $m->kurangiStok($j); $t = $m->hitungTotalHarga($j); $d = $m->getData();
        return ['nama' => $d['nama'], 'total_harga' => $t, 'sisa_stok' => $d['stok']];
    }
}
