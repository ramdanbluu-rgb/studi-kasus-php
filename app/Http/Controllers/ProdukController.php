<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProdukService;
use App\Models\Produk;
class ProdukController extends Controller
{
    private ProdukService $produkService;

    public function __construct(ProdukService $produkService)
    {
        $this->produkService = $produkService;
    }

    public function index()
    {
        $daftarProduk = $this->produkService->getAllProduk();
        return view('produk.index', compact('daftarProduk'));
    }
}
