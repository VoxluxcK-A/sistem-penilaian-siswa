# 📚 Panduan Penggunaan Sistem Kelulusan Siswa

## 🎯 Ringkasan Sistem
- **Total Siswa**: 5 (untuk demo, bisa 288 siswa via Excel)
- **Kriteria Lulus**: Rata-rata ≥ 79
- **Siswa Lulus**: 3 orang
- **Siswa Tidak Lulus**: 2 orang

## 👨‍🎓 Untuk Siswa (Guest Mode)

### Cara Cek Kelulusan:
1. **Buka**: http://localhost:8000
2. **Masukkan NIS** di form yang tersedia
3. **Klik "Cek Kelulusan"**
4. **Lihat hasil** lengkap dengan status dan nilai

### NIS untuk Testing:
| NIS | Nama | Rata-rata | Status |
|-----|------|-----------|--------|
| 1225 | Andi Firmansyah | 78.00 | ❌ TIDAK LULUS |
| 1224 | Bayu Anggoro | 85.00 | ✅ LULUS |
| 1226 | Lisa Maryana | 65.00 | ❌ TIDAK LULUS |
| 1227 | Ari Anggara | 88.00 | ✅ LULUS |
| 12345 | Eko Wardoyo | 90.00 | ✅ LULUS |

## 👨‍💼 Untuk Admin

### Akses Admin Panel:
1. **Buka**: http://localhost:8000/admin-panel-secret
2. **Password**: `admin2024`
3. **Klik "Masuk"**

### Menu Admin:
- **📊 Dashboard**: Statistik siswa dan kelulusan
- **📤 Import Excel**: Upload data siswa massal
- **👥 Kelola Siswa**: CRUD manual siswa
- **📥 Download Template**: Template Excel kosong

## 📊 Import Excel (Untuk 288 Siswa)

### Format Excel:
```
| A (NIS) | B (Nama Siswa) | C (Rata-rata) | D (Perilaku) |
|---------|----------------|---------------|--------------|
| 12001   | Ahmad Budi     | 85            | Baik sekali  |
| 12002   | Siti Aminah    | 76            | Perlu perbaikan |
```

### Langkah Import:
1. **Download Template** dari admin panel
2. **Isi data 288 siswa** (8 kelas × 36 siswa)
3. **Upload file** di menu "Import Excel"
4. **Preview dan validasi** data
5. **Klik Import** untuk menyimpan ke database

### Aturan Import:
- ✅ NIS harus unik
- ✅ Nama wajib diisi
- ✅ Nilai 0-100
- ✅ Perilaku boleh kosong
- ✅ Format: .xlsx, .xls, .csv (max 2MB)

## 🔒 Keamanan

### URL Rahasia:
- Admin panel tidak terlihat di homepage
- URL: `/admin-panel-secret` (bisa diganti)
- Password: `admin2024` (bisa diganti)

### Ganti Password Admin:
Edit file `app/Http/Controllers/AdminController.php` baris:
```php
if ($request->password === 'admin2024') {
```
Ganti `admin2024` dengan password baru.

### Ganti URL Rahasia:
Edit file `routes/web.php` baris:
```php
Route::prefix('admin-panel-secret')->group(function () {
```
Ganti `admin-panel-secret` dengan URL baru.

## 🚀 Deployment Production

### 1. Database MySQL:
Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kelulusan_siswa
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 2. Setup Production:
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 3. Keamanan Production:
- Ganti `APP_KEY` di `.env`
- Set `APP_DEBUG=false`
- Gunakan HTTPS
- Ganti password admin
- Ganti URL rahasia

## 📞 Support

### Troubleshooting:
- **Error 500**: Cek log di `storage/logs/laravel.log`
- **Database Error**: Pastikan migration sudah jalan
- **Excel Import Gagal**: Cek format dan ukuran file
- **Admin Tidak Bisa Login**: Cek password dan URL

### Kontak Developer:
Jika ada masalah atau perlu modifikasi, hubungi developer dengan informasi:
- Error message lengkap
- Screenshot jika perlu
- File Excel yang bermasalah (jika ada)

---

## ✅ Sistem Siap Digunakan!

**Homepage**: http://localhost:8000  
**Admin Panel**: http://localhost:8000/admin-panel-secret  
**Password**: admin2024

Sistem ini sudah siap untuk menangani 288 siswa dengan import Excel dan cocok untuk kelulusan semester genap! 🎓