<?php

namespace App\Models;

class MenuMinuman extends Menu
{
    private string $suhu;

    public function __construct(string $kode, string $nama, float $harga, int $stok, string $suhu = 'Dingin')
    {
        parent::__construct($kode, $nama, $harga, 'Minuman', $stok);
        $this->suhu = $suhu;
    }

    public function getData(): array
    {
        $data = parent::getData();
        $data['suhu'] = $this->suhu;
        return $data;
    }
}