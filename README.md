# SIM Inventaris (Sistem Informasi Manajemen Inventaris)

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

## 📋 Deskripsi Project

**SIM Inventaris** adalah aplikasi berbasis web yang dibangun menggunakan framework Laravel untuk mempermudah pengelolaan aset dan inventaris. Aplikasi ini dirancang untuk menangani berbagai aspek manajemen aset, mulai dari pendataan aset tetap, barang habis pakai (BHP), transaksi stok, peminjaman aset, hingga pelaporan.

Sistem ini cocok digunakan oleh instansi atau organisasi yang membutuhkan pencatatan inventaris yang terstruktur, transparan, dan mudah diakses.

## 🚀 Fitur Utama

Aplikasi ini memiliki berbagai modul fitur yang lengkap:

1.  **Dashboard**: Ringkasan statistik inventaris.
2.  **Data Master**: Manajemen Unit, Ruangan, dan Sumber Dana.
3.  **Inventaris Aset Tetap**:
    -   Manajemen Kategori Aset.
    -   Pencatatan Barang Induk dan Detail Aset (Laptop, Proyektor, Meja, dll).
4.  **Barang Habis Pakai (BHP)**:
    -   Manajemen Obat, ATK, dan barang konsumsi lainnya.
    -   Pencatatan Batch dan Detail Stok.
5.  **Transaksi BHP**:
    -   Pencatatan Stok Masuk dan Stok Keluar.
6.  **Peminjaman Aset (Sirkulasi)**:
    -   Pencatatan Peminjaman dan Pengembalian Aset.
7.  **Pengadaan (Akuisisi)**:
    -   Pengajuan dan Persetujuan Pengadaan Barang baru.
8.  **Laporan (Reporting)**:
    -   Cetak Laporan Aset, Stok BHP, dan Peminjaman (PDF Support).
9.  **Manajemen User**: Pengelolaan pengguna aplikasi.

## 🛠️ Teknologi yang Digunakan

Project ini dibangun dengan teknologi modern untuk memastikan performa dan kemudahan pengembangan:

-   **Backend Framework:** [Laravel 12](https://laravel.com)
-   **Language:** PHP ^8.2
-   **Frontend:** Blade Templates
-   **Styling:** [Tailwind CSS](https://tailwindcss.com)
-   **Interactivity:** [Alpine.js](https://alpinejs.dev)
-   **Build Tool:** Vite
-   **Database:** MySQL / MariaDB
-   **PDF Generation:** barryvdh/laravel-dompdf

## 📦 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal Anda:

### Prasyarat

Pastikan Anda telah menginstal:

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   MySQL

### Langkah-langkah

1.  **Clone Repository**

    ```bash
    git clone https://github.com/username/sim_inventaris.git
    cd sim_inventaris
    ```

2.  **Install Dependencies (Backend)**

    ```bash
    composer install
    ```

3.  **Install Dependencies (Frontend)**

    ```bash
    npm install
    ```

4.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env`:

    ```bash
    cp .env.example .env
    ```

    Buka file `.env` dan sesuaikan konfigurasi database Anda:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6.  **Migrasi Database & Seeder**
    Jalankan migrasi untuk membuat tabel dan mengisi data awal (jika ada):

    ```bash
    php artisan migrate --seed
    ```

7.  **Jalankan Development Server**
    Buka dua terminal terpisah.

    Terminal 1 (Laravel Server):

    ```bash
    php artisan serve
    ```

    Terminal 2 (Vite Build Watch):

    ```bash
    npm run dev
    ```

8.  **Akses Aplikasi**
    Buka browser dan kunjungi: `http://127.0.0.1:8000`

## 📄 Lisensi

Project ini bersifat open-source dan dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).
