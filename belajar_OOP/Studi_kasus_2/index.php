<?php
require_once __DIR__ . '/BukuService.php';
$s = new BukuService();
function cetak($buku) { foreach ($buku['daftarBuku'] as $b) echo "{$b['kode']} | {$b['judul']} | {$b['penulis']} ({$b['tahunTerbit']}) | {$b['status']}\n"; }
echo "=== SISTEM PERPUSTAKAAN ===\n"; cetak($s->getAllBuku());
echo "\n[Pinjam B001] " . $s->pinjamBuku('B001')['message'] . "\n";
echo "[Pinjam B001 lagi] " . $s->pinjamBuku('B001')['message'] . "\n";
echo "[Kembalikan B001] " . $s->kembalikanBuku('B001')['message'] . "\n";
echo "[Kembalikan B001 lagi] " . $s->kembalikanBuku('B001')['message'] . "\n";
echo "\n=== Data Akhir ===\n"; cetak($s->getAllBuku());
