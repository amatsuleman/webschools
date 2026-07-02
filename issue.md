# WebSchools - Initial Project Plan

## 1. Teknologi yang Digunakan
- **Backend:** PHP (Native / tanpa framework yang rumit)
- **Frontend:** HTML, CSS
- **Database:** MySQL (MariaDB via Xampp)

## 2. Struktur Folder (Standard MVC)
Gunakan struktur *Model-View-Controller* (MVC) agar kode rapi dan mudah di-maintain:

```text
webschools/
│
├── app/                  # Folder utama untuk logika aplikasi
│   ├── controllers/      # Mengatur alur antara View dan Model
│   ├── models/           # Mengatur query ke database (CRUD)
│   └── views/            # Tampilan antarmuka (HTML/CSS)
│
├── config/               # File konfigurasi (koneksi database, dll)
│   └── database.php
│
├── public/               # File yang bisa diakses langsung oleh user
│   ├── css/              # File styling (style.css)
│   ├── images/           # Aset gambar
│   └── index.php         # Entry point utama aplikasi
│
└── .htaccess             # (Opsional) Untuk routing/URL yang lebih rapi
```

## 3. Tahapan Implementasi (Garis Besar)

### Tahap 1: Persiapan (Setup)
1. Buat struktur folder sesuai rancangan di atas.
2. Buat database `webschools_db` di phpMyAdmin (Xampp).
3. Buat file `config/database.php` untuk menghubungkan aplikasi PHP dengan database MySQL.
4. Setup `public/index.php` sebagai file yang pertama kali dijalankan saat aplikasi dibuka.

### Tahap 2: Pembuatan Fitur Dasar (Contoh: Data Siswa)
1. **Database:** Buat tabel `siswa` (id, nama, nis, kelas).
2. **Model:** Buat file `app/models/SiswaModel.php` yang berisi fungsi untuk mengambil (SELECT) dan menyimpan (INSERT) data ke database.
3. **Controller:** Buat file `app/controllers/SiswaController.php` untuk menerima *request*, memanggil `SiswaModel`, dan mengirim data ke View.
4. **View:** Buat file `app/views/siswa.php` berisi HTML untuk menampilkan tabel data siswa.

### Tahap 3: Desain dan Tampilan (UI/UX)
1. Buat file `public/css/style.css`.
2. Rapikan tampilan `views` menggunakan CSS dasar agar mudah dibaca dan interaktif.

## 4. Panduan untuk Programmer / AI
- Jaga kode tetap sederhana. Hindari penggunaan library eksternal jika fitur masih bisa dibuat dengan PHP Native.
- Fokus pada fungsionalitas utama terlebih dahulu (menampilkan, menambah, mengubah, dan menghapus data).
- Berikan komentar singkat pada setiap fungsi utama (Controller dan Model) agar mudah dipahami.
