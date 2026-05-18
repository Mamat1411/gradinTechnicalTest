# [Gradin Technical Test]

Aplikasi Backend CRUD Kurir yang dibangun dengan Laravel.

## 🚀 Fitur Utama
- Backend only (API Service only)
- Database lokal menggunakan SQLite
- Tanpa login/autentikasi (akses terbuka)
- Sudah terinstall Laravel Octane untuk web server frankenphp (hanya untuk Linux atau MacOS)

## 🛠️ Persyaratan Sistem (*System Requirements*)
Pastikan sistem Anda sudah memiliki perangkat lunak berikut sebelum melakukan instalasi:
- PHP >= 8.3
- Composer
- Ekstensi PHP SQLite (`pdo_sqlite` dan `sqlite`)

## 📦 Panduan Instalasi (*Installation*)

Ikuti langkah-langkah berikut untuk menjalankan aplikasi secara lokal:

1. **Clone repositori**
   ```bash
   git clone https://github.com/Mamat1411/gradinTechnicalTest.git
   cd gradinTechnicalTest
   ```

2. **Install dependensi PHP via Composer**
   ```bash
   composer install
   ```

3. **Persiapkan file konfigurasi (Environment)**
   Salin file `.env.example` menjadi `.env`.
   ```bash
   cp .env.example .env
   ```
   *Catatan: Pastikan `DB_CONNECTION=sqlite` ada di dalam file `.env` Anda.*

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Buat Database SQLite & Jalankan Migrasi**
   Anda tidak perlu menginstal MySQL/PostgreSQL. Laravel akan membantu membuatkan file SQLite saat Anda menjalankan perintah *migrate*:
   ```bash
   php artisan migrate
   ```
   *(Pilih 'yes' jika Laravel menanyakan apakah Anda ingin membuat database `database.sqlite` di folder `/database/`).*

6. **Jalankan Seeder (Opsional)**
   Jika Anda membutuhkan *dummy data* untuk pengujian:
   ```bash
   php artisan db:seed
   ```

7. **Jalankan Server Lokal**
   ```bash
   php artisan serve
   ```
   atau
   ```bash
   php artisan octane:start --watch
   ```
   Aplikasi sekarang dapat diakses melalui browser di alamat: `http://localhost:8000`

## 📂 Struktur Penting
- Database SQLite disimpan di dalam folder: `database/database.sqlite`
- Konfigurasi aplikasi utama berada di file `.env`

