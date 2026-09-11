<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nama', 'nis', 'nilai', 'kelas'];
    
   public function __construct(string $nama, string $nis, float $nilai, string $kelas)
    {
        $this->nama = $nama;
        $this->nis = $nis;
        $this->nilai = $nilai;
        $this->kelas = $kelas;
    }
  

        public function cekKelulusan()
    {
        if ($this->nilai >= 75) {
            return "Selamat, $this->nama dinyatakan LULUS.";
        } else {
            return "Maaf, $this->nama dinyatakan TIDAK LULUS.";
        }
    }
}
