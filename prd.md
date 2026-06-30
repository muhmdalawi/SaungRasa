Aplikasi Manajemen Product Saung Rasa

Buat aplikasi web bernama Saung Rasa yang berfungsi sebagai sistem manajemen produk UMKM.

Konsep aplikasi:

Saung Rasa adalah brand produk makanan dan minuman dengan tampilan modern, profesional, dan elegan.

Aplikasi digunakan untuk:

- Menampilkan katalog produk kepada pengunjung
- Mengelola data produk oleh admin
- Menampilkan detail produk
- Membuat laporan produk dalam bentuk PDF

---

# Ketentuan

* Gunakan Laravel 13 dengan arsitektur MVC.
* Frontend menggunakan Bootstrap 5 dan Blade Template.
* Database menggunakan MySQL.
* Gunakan Eloquent ORM, Migration, Resource Controller, Route Resource, Middleware Auth, dan Validasi Laravel.
* Tampilan harus modern, bersih (clean UI), responsif, user-friendly, dan interaktif.
* Gunakan Bootstrap Icons.
* Gunakan JavaScript/jQuery seperlunya untuk meningkatkan interaktivitas.
* Pastikan seluruh halaman memiliki desain yang konsisten.
* Bootstrap sudah ada di public/bootstrap

Gunakan desain:

- Modern
- Clean UI
- Professional
- Premium
- Responsive
- Minimalis

Gunakan warna:

Primary:

#2F5D3A

Secondary:

#C9A66B

Background:

#F8F5EF

Text:

#2B2B2B

Gunakan:

- Soft shadow
- Rounded corner
- Card modern
- Hover effect
- Animasi ringan
- Spacing rapi
- Typography nyaman dibaca

Tampilan harus terlihat seperti website produk profesional, bukan template bawaan.

Jangan menggunakan:

Filament
Livewire
Jetstream
Breeze
Laravel Nova
Voyager
atau package sejenis.

---

# Authentication

Gunakan tabel users sebagai autentikasi.

Sesuaikan migration agar menggunakan:

- username
- password

Login menggunakan username, bukan email.

Password harus menggunakan Hash::make().

Admin wajib login sebelum mengakses seluruh halaman backend.

---

# Halaman Publik (Guest)

Halaman publik dapat diakses tanpa login.

## Home

Tampilkan:

- Navbar modern dengan logo Saung Rasa
- Hero section
- Deskripsi brand
- Highlight produk unggulan
- Daftar product dalam bentuk Card Bootstrap
- Search product
- Footer

Card product menampilkan:

- Gambar product
- Nama product
- Kategori
- Harga
- Tombol detail

Gunakan tampilan responsive.

---

# Detail Product

Menampilkan:

- Gambar product
- Nama product
- Kategori
- Harga
- Stok
- Deskripsi lengkap

Gunakan layout detail product modern.

---

# Halaman Admin

Setelah login admin diarahkan ke Dashboard.

Dashboard menampilkan:

- Total Product
- Product terbaru
- Total kategori
- Tombol Tambah Product

Sidebar Admin terdiri dari:

- Dashboard
- Data Product
- Export PDF
- Logout

Gunakan layout:

- Sidebar modern
- Navbar
- Breadcrumb
- Card statistik

---

# Database

Buat migration tabel products dengan field:

- id
- id_product
- gambar
- nama_product
- kategori
- harga
- stok
- deskripsi
- timestamps

---

# Model

Buat model:

Product.php

Gunakan:

- Eloquent ORM
- Fillable

---

# CRUD Product

Buat CRUD lengkap:

- Create
- Read
- Update
- Delete

Gunakan:

- Bootstrap Table
- DataTables
- Search
- Pagination
- Upload Gambar
- SweetAlert2 untuk konfirmasi hapus
- Flash Message setelah proses berhasil

Setelah Create, Update, atau Delete redirect kembali ke halaman daftar product.

---

# Validasi

Validasi dilakukan pada proses Create dan Update.

Ketentuan:

- id_product wajib dan unik
- gambar wajib (jpg, jpeg, png maksimal 2 MB)
- nama_product wajib
- kategori wajib
- harga wajib berupa angka
- stok wajib berupa angka
- deskripsi wajib

Tampilkan pesan error validasi yang jelas pada setiap field.

---

# Upload Gambar

Gunakan Laravel Storage.

Gunakan:

storage:link

Ketentuan:

- Jika gambar diganti, hapus gambar lama.
- Jika data product dihapus, gambar ikut terhapus dari storage.

---

# Export PDF

Gunakan Laravel DomPDF.

Laporan PDF menampilkan:

- Logo Saung Rasa (public/assest/logo.png)
- Judul Laporan Product Saung Rasa
- Tanggal Cetak
- ID Product
- Nama Product
- Kategori
- Harga
- Stok
- Deskripsi

Gunakan layout PDF yang rapi dan profesional.

---

# Seeder

Pisahkan setiap seeder.

Struktur:

database/

seeders/

DatabaseSeeder.php

UserSeeder.php

ProductSeeder.php


---

# UserSeeder

Buat akun administrator:

username:

admin

password:

password

Gunakan:

Hash::make()

---

# ProductSeeder

Isi minimal 10 data dummy product Saung Rasa.

Contoh product:

- Nasi Liwet Sunda
- Ayam Bakar Sunda
- Gurame Goreng
- Karedok
- Soto Bandung
- Lotek
- Pepes Ikan
- Kangkung
- Es Cendol
- Es Kelapa

Setiap data memiliki:

- gambar dummy ada di public/assets/product
- nama product
- kategori
- harga
- stok
- deskripsi

---

# DatabaseSeeder

DatabaseSeeder hanya memanggil:

$this->call([
    UserSeeder::class,
    ProductSeeder::class,
]);

---

# DataTables

Gunakan:

yajra/laravel-datatables-oracle

Fitur:

- Search
- Sorting
- Pagination

---

# SweetAlert2

Gunakan CDN SweetAlert2.

Untuk:

- Konfirmasi hapus
- Notifikasi berhasil

---

# UI/UX

Gunakan desain modern dan profesional.

Kriteria:

- Clean UI
- Responsive
- Soft shadow
- Rounded corner
- Card modern
- Hover effect
- Animasi ringan
- Bootstrap Icons
- Typography nyaman
- Layout rapi

Dashboard admin harus terlihat seperti aplikasi management system modern.

Landing page harus terlihat seperti website brand product profesional.

---

# Package

Gunakan package:

- barryvdh/laravel-dompdf
- yajra/laravel-datatables-oracle

Gunakan CDN SweetAlert2.

---

# Hasil Akhir

Pastikan aplikasi memiliki:

- Landing Page Saung Rasa
- Login Admin
- Dashboard modern
- CRUD Product lengkap
- Upload Gambar
- Validasi Form
- DataTables
- Search
- Pagination
- SweetAlert2
- Export PDF
- Seeder terpisah
- Responsive desktop, tablet, mobile
- Laravel 13 best practice

Seluruh kode harus lengkap, saling terhubung, tanpa placeholder atau TODO, serta siap dijalankan.
```
