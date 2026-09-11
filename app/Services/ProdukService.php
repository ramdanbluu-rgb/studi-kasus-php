<?php
namespace App\Services;
use App\Models\Produk;
use exception;
Class ProdukService
{
 public function getAllProduk()
 {
    return [
        [
            'id' => 1,
            'nama' => 'Produk A',
            'harga' => 10000,
            'stok' => 50
        ],
        [
            'id' => 2,
            'nama' => 'Produk B',
            'harga' => 20000,
            'stok'  => 30
        ],
        [
            'id' => 3,
            'nama' => 'Produk C',
            'harga' => 30000,
            'stok'  => 20
        ],
        [
            'id' => 4,
            'nama' => 'Produk D',
            'harga' => 40000,
            'stok'  => 10
        ]
    ];
 }

 

}