<?php
// app/models/SiswaModel.php

class SiswaModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Get all students
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM siswa ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // Add a new student
    public function create($nama, $nis, $kelas) {
        $stmt = $this->db->prepare("INSERT INTO siswa (nama, nis, kelas) VALUES (:nama, :nis, :kelas)");
        return $stmt->execute([
            ':nama' => $nama,
            ':nis' => $nis,
            ':kelas' => $kelas
        ]);
    }
}
