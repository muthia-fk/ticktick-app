```markdown
# TICKTICK-APP

Aplikasi manajemen tugas sederhana berbasis **Laravel**.  
Dikembangkan sebagai bagian dari praktikum jaringan & web server, dengan fokus pada konfigurasi server, database, dan deployment di Apache.

---

## 🚀 Fitur
- Autentikasi pengguna (login & register).
- CRUD Task (buat, edit, hapus, lihat daftar).
- Tampilan berbasis Blade template (`resources/views/tasks`).
- Layout utama di `resources/views/layouts/app.blade.php`.

---

## 📂 Struktur Direktori
- `app/` → logika aplikasi (controllers, models).
- `resources/views/` → tampilan (Blade templates).
- `routes/web.php` → routing aplikasi.
- `public/` → entry point aplikasi (index.php).
- `.env` → konfigurasi environment (database, app key).

---

## ⚙️ Instalasi
1. Clone repository:
   ```bash
   git clone https://github.com/username/TICKTICK-APP.git
   cd TICKTICK-APP
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy file environment:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Konfigurasi database di `.env`:
   ```
   DB_DATABASE=ticktick_db
   DB_USERNAME=tickuser
   DB_PASSWORD=tickticktick
   ```

6. Jalankan migrasi:
   ```bash
   php artisan migrate
   ```

---

## 🌐 Konfigurasi Apache
Tambahkan virtual host:

```apache
<VirtualHost *:80>
    ServerName ticktick.local
    DocumentRoot /var/www/ticktick-app/public

    <Directory /var/www/ticktick-app/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/ticktick-error.log
    CustomLog ${APACHE_LOG_DIR}/ticktick-access.log combined
</VirtualHost>
```

Aktifkan site:
```bash
a2ensite ticktick-app.conf
a2enmod rewrite
systemctl reload apache2
```

Tambahkan ke `/etc/hosts`:
```
127.0.0.1   ticktick.local
```

---

## 🖥️ Cara Menjalankan
Buka browser dan akses:
```
http://ticktick.local/
```
Halaman Laravel welcome page atau tampilan yang kamu buat di `resources/views` akan muncul.

---

## 📜 Lisensi
Proyek ini dibuat untuk keperluan praktikum. Bebas digunakan untuk belajar dan pengembangan lebih lanjut.
```
