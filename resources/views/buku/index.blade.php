@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')
<h2 class="text-xl font-semibold mb-4">Daftar Buku</h2>
@if(session('success'))
    <div class="bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-200 px-4 py-3 rounded mb-4 text-sm">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 px-4 py-3 rounded mb-4 text-sm">{{ session('error') }}</div>
@endif
<div class="bg-white dark:bg-[#161615] rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-zinc-50 dark:bg-zinc-800 text-left">
                <th class="px-4 py-3 font-medium">Kode</th>
                <th class="px-4 py-3 font-medium">Judul</th>
                <th class="px-4 py-3 font-medium">Penulis</th>
                <th class="px-4 py-3 font-medium">Tahun Terbit</th>
                <th class="px-4 py-3 font-medium">Status</th>
                <th class="px-4 py-3 font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
            @foreach ($daftarBuku as $buku)
                <tr>
                    <td class="px-4 py-3">{{ $buku['kode'] }}</td>
                    <td class="px-4 py-3">{{ $buku['judul'] }}</td>
                    <td class="px-4 py-3">{{ $buku['penulis'] }}</td>
                    <td class="px-4 py-3">{{ $buku['tahunTerbit'] }}</td>
                    <td class="px-4 py-3 font-semibold">{{ $buku['status'] }}</td>
                    <td class="px-4 py-3">
                        @if ($buku['status'] === 'Tersedia')
                            <form action="{{ route('buku.pinjam', $buku['kode']) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1.5 bg-[#1b1b18] text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A] rounded-sm text-xs">Pinjam</button>
                            </form>
                        @else
                            <form action="{{ route('buku.kembalikan', $buku['kode']) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1.5 border border-zinc-200 dark:border-zinc-700 rounded-sm text-xs">Kembalikan</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
