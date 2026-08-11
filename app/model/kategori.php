<?php

class Kategori {
    private $conn;
    private $table_name = "tb_kategori";
    public $id;
    public $nama_kategori;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        return $stmt;
    }

    public function create() {
            // Gunakan properti nama_kategori yang sudah dideklarasikan
            $query = "INSERT INTO " . $this->table_name . " (kategori) VALUES (:kategori)";
            $stmt = $this->conn->prepare($query);
            $this->nama_kategori = htmlspecialchars(strip_tags($this->nama_kategori));
            $stmt->bindParam(":kategori", $this->nama_kategori);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
}

?>