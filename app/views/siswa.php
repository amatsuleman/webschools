<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSchools - Data Siswa</title>
    <!-- Use Outfit font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="app-container">
        <header>
            <div class="logo">
                <span class="gradient-text">WebSchools</span>
            </div>
            <p class="subtitle">Sistem Informasi Manajemen Siswa Sederhana (MVC PHP)</p>
        </header>

        <main class="dashboard-grid">
            <!-- Form Card -->
            <section class="card form-card">
                <h2>Tambah Siswa Baru</h2>
                <form action="index.php?url=siswa/tambah" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama siswa" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS (Nomor Induk Siswa)</label>
                        <input type="text" id="nis" name="nis" placeholder="Masukkan NIS unik" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" id="kelas" name="kelas" placeholder="Contoh: XII RPL 1" required autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </section>

            <!-- Table Card -->
            <section class="card table-card">
                <h2>Daftar Siswa</h2>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($data_siswa)): ?>
                                <tr>
                                    <td colspan="4" class="empty-state">Belum ada data siswa. Silakan tambahkan melalui form di samping.</td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1; foreach ($data_siswa as $siswa): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="font-semibold"><?= htmlspecialchars($siswa['nama']); ?></td>
                                        <td><span class="badge"><?= htmlspecialchars($siswa['nis']); ?></span></td>
                                        <td><?= htmlspecialchars($siswa['kelas']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
