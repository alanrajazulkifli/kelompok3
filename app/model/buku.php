<?php
class buku{
    private $conn;
    private $table_name = "tb_buku";

    public $id;
    public $isbn;
    public $judul;
    public $kategori;
    public $stok_tersedia;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
     public function create() {
        $query = "INSERT INTO " . $this->table_name . " (isbn, judul, kategori, stok_tersedia) VALUES (:isbn, :judul, :kategori, :stok_tersedia)";
        $stmt = $this->conn->prepare($query);
        $this->isbn = htmlspecialchars(strip_tags($this->isbn));
        $this->judul = htmlspecialchars(strip_tags($this->judul));
        $this->kategori = htmlspecialchars(strip_tags($this->kategori));
        $this->stok_tersedia = htmlspecialchars(strip_tags($this->stok_tersedia));
        $stmt->bindParam(":isbn", $this->isbn);
        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":kategori", $this->kategori);
        $stmt->bindParam(":stok_tersedia", $this->stok_tersedia);
        if($stmt->execute()) {
            return true;
        }
        return false;
}
}