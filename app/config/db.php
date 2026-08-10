<?php
class database {
    private  $host = "localhost";
    private  $db = "db_perpustakaan";
    private  $username = "root";
    private  $pw = "rpl12345";
    private  $conn = null;

    public function getConnection(): ?PDO {
        if ($this->conn === null) {
            try {
              $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db,
                $this->username,
                $this->pw
              );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo json_encode(["error" => "koneksi database gagal" . $e->getMessage()]);
                exit;
            }
        }
        return $this->conn;
    }
}
?>
