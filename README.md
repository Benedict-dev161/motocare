# MotoCare - Sistem Pengingat Perawatan Motor

MotoCare adalah aplikasi web berbasis Laravel yang digunakan untuk membantu pengguna mencatat riwayat perawatan motor, memantau kilometer terkini, dan menghitung jadwal perawatan berikutnya secara otomatis.

Proyek ini dibuat sebagai proyek mandiri untuk mengimplementasikan studi kasus nyata mengenai perawatan kendaraan ke dalam sistem informasi berbasis web. Fokus utama aplikasi ini adalah pencatatan dan pemantauan perawatan motor matic, khususnya motor seperti Honda BeAT.

## Gambaran Umum

MotoCare memungkinkan pengguna untuk memasukkan data motor dan riwayat perawatan sebelumnya, seperti ganti oli mesin, ganti oli gardan, servis CVT, pengecekan filter udara, penggantian busi, pengecekan rem, dan pengecekan ban.

Berdasarkan data kilometer dan riwayat servis yang dimasukkan, sistem akan menghitung jadwal perawatan berikutnya dan menampilkan status perawatan, seperti aman, mendekati jadwal servis, terlambat, atau belum ada data.

## Fitur Utama

* Input data motor
* Pencatatan kilometer terkini
* Pencatatan riwayat perawatan motor
* Perhitungan otomatis jadwal servis berikutnya
* Status rekomendasi perawatan
* Tampilan interval perawatan dalam kilometer
* Edit kilometer terkini
* Edit data perawatan berdasarkan kategori
* Tabel hasil perhitungan perawatan
* Halaman histori input perawatan
* Melihat kembali hasil perhitungan sebelumnya
* Menghapus data histori perawatan
* Navbar responsif
* Tampilan antarmuka sederhana dan rapi

## Kategori Perawatan

Sistem ini mendukung beberapa kategori perawatan motor, yaitu:

* Ganti oli mesin
* Ganti oli gardan
* Servis berkala
* Servis CVT
* Cek atau ganti filter udara
* Ganti busi
* Cek rem
* Cek ban

## Status Perawatan

MotoCare menghitung setiap kategori perawatan dan menampilkan status sebagai berikut:

| Status           | Keterangan                                                       |
| ---------------- | ---------------------------------------------------------------- |
| Aman             | Komponen masih berada dalam interval perawatan yang ideal        |
| Mendekati Jadwal | Komponen sudah mendekati jadwal servis berikutnya                |
| Terlambat        | Komponen sudah melewati batas interval perawatan                 |
| Belum Ada Data   | Pengguna belum memasukkan data perawatan untuk kategori tersebut |

## Yang Digunakan

* Laravel
* PHP
* MySQL
* Blade Template
* HTML
* CSS
* JavaScript

## Database

Tabel utama yang digunakan dalam proyek ini adalah:

```text
maintenance_checks
```

Tabel ini digunakan untuk menyimpan data motor, kilometer terkini, tanggal perawatan terakhir, kilometer saat perawatan terakhir, nama bengkel, biaya servis, dan catatan kondisi motor.

## Halaman Utama

| Halaman         | Keterangan                                              |
| --------------- | ------------------------------------------------------- |
| Home            | Halaman awal dan pengenalan aplikasi                    |
| Input Perawatan | Form untuk memasukkan data motor dan riwayat perawatan  |
| Result          | Menampilkan hasil perhitungan dan rekomendasi perawatan |
| Histori         | Menampilkan daftar data perawatan yang pernah diinput   |

## Instalasi

Clone repository ini:

```bash
git clone https://github.com/username-kamu/motocare.git
```

Masuk ke folder project:

```bash
cd motocare
```

Install dependency PHP:

```bash
composer install
```

Salin file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=motocare_db
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration database:

```bash
php artisan migrate
```

Jalankan server Laravel:

```bash
php artisan serve
```

Buka aplikasi melalui browser:

```text
http://127.0.0.1:8000
```

## Akses Melalui Handphone

Untuk mengakses aplikasi dari handphone dalam jaringan WiFi yang sama, jalankan Laravel dengan perintah:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Kemudian buka browser di handphone dan akses menggunakan IP laptop:

```text
http://ip-laptop-kamu:8000
```

Contoh:

```text
http://192.168.1.10:8000
```

Catatan: laptop harus tetap menyala, terhubung ke jaringan yang sama, server Laravel harus berjalan, dan MySQL/XAMPP harus aktif.

## Tujuan Proyek

Proyek ini dibuat untuk melatih dan menunjukkan kemampuan dalam:

* Routing Laravel
* Pembuatan controller
* Pengelolaan form
* Validasi input
* Migration database
* Operasi CRUD
* Blade templating
* Logika perhitungan jadwal perawatan
* Desain antarmuka web responsif

## Batasan Saat Ini

* Aplikasi belum menggunakan sistem login dan register.
* Aplikasi masih difokuskan untuk penggunaan lokal atau single-user.
* Interval perawatan masih ditentukan langsung di dalam controller.
* Sistem masih difokuskan pada perawatan motor dan belum mendukung banyak jenis kendaraan.
* Sistem belum memiliki notifikasi otomatis.

## Rencana Pengembangan

Beberapa fitur yang dapat dikembangkan ke depannya:

* Menambahkan login dan register pengguna
* Mendukung lebih dari satu motor dalam satu akun
* Membuat master data jenis perawatan
* Menambahkan dashboard analitik
* Menampilkan total biaya servis
* Menambahkan sistem notifikasi atau reminder
* Upload foto nota servis
* Export data ke PDF atau Excel
* Deployment ke hosting online

## Catatan Deployment

MotoCare adalah aplikasi Laravel, sehingga membutuhkan hosting yang mendukung:

* PHP
* Composer
* MySQL
* Konfigurasi file `.env`
* Permission folder `storage`

Aplikasi ini tidak dapat dijalankan secara penuh di static hosting seperti GitHub Pages, karena Laravel membutuhkan backend PHP dan database.

## Author

Dikembangkan oleh Bryan Benedict sebagai proyek mandiri berbasis Laravel untuk portofolio.
