<?php
require_once __DIR__ . '/SiswaService.php';
$service = new SiswaService();
$daftarSiswa = $service->tampilkanData();
echo "=== SISTEM DATA SISWA ===\n";
foreach ($daftarSiswa as $d) {
    $s = new Siswa($d['nama'], $d['nis'], $d['nilai'], $d['kelas']);
    echo "Nama: {$s->nama} | NIS: {$s->nis} | Kelas: {$s->kelas} | Nilai: {$s->nilai} | {$s->cekKelulusan()}\n";
}
