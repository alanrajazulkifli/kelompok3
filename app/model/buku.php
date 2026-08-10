<?php
class buku{
    private $conn;
    private $table_name = "tb_peminjaman";

    public $id;
    public $buku_id;
    public $peminjaman;
    public $tgl_jatuh_tempo;
    public $status;

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
        $query = "INSERT INTO " . $this->table_name . " (buku_id, peminjaman, tgl_jatuh_tempo, status) VALUES (:buku_id, :peminjaman, :tgl_jatuh_tempo, :status)";
        $stmt = $this->conn->prepare($query);
        $this->buku_id = htmlspecialchars(strip_tags($this->buku_id));
        $this->peminjaman = htmlspecialchars(strip_tags($this->peminjaman));
        $this->tgl_jatuh_tempo = htmlspecialchars(strip_tags($this->tgl_jatuh_tempo));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $stmt->bindParam(":buku_id", $this->buku_id);
        $stmt->bindParam(":peminjaman", $this->peminjaman);
        $stmt->bindParam(":tgl_jatuh_tempo", $this->tgl_jatuh_tempo);
        $stmt->bindParam(":status", $this->status);
        if($stmt->execute()) {
            return true;
        }
        return false;
}
}