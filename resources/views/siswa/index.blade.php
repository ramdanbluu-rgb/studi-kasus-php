@extends('layouts.app')
@section('title', 'Daftar Siswa')
@section('content')
<h2 class="text-xl font-semibold mb-6">Data Kelulusan Siswa</h2>
<div class="max-w-2xl">
    @foreach ($daftarSiswa as $siswa)
        <x-card-siswa :siswa="$siswa" />
    @endforeach
</div>
@endsection
