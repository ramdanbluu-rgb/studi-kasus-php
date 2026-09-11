<nav class="border-b border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#161615]">
    <div class="max-w-6xl mx-auto px-4 lg:px-8 flex items-center justify-between h-14">
        <a href="/" class="font-semibold text-sm tracking-tight">Belajar OOP</a>
        <div class="flex items-center gap-1 text-sm">
            <a href="/" class="px-3 py-1.5 rounded-sm {{ request()->is('/') ? 'bg-[#1b1b18] text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A]' : 'hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">Siswa</a>
            <a href="{{ route('buku.index') }}" class="px-3 py-1.5 rounded-sm {{ request()->routeIs('buku.*') ? 'bg-[#1b1b18] text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A]' : 'hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">Buku</a>
            <a href="{{ route('produk.index') }}" class="px-3 py-1.5 rounded-sm {{ request()->routeIs('produk.*') ? 'bg-[#1b1b18] text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A]' : 'hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">Produk</a>
            <a href="{{ route('kendaraan.index') }}" class="px-3 py-1.5 rounded-sm {{ request()->routeIs('kendaraan.*') ? 'bg-[#1b1b18] text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A]' : 'hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">Kendaraan</a>
            <a href="{{ route('menu.index') }}" class="px-3 py-1.5 rounded-sm {{ request()->routeIs('menu.*') ? 'bg-[#1b1b18] text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A]' : 'hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">Menu</a>
        </div>
    </div>
</nav>
