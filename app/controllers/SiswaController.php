<?php
// app/controllers/SiswaController.php

class SiswaController {
    private $model;

    public function __construct() {
        $this->model = new SiswaModel();
    }

    // Display list of students
    public function index() {
        $data_siswa = $this->model->getAll();
        // Load the view and pass the data
        require_once __DIR__ . '/../views/siswa.php';
    }

    // Handle adding a student
    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'] ?? '';
            $nis = $_POST['nis'] ?? '';
            $kelas = $_POST['kelas'] ?? '';

            if (!empty($nama) && !empty($nis) && !empty($kelas)) {
                $this->model->create($nama, $nis, $kelas);
            }
            // Redirect back to main student page
            header('Location: index.php?url=siswa');
            exit;
        }
    }
}
