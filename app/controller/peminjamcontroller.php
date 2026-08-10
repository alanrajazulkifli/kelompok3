<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Peminjam.php';

class bukucontroller{
    
    private $db;
    private $peminjam;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->peminjam = new Peminjam($this->db);
    }

    public function getAll() {
        $stmt = $this->peminjam->read();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(["status" => "success", "data" => $items]);
    }

    public function create($data) {
        if (empty($data->nama) || empty($data->alamat) || empty($data->no_telp)) {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Semua field wajib diisi!"]);
            return;
        }

        $this->peminjam->nama = $data->nama;
        $this->peminjam->alamat = $data->alamat;
        $this->peminjam->no_telp = $data->no_telp;

        if ($this->peminjam->create()) {
            echo json_encode(["status" => "success", "message" => "Peminjam berhasil ditambahkan."]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Gagal menambahkan peminjam."]);
        }
    }
}