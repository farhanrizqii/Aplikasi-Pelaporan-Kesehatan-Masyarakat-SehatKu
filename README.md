# 🏥 Aplikasi Pelaporan Kesehatan Masyarakat SehatKu

Proyek ini adalah sistem informasi berbasis web yang dibangun menggunakan **Laravel** untuk mengelola dan melaporkan data kesehatan masyarakat, seperti data penduduk, riwayat kesehatan, ibu hamil, imunisasi, dan kegiatan posyandu.

---

## 📋 Prasyarat

Sebelum menjalankan proyek ini, pastikan sistem Anda memiliki komponen berikut yang terinstal:

* **PHP:** Versi 8.1 atau yang lebih baru.
* **Composer:** Manajer dependensi untuk PHP.
* **Node.js & npm:** Untuk mengelola aset frontend (CSS/JS).
* **Database:** MySQL, MariaDB, atau PostgreSQL.
* **Server Web:** XAMPP, Laragon, atau Valet (untuk lingkungan lokal).

---

## 🚀 Instalasi & Setup Proyek

Ikuti langkah-langkah di bawah ini untuk mendapatkan salinan proyek yang berfungsi di mesin lokal Anda.

Buka Terminal atau Command Prompt Anda dan *clone* repositori ini:
```bash
### 1. Kloning Repositori

git clone [https://github.com/farhanrizqii/Aplikasi-Pelaporan-Kesehatan-Masyarakat-SehatKu.git](https://github.com/farhanrizqii/Aplikasi-Pelaporan-Kesehatan-Masyarakat-SehatKu.git)
cd Aplikasi-Pelaporan-Kesehatan-Masyarakat-SehatKu

### 2. Konfigurasi Lingkungan

* Salin file konfigurasi lingkungan.
    ```bash
    cp .env.example .env
    ```
* Buat *Application Key* yang unik.
    ```bash
    php artisan key:generate
    ```

### 3. Konfigurasi Database

Buka file **`.env`** dan atur kredensial database Anda (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=

4. Instalasi DependensiInstal dependensi PHP melalui Composer dan dependensi frontend melalui NPM:Bash# Instal dependensi PHP (Controller, Model, dll.)
composer install

# Instal dependensi Node.js (Vite, TailwindCSS, dll.)
npm install

# Kompilasi dan bundling aset frontend
npm run build
5. Migrasi dan Seeding DatabaseJalankan migrasi untuk membuat tabel-tabel di database Anda, diikuti dengan seeder untuk mengisi data awal.Bashphp artisan migrate --seed
▶️ Menjalankan AplikasiJalankan server pengembangan Laravel:Bashphp artisan serve
Aplikasi sekarang dapat diakses melalui browser Anda di: http://127.0.0.1:8000🔐 Akun DefaultRoleEmailPasswordAdministratoradmin@example.compassword (Atau periksa di file DatabaseSeeder.php jika berbeda)
