<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use Illuminate\Http\Request;
use Exception;

class MenuController extends Controller
{
    protected MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menuPerKategori = $this->menuService->getMenuGroupedByKategori();
        return view('menu.index', compact('menuPerKategori'));
    }

    public function beli(Request $request, string $kode)
    {
        $jumlah = (int) $request->input('jumlah', 1);

        try {
            $result = $this->menuService->beliMenu($kode, $jumlah);
            return redirect()->back()->with('success', "Berhasil membeli {$jumlah}x {$result['nama']}. Total: Rp " . number_format($result['total_harga'], 0, ',', '.'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function reset()
    {
        $this->menuService->resetToInitialData();
        return redirect()->back()->with('success', 'Data menu berhasil di-reset ke kondisi awal.');
    }
}