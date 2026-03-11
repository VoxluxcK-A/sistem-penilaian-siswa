# 📦 PANDUAN INSTALASI

## Cara Install Project Ini

### ✅ UNTUK WINDOWS

Buka **Command Prompt** atau **PowerShell**, lalu copy-paste perintah ini:

```cmd
git clone https://github.com/username/repo-name.git
cd repo-name
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

### ✅ UNTUK MAC / LINUX

Buka **Terminal**, lalu copy-paste perintah ini:

```bash
git clone https://github.com/username/repo-name.git
cd repo-name
composer install
cp .env.example .env
php artisan key:generate
chmod -R 775 storage bootstrap/cache
php artisan migrate
php artisan db:seed
php artisan serve
```

---

## 🌐 Akses Aplikasi

Setelah `php artisan serve` berjalan, buka browser:

### Homepage
**http://127.0.0.1:8000**

### Admin Panel
- **URL**: http://127.0.0.1:8000/admin-panel-secret
- **Password**: `admin2024`

### Login Siswa
Gunakan salah satu NIS berikut:
- 12001 (Ahmad Budi Santoso)
- 12002 (Siti Nurhaliza)
- 12003 (Dedi Kurniawan)
- 12004 (Maya Sari Dewi)
- 12005 (Rizki Pratama)
- ... sampai 12036

Total ada **36 siswa** untuk testing.

---

## ⚠️ TROUBLESHOOTING

### 1. Error: "composer: command not found"

**Solusi**: Install Composer terlebih dahulu
- Download dari: https://getcomposer.org/download/
- Ikuti petunjuk instalasi sesuai OS kamu

### 2. Error: "could not find driver" (SQLite)

**Windows:**
1. Cari file `php.ini` (biasanya di folder PHP)
2. Buka dengan text editor
3. Cari baris ini:
   ```
   ;extension=pdo_sqlite
   ;extension=sqlite3
   ```
4. Hapus tanda `;` di depannya jadi:
   ```
   extension=pdo_sqlite
   extension=sqlite3
   ```
5. Save file
6. Restart terminal/command prompt
7. Jalankan ulang dari `php artisan migrate`

**Mac:**
```bash
brew install php
```

**Linux/Ubuntu:**
```bash
sudo apt-get install php-sqlite3 php-xml php-mbstring php-curl
```

### 3. Error: "Permission denied" (Mac/Linux)

```bash
chmod -R 775 storage bootstrap/cache
```

### 4. Error: "Class not found"

```bash
composer dump-autoload
php artisan migrate
php artisan db:seed
```

### 5. Error: "No application encryption key"

```bash
php artisan key:generate
```

### 6. Database kosong / tidak ada data siswa

```bash
php artisan migrate:fresh
php artisan db:seed
```

---

## 🎯 VERSI SINGKAT (1 BARIS)

### Windows:
```cmd
git clone https://github.com/username/repo-name.git && cd repo-name && composer install && copy .env.example .env && php artisan key:generate && php artisan migrate && php artisan db:seed && php artisan serve
```

### Mac/Linux:
```bash
git clone https://github.com/username/repo-name.git && cd repo-name && composer install && cp .env.example .env && php artisan key:generate && chmod -R 775 storage bootstrap/cache && php artisan migrate && php artisan db:seed && php artisan serve
```

---

## 📊 Data Seeder

Setelah menjalankan `php artisan db:seed`, sistem akan memiliki:
- **36 siswa** dengan data lengkap
- **28 siswa lulus** (rata-rata ≥ 79)
- **8 siswa tidak lulus** (rata-rata < 79)
- Setiap siswa memiliki 5 nilai mata pelajaran:
  - Matematika
  - Bahasa Indonesia
  - Bahasa Inggris
  - IPA
  - IPS

---

## 🔄 Reset Database (Jika Perlu)

Jika ingin reset database dan mulai dari awal:

```bash
php artisan migrate:fresh
php artisan db:seed
```

**PERINGATAN**: Ini akan menghapus semua data!

---

## 📝 Catatan Penting

1. ✅ Database menggunakan **SQLite**, BUKAN MySQL
2. ✅ File `.env` sudah dikonfigurasi untuk SQLite
3. ✅ TIDAK PERLU membuat database manual
4. ✅ File database akan otomatis dibuat di `database/database.sqlite`
5. ✅ Admin password: `admin2024`
6. ✅ Secret URL: `/admin-panel-secret`

---

## 🆘 Masih Error?

Jika masih mengalami error:
1. Screenshot error yang muncul
2. Catat perintah yang dijalankan
3. Buat issue di repository atau hubungi developer

---

## ✨ Selamat Mencoba!

Jika instalasi berhasil, kamu akan melihat:
- ✅ Homepage dengan tombol login siswa dan admin
- ✅ Admin panel dengan dashboard
- ✅ Data 36 siswa sudah tersedia
- ✅ Fitur search, filter, dan pagination berfungsi

**Happy Coding! 🚀**
