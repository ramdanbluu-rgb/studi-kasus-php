@props(['siswa'])
@php
    $nama = is_object($siswa) ? $siswa->nama : $siswa['nama'];
    $nilai = is_object($siswa) ? $siswa->nilai : $siswa['nilai'];
    if (is_object($siswa) && method_exists($siswa, 'cekKelulusan')) {
        $status = $siswa->cekKelulusan();
    } else {
        $status = $nilai >= 75 ? 'Lulus' : 'Tidak Lulus';
    }
    $isLulus = $status === 'Lulus';
@endphp
<div class="border rounded-lg p-4 mb-3 {{ $isLulus ? 'bg-green-50 border-green-200 dark:bg-green-900/20 dark:border-green-800' : 'bg-red-50 border-red-200 dark:bg-red-900/20 dark:border-red-800' }}">
    <h3 class="font-medium text-zinc-800 dark:text-zinc-100">{{ $nama }}</h3>
    <p class="text-sm mt-1"><span class="font-semibold">Nilai:</span> {{ $nilai }}</p>
    <p class="text-sm">
        <span class="font-semibold">Status:</span>
        <span class="font-bold {{ $isLulus ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">{{ $status }}</span>
    </p>
</div>
