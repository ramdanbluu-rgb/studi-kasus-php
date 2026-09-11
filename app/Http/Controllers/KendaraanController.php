<?php

namespace App\Http\Controllers;

use App\Services\KendaraanService;
use Illuminate\Http\Request;
use Exception;

class KendaraanController extends Controller
{
    protected KendaraanService $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function index()
    {
        $daftarKendaraan = $this->kendaraanService->getAllKendaraan();
        return view('kendaraan.index', compact('daftarKendaraan'));
    }

    public function sewa(Request $request, string $kode)
    {
        $lamaSewa = (int) $request->input('lama_sewa', 1);

        try {
            $res = $this->kendaraanService->sewaKendaraan($kode, $lamaSewa);
            return redirect()->back()->with('success', "Berhasil menyewa {$res['merek']} selama {$res['lama_sewa']} hari. Total Biaya: Rp " . number_format($res['total_biaya'], 0, ',', '.'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function kembalikan(string $kode)
    {
        try {
            $merek = $this->kendaraanService->kembalikanKendaraan($kode);
            return redirect()->back()->with('success', "Berhasil mengembalikan kendaraan {$merek}.");
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function reset()
    {
        $this->kendaraanService->resetToInitialData();
        return redirect()->back()->with('success', 'Data rental berhasil di-reset.');
    }
}