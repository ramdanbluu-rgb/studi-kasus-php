<?php
class Siswa {
    public string $nama;
    public string $nis;
    public float $nilai;
    public string $kelas;
    public function __construct(string $nama, string $nis, float $nilai, string $kelas) {
        $this->nama = $nama;
        $this->nis = $nis;
        $this->nilai = $nilai;
        $this->kelas = $kelas;
    }
    public function cekKelulusan(): string {
        if ($this->nilai >= 75) return "Selamat, $this->nama dinyatakan LULUS.";
        return "Maaf, $this->nama dinyatakan TIDAK LULUS.";
    }
}
