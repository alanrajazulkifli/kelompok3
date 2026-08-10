<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Buku.php';

class BukuController {
    private $db;
    private $buku;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->buku = new Buku($this->db);
    }

    public function getAll() {
        $stmt = $this->buku->read();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(["status" => "success", "data" => $items]);
    }

    public function create($data) {
        if (empty($data->isbn) || empty($data->judul) || empty($data->kategori) || !isset($data->stok)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Semua field wajib diisi!"]);
            return;
        }

        if ($this->buku->isIsbnExists($data->isbn)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Kode ISBN sudah terdaftar!"]);
            return;
        }

        $this->buku->isbn = $data->isbn;
        $this->buku->judul = $data->judul;
        $this->buku->kategori = $data->kategori;
        $this->buku->stok = $data->stok;

        if ($this->buku->create()) {
            echo json_encode(["status" => "success", "message" => "Buku berhasil ditambahkan."]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Gagal menambahkan buku."]);
        }
    }

    public function update($data) {
        if (empty($data->id) || empty($data->isbn) || empty($data->judul) || empty($data->kategori) || !isset($data->stok)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Data edit tidak lengkap!"]);
            return;
        }

        if ($this->buku->isIsbnExists($data->isbn, $data->id)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Kode ISBN sudah digunakan buku lain!"]);
            return;
        }

        $this->buku->id = $data->id;
        $this->buku->isbn = $data->isbn;
        $this->buku->judul = $data->judul;
        $this->buku->kategori = $data->kategori;
        $this->buku->stok = $data->stok;

        if ($this->buku->update()) {
            echo json_encode(["status" => "success", "message" => "Buku berhasil diperbarui."]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Gagal memperbarui buku."]);
        }
    }

    public function delete($data) {
        if (empty($data->id)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "ID tidak ditemukan!"]);
            return;
        }

        $this->buku->id = $data->id;
        if ($this->buku->delete()) {
            echo json_encode(["status" => "success", "message" => "Buku berhasil dihapus."]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Gagal menghapus buku."]);
        }
    }
}