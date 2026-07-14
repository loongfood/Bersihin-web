# Bersihin - Sistem Pelaporan dan Pengelolaan Sampah

Aplikasi web untuk pelaporan sampah warga dan pengelolaan jadwal pengangkutan sampah, dibangun menggunakan Laravel 13.

## Fitur

- Autentikasi & Role (Admin & Warga) menggunakan Laravel Breeze dan Spatie Permission
- CRUD Kategori Sampah
- CRUD Jadwal Pengangkutan (dengan filter kategori)
- CRUD Laporan Sampah (dengan upload foto, filter kategori & status)
- Dashboard statistik (berbeda untuk Admin dan Warga)
- REST API untuk integrasi dengan aplikasi mobile

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
