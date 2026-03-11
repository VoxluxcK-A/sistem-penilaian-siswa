# Sistem Pengecekan Kelulusan Siswa (Updated)

## Deskripsi
Sistem ini dibuat untuk memenuhi kebutuhan sekolah dalam mengelola data kelulusan siswa dengan fitur Excel import dan akses guest mode untuk siswa.

## Fitur Utama

### 1. Siswa (Guest Mode)
- **Homepage**: Langsung input NIS tanpa login
- **Hasil Kelulusan**: Tampilan lengkap dengan status, nilai, dan perilaku
- **Print Friendly**: Bisa langsung print hasil

### 2. Admin Panel (Secret URL)
- **URL Rahasia**: `/admin-panel-secret`
- **Password**: `admin2024`
- **Excel Import**: Upload file Excel untuk import massal (288 siswa)
- **Template Download**: Download template Excel kosong
- **CRUD Manual**: Tambah/edit siswa secara manual jika diperlukan

## Kriteria Kelulusan (Updated)
- **LULUS**: Rata-rata nilai ≥ 79
- **TIDAK LULUS**: Rata-rata nilai < 79

## Cara Akses

### Siswa
1. Buka: http://localhost:8000
2. Masukkan NIS
3. Lihat hasil kelulusan

**NIS untuk Testing:**
- **1225** - Andi Firmansyah (78 - TIDAK LULUS)
- **1224** - Bayu Anggoro (85 - LULUS)
- **1226** - Lisa Maryana (65 - TIDAK LULUS)
- **1227** - Ari Anggara (88 - LULUS)
- **12345** - Eko Wardoyo (90 - LULUS)

### Admin
1. Buka: http://localhost:8000/admin-panel-secret
2. Password: `admin2024`
3. Akses panel admin

## Format Excel Import

### Template CSV/Excel:
```
NIS,Nama Siswa,Rata-rata Nilai,Perilaku
12001,Ahmad Budi,85,Siswa yang aktif dan disiplin
12002,Siti Aminah,76,Perlu peningkatan dalam beberapa mata pelajaran
12003,Budi Santoso,82,Siswa berprestasi dengan sikap yang baik
```

### Aturan Import:
- **Kolom A**: NIS (wajib, unik)
- **Kolom B**: Nama Siswa (wajib)
- **Kolom C**: Rata-rata Nilai (0-100)
- **Kolom D**: Perilaku (opsional)
- **Baris 1**: Header (akan diabaikan)
- **Format**: .xlsx, .xls, .csv (max 2MB)

## Workflow Admin

### 1. Persiapan Data
- Download template Excel dari admin panel
- Isi data 288 siswa (8 kelas × 36 siswa)
- Pastikan NIS unik dan nilai 0-100

### 2. Import Data
- Login ke admin panel
- Upload file Excel
- Preview dan validasi data
- Import ke database

### 3. Publikasi
- Siswa bisa langsung cek kelulusan via homepage
- Admin bisa lihat laporan di dashboard

## Keamanan
- **URL Rahasia**: Admin panel tidak terlihat di homepage
- **Password Protection**: Double security dengan password
- **Session Based**: Auto logout setelah tidak aktif

## Teknologi
- **Laravel 11** dengan Excel import (Maatwebsite/Excel)
- **Bootstrap 5** untuk UI responsif
- **SQLite/MySQL** untuk database
- **Guest Mode** tanpa authentication untuk siswa

## Deployment ke Production
1. Ganti database ke MySQL di `.env`
2. Ubah password admin di `AdminController`
3. Ganti URL rahasia di `routes/web.php`
4. Setup HTTPS dan domain

## Kelebihan Sistem Ini
✅ **Simple untuk Siswa**: Tinggal input NIS  
✅ **Efficient untuk Admin**: Import 288 siswa sekaligus  
✅ **Secure**: URL rahasia + password  
✅ **Flexible**: Support berbagai format Excel  
✅ **User Friendly**: Interface yang mudah dipahami  

Sistem ini siap digunakan untuk kelulusan semester genap dengan 288 siswa!