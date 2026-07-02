# WebSchools - PHP Student API (CRUD)

Rencana pembuatan RESTful API sederhana untuk manajemen data siswa menggunakan PHP Native dengan arsitektur MVC.

## 1. Spesifikasi Teknis & Ketentuan
- **Backend:** PHP Native (tanpa framework eksternal).
- **Format Data:** JSON (`Content-Type: application/json`).
- **Database:** MySQL/MariaDB (XAMPP).
- **Struktur Folder:** MVC (Model-View-Controller).
- **Frontend (Untuk Uji Coba):** HTML & CSS Vanilla (atau Tailwind CSS via CDN).

## 2. Struktur Folder & Endpoint Routing
Aplikasi akan menggunakan routing sederhana pada file `public/index.php` untuk memisahkan request API:

```text
webschools/
│
├── app/
│   ├── controllers/
│   │   └── ApiSiswaController.php   # Menangani logic request & response JSON
│   │
│   ├── models/
│   │   └── SiswaModel.php          # Menangani query CRUD ke database
│   │
│   └── views/
│       └── dashboard.php           # UI uji coba API (menggunakan fetch JavaScript)
│
├── config/
│   └── database.php                # Koneksi PDO ke database
│
└── public/
    ├── index.php                   # Router utama untuk endpoint API dan halaman web
    └── js/
        └── app.js                  # Script fetch API untuk frontend (opsional)
```

### Daftar Endpoint API (JSON)
1. **GET** `public/index.php?url=api/siswa` -> Mengambil semua data siswa.
2. **GET** `public/index.php?url=api/siswa/detail&id={id}` -> Mengambil satu data siswa berdasarkan ID.
3. **POST** `public/index.php?url=api/siswa/tambah` -> Menambah data siswa baru.
4. **POST** `public/index.php?url=api/siswa/ubah` -> Mengubah data siswa berdasarkan ID.
5. **POST** `public/index.php?url=api/siswa/hapus` -> Menghapus data siswa berdasarkan ID.

---

## 3. Alur Implementasi

### Tahap 1: Setup Model (`SiswaModel.php`)
Tambahkan method database dasar:
- `getAll()` -> `SELECT * FROM siswa`
- `getById($id)` -> `SELECT * FROM siswa WHERE id = :id`
- `create($data)` -> `INSERT INTO siswa ...`
- `update($id, $data)` -> `UPDATE siswa SET ... WHERE id = :id`
- `delete($id)` -> `DELETE FROM siswa WHERE id = :id`

### Tahap 2: Setup Controller (`ApiSiswaController.php`)
Controller bertugas menerima parameter, mengolah input (biasanya berupa JSON dari `file_get_contents('php://input')` atau `$_POST`), memanggil Model, lalu mengembalikan data berupa JSON:
```php
header('Content-Type: application/json');
echo json_encode($response);
```

### Tahap 3: Integrasi Router (`index.php`)
Arahkan URL `api/siswa/*` ke method yang bersesuaian di `ApiSiswaController`.

### Tahap 4: Halaman Uji Coba (Frontend / View)
Buat halaman HTML sederhana dengan Tailwind CSS CDN untuk menampilkan data dari API dan melakukan aksi Create, Update, Delete menggunakan JavaScript `fetch()`.

---

## 4. Panduan Implementasi
- Gunakan kode yang bersih dan mudah dibaca oleh junior developer atau model AI.
- Berikan penanganan error standar (misalnya: mengembalikan HTTP Status 400 jika input tidak valid, 404 jika data tidak ditemukan, dll).
