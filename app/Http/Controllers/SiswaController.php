<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Services\SiswaService;

class SiswaController extends Controller
{ 
    protected SiswaService $siswaService;
    public function __construct(SiswaService $siswaService)
    {
        $this->siswaService = $siswaService;
    }

    public function index()
    {
        $daftarSiswa = $this->siswaService->tampilkanData();
        return view('siswa.index', compact('daftarSiswa'));
    }
}
