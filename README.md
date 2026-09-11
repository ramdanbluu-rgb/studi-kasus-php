# 🚀 Repository Tugas Studi Kasus: Pemrograman Berorientasi Objek (OOP)

Repositori ini berisi kumpulan tugas studi kasus untuk pembelajaran **Pemrograman Berorientasi Objek (OOP)**. 

Meskipun instruksi awal menggunakan **PHP Native**, saya memutuskan untuk mengeksplorasi dan mengimplementasikannya menggunakan **Laravel Ecosystem** untuk kelima studi kasus yang ada. Tujuannya adalah untuk mendalami konsep arsitektur modern, khususnya penerapan **Service Layer** pada Laravel.

---

## 📂 Struktur Direktori

Agar tetap mempertahankan materi pembelajaran asli, kode sumber terbagi menjadi dua pendekatan:

*   `/belajar_OOP` 👉 Berisi implementasi asli menggunakan **PHP Native** sesuai dengan modul studi kasus.
*   `app/Services` & `app/Http/Controllers` 👉 Berisi implementasi modern menggunakan **Laravel** dengan pendekatan *Service Layer*.

---

## 💡 Alasan Menggunakan Laravel & Service Layer

Meskipun studi kasus ini dapat diselesaikan dengan PHP Native, migrasi ke Laravel dilakukan dengan beberapa pertimbangan utama:

1.  **Pemisahan Tanggung Jawab (*Separation of Concerns*):** Menjaga Controller tetap bersih (*skinny controllers*) dengan mendelegasikan logika bisnis utama ke dalam Service class.
2.  **Skalabilitas & Maintainability:** Mempelajari bagaimana mengelola kode yang kompleks agar lebih mudah diuji (*testable*) dan dikembangkan di masa mendatang.
3.  **Eksplorasi Ekosistem:** Memanfaatkan fitur bawaan Laravel seperti Dependency Injection, Service Container, dan Eloquent ORM dalam kerangka kerja OOP yang elegan.

---

## 🛠️ Cara Menjalankan Proyek (Laravel)

Jika Anda ingin menjalankan bagian proyek yang menggunakan Laravel, ikuti langkah-langkah berikut:

1.  **Clone repository ini:**
    ```bash
    git clone [https://github.com/username/nama-repo.git](https://github.com/username/nama-repo.git)
    cd nama-repo
    ```

2.  **Install dependencies PHP:**
    ```bash
    composer install
    ```

3.  **Salin file environment:**
    ```bash
    cp .env.example .env
    ```

4.  **Generate key aplikasi:**
    ```bash
    php artisan key:generate
    ```

5.  **Jalankan server lokal:**
    ```bash
    php artisan serve
    ```

---

## 👤 Author

*   **Alif Muhamad Ramdan**
