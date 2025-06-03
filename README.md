## 👥 Nama Anggota Kelompok
1. **Risto Benito Adiaka** – Ketua  
2. **Rifqi Ardian** – Fullstack Programmer  
3. **Salman Abdul Aziz** – Fullstack Programmer  
4. **Farel Setiawan Nugraha Gusni** – Dokumentasi  
5. **Wiratama Agung Kusuma** – Dokumentasi


## 🛠️ Tech Stack
- Laravel 12
- Tailwind CSS
- Filament
- MySQL

## 📋 Prerequisites
Pastikan sudah terinstal di sistem kamu:
- PHP ^8.2
- Composer ^2.2
- MySQL
  
## ⚙️ Setup Guide

### 1. Clone project
```bash
git clone https://github.com/arditam/Project-BKK.git
```

### 2. Setup database pada komputer anda, lalu masukkan kredensial-kredensialnya ke file .env.
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_bkknew15
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Install dependency
```bash
composer install
```
### 4. Generate application key
```bash
php artisan key:generate
```
### 5. Link storage untuk file upload
```bash
php artisan storage:link
```
### 6. Migrasi database
```bash
php artisan migrate
```
### 7. Jalankan aplikasi
```bash
php artisan serve
```

### 8. Buat akun admin untuk Filament
```bash
php artisan make:filament-user
```

### 9. Menjalankan fungsi notifikasi,export,dan import filament
```bash
php artisan queue:work
```
### 10. Kalau gambar tidak muncul 
```bash
rd public\storage    
php artisan storage:link
```






