# Bersihin - Sistem Pelaporan dan Pengelolaan Sampah

Aplikasi web untuk pelaporan sampah warga dan pengelolaan jadwal pengangkutan sampah, dibangun menggunakan Laravel 13.

## Fitur

- Autentikasi & Role (Admin & Warga) menggunakan Laravel Breeze dan Spatie Permission
- CRUD Kategori Sampah
- CRUD Jadwal Pengangkutan (dengan filter kategori)
- CRUD Laporan Sampah (dengan upload foto, filter kategori & status)
- Penjadwalan laporan berbasis work order (admin meng-assign laporan ke jadwal pengangkutan secara manual)
- Halaman detail laporan (deskripsi lengkap dan waktu pelaporan)
- Dashboard statistik (berbeda untuk Admin dan Warga)
- REST API untuk integrasi dengan aplikasi mobile

## Alur Kerja

### Penjadwalan Laporan (Work Order)

Laporan yang masuk dari warga tidak langsung memiliki jadwal pengangkutan. Admin meninjau laporan dan secara manual memilih jadwal pengangkutan yang sesuai melalui dropdown "Assign" pada halaman daftar laporan.

Saat admin melakukan assignment, sistem otomatis mencatat siapa yang meng-assign (`assigned_by`) dan kapan (`assigned_at`), serta mengubah status laporan dari **Menunggu** menjadi **Diproses**. Admin dapat mengubah status menjadi **Selesai** setelah sampah diangkut.

### Pembagian Peran

- **Warga**: membuat, melihat, dan mengedit laporan miliknya sendiri.
- **Admin**: tidak dapat membuat laporan, namun dapat meninjau seluruh laporan, meng-assign jadwal pengangkutan, mengubah status, dan mengelola data master (Kategori Sampah, Jadwal Pengangkutan).

## Tech Stack

- Laravel 13
- MySQL
- Laravel Breeze (Blade)
- Spatie Laravel Permission
- Laravel Sanctum (API Authentication)
- Tailwind CSS

## Instalasi

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
npm run build
```

## Akun Demo

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@bersihin.com | password |
| Warga | warga@bersihin.com | password |

## REST API Documentation

Base URL: `http://bersihin-web.test/api`

Semua endpoint (kecuali `/login`) membutuhkan header:
