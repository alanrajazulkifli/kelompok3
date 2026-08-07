<?php

class BukuController {
    private $bukuModel;

    public function __construct() {
        $this->bukuModel = new BukuModel();
    }

    public function getAllBuku() {
        $buku = $this->bukuModel->getAllBuku();
        return json_encode($buku);
    }

    public function storeBuku($data) {
        $result = $this->bukuModel->storeBuku($data);
        return json_encode($result);
    }

    public function deleteBuku($id) {
        $result = $this->bukuModel->deleteBuku($id);
        return json_encode($result);
    }
}