# Setup untuk Hosting Production

## Struktur Folder untuk Hosting

Untuk menghindari masalah di hosting, pastikan struktur folder ini:

```
public/
├── index.php
├── dokumen/          ← Pindahkan asset dokumen ke sini
│   └── startbootstrap-creative-gh-pages/
│       ├── css/
│       ├── js/
│       └── assets/
└── build/
    ├── app.js
    └── app.css
```

## Langkah-Langkah Setup di Hosting

### 1. Upload ke Hosting

Pastikan struktur folder seperti di atas. Jika belum, buat folder `public/dokumen` di hosting dan upload asset dokumen ke sana.

### 2. Update Asset Path (Jika Diperlukan)

Jika di `dashboard.blade.php` masih menggunakan path `/dokumen/...`, pastikan file-file benar-benar ada di `public/dokumen/`.

### 3. Document Root Configuration

Di hosting cPanel atau similar:
- Set Document Root ke: `/public`
- Atau gunakan `.htaccess` di root untuk redirect ke public

### 4. .htaccess untuk Non-Public Root (Jika Diperlukan)

Jika hosting force Document Root ke root folder (bukan public), gunakan file ini di root:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

Atau lebih aman, gunakan:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ public/index.php?/$1 [QSA,L]
</IfModule>
```

## Checklist Pre-Production

- [ ] Pindahkan dokumen ke `public/dokumen/`
- [ ] Test akses `/dokumen/css/...` berhasil
- [ ] Database sudah di production environment
- [ ] `.env` sudah dikonfigurasi untuk production
- [ ] `APP_DEBUG=false` di `.env`
- [ ] `APP_KEY` sudah di-generate
- [ ] Cache sudah di-clear: `php artisan config:cache`
- [ ] Storage link sudah di-buat (jika ada upload files)

## Troubleshooting

**Error 404 untuk /dokumen/**
- Periksa apakah folder `public/dokumen/` dan file-file ada
- Pastikan permissions file cukup (644 untuk files, 755 untuk folders)

**Forbidden Access**
- Check file permissions di hosting
- Update ke 644 untuk files dan 755 untuk folders

**Routes tidak bekerja**
- Periksa `.htaccess` di root tersedia
- Enable `mod_rewrite` di server
- Test dengan akses ke `/` terlebih dahulu
