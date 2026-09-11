<?php
require_once __DIR__ . '/KendaraanService.php';
$s = new KendaraanService();
echo "=== SISTEM PENYEWAAN KENDARAAN ===\n";
foreach ($s->getAllKendaraan() as $k) echo "{$k['kode']} | {$k['jenis']} | {$k['merek']} | Rp ".number_format($k['tarifPerHari'],0,',','.') . "/hari" . ($k['biayaAsuransi']?" + Asuransi ".number_format($k['biayaAsuransi'],0,',','.'):"") . " | {$k['status']}\n";
try { $r = $s->sewaKendaraan('MBL01',3); echo "\n[Sewa MBL01 3 hari] {$r['merek']} Total: Rp ".number_format($r['total_biaya'],0,',','.') . "\n"; } catch (Exception $e) { echo "\n[Sewa MBL01] {$e->getMessage()}\n"; }
try { $r = $s->sewaKendaraan('MBL01',2); echo "[Sewa MBL01 lagi] {$r['merek']} Total: Rp ".number_format($r['total_biaya'],0,',','.') . "\n"; } catch (Exception $e) { echo "[Sewa MBL01 lagi] {$e->getMessage()}\n"; }
try { $m = $s->kembalikanKendaraan('MBL01'); echo "[Kembalikan MBL01] Berhasil $m\n"; } catch (Exception $e) { echo "[Kembalikan MBL01] {$e->getMessage()}\n"; }
try { $r = $s->sewaKendaraan('MTR01',2); echo "[Sewa MTR01 2 hari] {$r['merek']} Total: Rp ".number_format($r['total_biaya'],0,',','.') . "\n"; } catch (Exception $e) { echo "[Sewa MTR01] {$e->getMessage()}\n"; }
echo "\n=== Status Akhir ===\n";
foreach ($s->getAllKendaraan() as $k) echo "{$k['kode']} | {$k['merek']} | {$k['status']}\n";
