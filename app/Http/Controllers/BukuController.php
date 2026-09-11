<?php

namespace App\Http\Controllers;

use App\Services\BukuService;

class BukuController extends Controller
{
    protected BukuService $bukuService;

    // Inject Service Layer
    public function __construct(BukuService $bukuService)
    {
        $this->bukuService = $bukuService;
    }

    public function index()
    {

        $data = $this->bukuService->getAllBuku(); 
        return view('buku.index', $data);
    }

    public function pinjam(string $kode)
    {
        $result = $this->bukuService->pinjamBuku($kode);

        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->with('error', $result['message']);
    }

    public function kembalikan(string $kode)
    {
        $result = $this->bukuService->kembalikanBuku($kode);

        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->with('error', $result['message']);
    }
}