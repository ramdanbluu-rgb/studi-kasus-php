<?php
class Menu {
    private string $kode;
    protected string $nama;
    protected float $harga;
    protected string $kategori;
    protected int $stok;
    public function __construct(string $kode, string $nama, float $harga, string $kategori, int $stok) {
        if ($harga < 0 || $stok < 0) throw new Exception("Harga dan stok tidak boleh negatif!");
        $this->kode = $kode; $this->nama = $nama; $this->harga = $harga; $this->kategori = $kategori; $this->stok = $stok;
    }
    public function kurangiStok(int $j): void {
        if ($this->stok === 0) throw new Exception("Menu {$this->nama} berstatus Habis!");
        if ($j > $this->stok) throw new Exception("Pesanan melebihi stok yang tersedia!");
        $this->stok -= $j;
    }
    public function hitungTotalHarga(int $j): float { return $this->harga * $j; }
    public function getData(): array {
        $kode = $this->kode; $nama = $this->nama; $harga = $this->harga; $kategori = $this->kategori; $stok = $this->stok; $status = $stok > 0 ? 'Tersedia' : 'Habis';
        return compact('kode','nama','harga','kategori','stok','status');
    }
}
class MenuMinuman extends Menu {
    private string $suhu;
    public function __construct(string $k, string $n, float $h, int $s, string $su = 'Dingin') { parent::__construct($k,$n,$h,'Minuman',$s); $this->suhu = $su; }
    public function getData(): array { $d = parent::getData(); $d['suhu'] = $this->suhu; return $d; }
}
