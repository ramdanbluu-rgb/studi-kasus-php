<?php
require_once __DIR__ . '/MenuService.php';
$s = new MenuService();
echo "=== SISTEM KASIR KANTIN ===\n";
foreach ($s->getMenuGroupedByKategori() as $kat => $items) {
    echo "[$kat]\n"; foreach ($items as $m) echo "  {$m['kode']} | {$m['nama']} | Rp ".number_format($m['harga'],0,',','.') . " | Stok: {$m['stok']} | {$m['status']}" . (isset($m['suhu'])?" | {$m['suhu']}":"") . "\n";
}
foreach ([['M01',2],['D02',1],['M02',5]] as [$kode,$jml]) {
    try { $r = $s->beliMenu($kode,$jml); echo "\n[Beli $kode x$jml] Berhasil {$r['nama']} Total: Rp ".number_format($r['total_harga'],0,',','.') . " Sisa: {$r['sisa_stok']}\n"; }
    catch (Exception $e) { echo "\n[Beli $kode x$jml] Gagal: {$e->getMessage()}\n"; }
}
