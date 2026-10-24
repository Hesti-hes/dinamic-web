# Portal Akademik Kampus Nusantara - Web Dinamis

Proyek tugas praktikum pembuatan website dinamis berbasis PHP native modular dengan relasi database MySQLi dan sistem autentikasi sesi.

---

## 👤 Identitas Mahasiswa

- **Nama Lengkap** : Hesti Febriyani
- **NIM** : 24106050010
- **Mata Kuliah** : Pemrograman Platform Web

---

## 📌 Deskripsi Proyek

Situs ini dibangun menggunakan arsitektur web dinamis modular dengan metode routing URL berbasis parameter `$_GET['modul']`. Setiap modul konten dimuat secara efisien melalui fungsi `include` PHP tanpa memuat ulang kerangka tata letak (*layout*) utama (`header.php` dan `footer.php`).

Sistem ini juga dilengkapi dengan manajemen basis data relasional antara tabel mahasiswa dan program studi, serta proteksi keamanan hak akses menggunakan PHP Session dan Cookie.

---


## 🔑 Kredensial Akun Administrator

Untuk mengakses menu yang diproteksi (*Data Mahasiswa* dan *Kelola Admin*):

- **Halaman Login**: `index.php?modul=login`
- **Username**: `hesti`
- **Password**: `admin123`

---

## ⚙️ Panduan Menjalankan Proyek

1. Pastikan modul **Apache** dan **MySQL** pada control panel XAMPP dalam keadaan aktif.
2. Salin folder proyek ke direktori web server:
   ```text
   C:\xampp\htdocs\semester5\pratikum-php\dinamic-web\
   ```
3. Buat database baru di phpMyAdmin bernama `db_akademik_mhs`.
4. Pastikan tabel `admin_users`, `biodata_mhs`, dan `prodi` sudah terkonfigurasi.
5. Buka peramban (*browser*) dan akses URL:
   ```text
   http://localhost/semester5/pratikum-php/dinamic-web/index.php
   ```
