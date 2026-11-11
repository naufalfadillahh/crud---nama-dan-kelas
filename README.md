# Aplikasi CRUD Nama dan Kota

Aplikasi web untuk menambah, menampilkan, mengubah, menghapus, mencari, dan mengurutkan data nama dan kota. Front-end HTML + JavaScript, back-end PHP + MySQL (XAMPP, database `kota_db`, tabel `pengguna`).

**Demo live:** https://crud-nama-kota-naufal.vercel.app

## Fitur

- Tambah dan ubah data dalam satu formulir, lengkap dengan mode edit dan tombol batal
- Hapus dengan konfirmasi, pencarian langsung, urutkan nama/kota naik-turun
- Notifikasi setiap aksi berhasil atau gagal, tampilan responsif di HP
- Keamanan: data ditampilkan dengan escape HTML (anti XSS) dan query PHP memakai prepared statement (anti SQL injection)

## Versi online (mode demo)

Vercel tidak menjalankan PHP + MySQL, jadi versi online memakai `api/demo.js` sebagai pengganti keempat file PHP. Data disimpan sementara di memori.

## Menjalankan lokal

1. Salin folder ke `C:\xampp\htdocs\crud_app`.
2. Import `schema.sql` lewat phpMyAdmin.
3. Buka `http://localhost/crud_app`.
