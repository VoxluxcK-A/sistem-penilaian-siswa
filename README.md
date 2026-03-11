# Sistem Penilaian dan Kelulusan Siswa

Sistem informasi untuk mengelola data siswa, nilai, dan pengecekan status kelulusan berdasarkan rata-rata nilai.

## 🚀 Fitur

- ✅ Login siswa menggunakan NIS
- ✅ Cek status kelulusan otomatis (rata-rata ≥79)
- ✅ Admin panel dengan secret URL
- ✅ CRUD data siswa
- ✅ Manajemen nilai per mata pelajaran
- ✅ Import data siswa dari Excel
- ✅ Search siswa berdasarkan nama atau NIS
- ✅ Filter siswa berdasarkan status kelulusan
- ✅ Pagination (10 siswa per halaman)
- ✅ Desain minimalis dan responsif

## 🛠️ Teknologi

- **Framework**: Laravel 11
- **Database**: SQLite
- **Frontend**: Blade Templates, Tailwind CSS
- **Excel Import**: Maatwebsite/Laravel-Excel

## 📋 Persyaratan Sistem

- PHP >= 8.2
- Composer
- SQLite Extension
- Node.js & NPM (optional, untuk compile assets)

## 📦 Instalasi

### Untuk Windows (Command Prompt):

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

### Untuk Mac/Linux (Terminal):

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

Setelah server berjalan, buka browser ke: **http://127.0.0.1:8000**

## 🔑 Akun Default

### Admin Panel
- **URL**: http://127.0.0.1:8000/admin-panel-secret
- **Password**: `admin2024`

### Login Siswa (gunakan NIS)
Sistem memiliki 36 data siswa dengan NIS dari 12001 sampai 12036. Contoh:
- **12001** - Ahmad Budi Santoso (Lulus)
- **12002** - Siti Nurhaliza (Lulus)
- **12003** - Dedi Kurniawan (Tidak Lulus)
- **12005** - Rizki Pratama (Lulus)
- Dan seterusnya...

## 📊 Kriteria Kelulusan

Siswa dinyatakan **LULUS** jika:
- Rata-rata nilai dari semua mata pelajaran **≥ 79**

Siswa dinyatakan **TIDAK LULUS** jika:
- Rata-rata nilai dari semua mata pelajaran **< 79**

## 📚 Struktur Database

### Tabel Siswa
- `id`: Primary key
- `nis`: Nomor Induk Siswa (unique)
- `nama`: Nama lengkap siswa
- `perilaku`: Catatan perilaku siswa

### Tabel Nilai
- `id`: Primary key
- `nis`: Foreign key ke tabel siswa
- `mata_pelajaran`: Nama mata pelajaran
- `nilai`: Nilai (0-100)

## 🎯 Cara Penggunaan

### Untuk Siswa:
1. Buka halaman utama
2. Klik "Login Siswa"
3. Masukkan NIS
4. Lihat hasil nilai dan status kelulusan

### Untuk Admin:
1. Akses URL secret: `/admin-panel-secret`
2. Masukkan password: `admin2024`
3. Dashboard admin akan menampilkan:
   - Total siswa
   - Jumlah siswa lulus
   - Menu kelola siswa
   - Menu import Excel

### Fitur Admin:
- **Kelola Siswa**: Tambah, edit, hapus data siswa
- **Kelola Nilai**: Tambah, edit, hapus nilai per mata pelajaran
- **Import Excel**: Upload file Excel untuk import data siswa massal
- **Search**: Cari siswa berdasarkan nama atau NIS
- **Filter**: Filter siswa berdasarkan status (Lulus/Tidak Lulus)

## 📄 Format Import Excel

Template Excel harus memiliki kolom:
1. **NIS** (wajib)
2. **Nama Siswa** (wajib)
3. **Rata-rata Nilai** (opsional, 0-100)
4. **Perilaku** (opsional)

Download template dari menu Import Data Siswa di admin panel.

## ⚠️ Troubleshooting

### Error: "could not find driver"
Install PHP SQLite extension:

**Windows:**
1. Buka `php.ini`
2. Uncomment baris berikut:
   ```
   extension=pdo_sqlite
   extension=sqlite3
   ```
3. Restart terminal

**Mac:**
```bash
brew install php
```

**Linux/Ubuntu:**
```bash
sudo apt-get install php-sqlite3 php-xml php-mbstring
```

### Error: "Permission denied" (Mac/Linux)
```bash
chmod -R 775 storage bootstrap/cache
```

### Error: "Class not found"
```bash
composer dump-autoload
```

## 🔒 Keamanan

- File `.env` tidak di-commit ke repository (berisi konfigurasi sensitif)
- Database SQLite tidak di-commit (berisi data siswa)
- Admin menggunakan secret URL dan password
- Session-based authentication untuk admin

## 📝 Catatan Pengembangan

Project ini dikembangkan untuk membantu guru dalam:
- Mengelola data siswa dengan mudah
- Menghitung rata-rata nilai otomatis
- Menentukan status kelulusan berdasarkan kriteria
- Import data massal dari Excel
- Memberikan akses siswa untuk cek nilai sendiri

## 📞 Kontak

Jika ada pertanyaan atau masalah, silakan buat issue di repository ini.

## 📄 Lisensi

Project ini dibuat untuk keperluan edukasi.
