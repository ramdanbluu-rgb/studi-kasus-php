<?php

namespace App\Models;

class Motor extends Kendaraan
{
    // Motor tanpa biaya tambahan
    public function getData(): array
    {
        $data = parent::getData();
        $data['jenis'] = 'Motor';
        $data['biayaAsuransi'] = 0;
        return $data;
    }
}