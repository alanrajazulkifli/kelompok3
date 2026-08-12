<?php
class Peminjaman{
    private $conn;
    private $table_name = "tb_peminjaman";

    public $id;
    public $nama;
    public $id_buku;
    public $tgl_pinjam;
    public $created_at;

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
        $query = "INSERT INTO " . $this->table_name . " (nama, id_buku, tgl_pinjam, created_at) VALUES (:nama, :id_buku, :tgl_pinjam, :created_at)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":id_buku", $this->id_buku);
        $stmt->bindParam(":tgl_pinjam", $this->tgl_pinjam);
        $stmt->bindParam(":created_at", $this->created_at);

        if($stmt->execute()) {
            return true;
        }
        return false;
}
}
?>
