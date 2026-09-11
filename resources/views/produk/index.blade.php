@extends('layouts.app')
@section('title', 'Daftar Produk')
@section('content')
<h1 class="text-xl font-semibold mb-6">Daftar Produk</h1>
<div class="bg-white dark:bg-[#161615] rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-zinc-50 dark:bg-zinc-800 text-left">
                <th class="px-4 py-3 font-medium">No</th>
                <th class="px-4 py-3 font-medium">Nama Produk</th>
                <th class="px-4 py-3 font-medium">Harga</th>
                <th class="px-4 py-3 font-medium">Stok</th>
                <th class="px-4 py-3 font-medium">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
            @foreach($daftarProduk as $index => $produk)
                <tr>
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ $produk['nama'] }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</td>
                    <td class="px-4 py-3">{{ $produk['stok'] }}</td>
                    <td class="px-4 py-3">
                        @if($produk['stok'] > 0)
                            <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100">Tersedia</span>
                        @else
                            <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-100">Habis</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
