<?php
require_once __DIR__ . '/Siswa.php';
class SiswaService {
    public function tampilkanData(): array {
        return [
            ['nama' => 'Galih', 'nis' => '12345', 'nilai' => 85, 'kelas' => 'XII IPA 1'],
            ['nama' => 'Wisky', 'nis' => '67890', 'nilai' => 70, 'kelas' => 'XII IPA 2'],
            ['nama' => 'Wahyu', 'nis' => '54321', 'nilai' => 60, 'kelas' => 'XII IPA 3'],
        ];
    }
}
