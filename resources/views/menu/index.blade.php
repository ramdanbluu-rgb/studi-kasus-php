@extends('layouts.app')
@section('title', 'Daftar Menu Restoran')
@section('content')
<h2 class="text-xl font-semibold mb-4">Daftar Menu Restoran</h2>
<form action="{{ route('menu.reset') }}" method="POST" class="mb-4">
    @csrf
    <button type="submit" class="px-4 py-2 bg-zinc-600 text-white rounded-sm text-sm">Reset Data Menu</button>
</form>
@if(session('success'))
    <div class="bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-200 px-4 py-3 rounded mb-4 text-sm">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 px-4 py-3 rounded mb-4 text-sm">{{ session('error') }}</div>
@endif
@foreach ($menuPerKategori as $kategori => $items)
    <h3 class="font-medium mt-6 mb-3">Kategori: {{ $kategori }}</h3>
    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] overflow-hidden mb-6">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-zinc-50 dark:bg-zinc-800 text-left">
                    <th class="px-4 py-3 font-medium">Kode</th>
                    <th class="px-4 py-3 font-medium">Nama Menu</th>
                    <th class="px-4 py-3 font-medium">Harga</th>
                    <th class="px-4 py-3 font-medium">Stok</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium">Aksi Beli</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
                @foreach ($items as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $item['kode'] }}</td>
                        <td class="px-4 py-3">{{ $item['nama'] }} @if(isset($item['suhu'])) ({{ $item['suhu'] }}) @endif</td>
                        <td class="px-4 py-3">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $item['stok'] }}</td>
                        <td class="px-4 py-3">
                            @if($item['status'] === 'Tersedia')
                                <span class="text-green-600 dark:text-green-400 font-semibold">Tersedia</span>
                            @else
                                <span class="text-red-600 dark:text-red-400 font-semibold">Habis</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('menu.beli', $item['kode']) }}" method="POST" class="flex gap-2">
                                @csrf
                                <input type="number" name="jumlah" value="1" min="1" class="w-16 border border-zinc-200 dark:border-zinc-700 rounded px-2 py-1 bg-white dark:bg-zinc-800">
                                <button type="submit" {{ $item['status'] === 'Habis' ? 'disabled' : '' }} class="px-3 py-1.5 bg-[#1b1b18] text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A] rounded-sm text-xs disabled:opacity-50">Beli</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endforeach
@endsection
