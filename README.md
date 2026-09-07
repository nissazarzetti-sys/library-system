# Library System

## Description

Library System adalah sistem informasi perpustakaan sederhana yang dibuat menggunakan Laravel. Sistem ini digunakan untuk membantu mengelola data buku dan informasi perpustakaan secara lebih mudah.

## Requirements

* PHP >= 8.2
* Composer
* MySQL
* Laravel
* XAMPP

## Installation

1. Clone repository:

```bash
git clone https://github.com/nissazarzetti-sys/library-system
```

2. Masuk ke folder project:

```bash
cd library-system
```

3. Install dependency Laravel:

```bash
composer install
```

4. Copy file `.env`:

```bash
copy .env.example .env
```

5. Generate application key:

```bash
php artisan key:generate
```

6. Buat database MySQL dengan nama:

```text
library_system
```

7. Atur konfigurasi database pada file `.env`:

```env
DB_DATABASE=library_system
DB_USERNAME=root
DB_PASSWORD=
```

8. Jalankan migration:

```bash
php artisan migrate
```

9. Jalankan aplikasi:

```bash
php artisan serve
```

10. Buka aplikasi melalui browser:

```text
http://127.0.0.1:8000
```

## Author

**Arzetti Nisa Zarika**
