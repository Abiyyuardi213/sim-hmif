<?php
include './config/db_connect.php';

class ModelProker {
    public function getProkers() {
        global $conn;

        $sql = "SELECT * FROM tb_proker";
        $result = $conn->query($sql);
        
        $prokers = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $prokers[] = $row;
            }
        }
        return $prokers;
    }

    public function getProkerById($proker_id) {
        global $conn;

        $sql = "SELECT * FROM tb_proker WHERE proker_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $proker_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }

    public function getDetailProker($proker_id) {
        global $conn;

        $sql = "SELECT p.*, 
                       k.anggota_nama AS ketua_nama, 
                       s.anggota_nama AS sekertaris_nama
                FROM tb_proker p
                LEFT JOIN tb_anggota k ON p.ketua_id = k.anggota_id
                LEFT JOIN tb_anggota s ON p.sekertaris_id = s.anggota_id
                WHERE p.proker_id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $proker_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }

    public function getTotalProker() {
        global $conn;
        $sql = "SELECT COUNT(*) as total FROM tb_proker";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }

    public function addProker($proker_nama, $proker_deskripsi, $proker_tanggal, $ketua_id, $sekertaris_id, $data_anggota, $proker_status) {
        global $conn;

        $jumlah_anggota = count(explode(",", $data_anggota));
        $sql = "INSERT INTO tb_proker (proker_nama, proker_deskripsi, proker_tanggal, ketua_id, sekertaris_id, jumlah_anggota, data_anggota, proker_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiisis", $proker_nama, $proker_deskripsi, $proker_tanggal, $ketua_id, $sekertaris_id, $jumlah_anggota, $data_anggota, $proker_status);
        
        return $stmt->execute();
    }

    public function updateProker($proker_id, $proker_nama, $proker_deskripsi, $proker_tanggal, $ketua_id, $sekertaris_id, $data_anggota, $proker_status) {
        global $conn;

        $jumlah_anggota = count(explode(",", $data_anggota)); // Hitung jumlah anggota dari daftar ID
        $sql = "UPDATE tb_proker 
                SET proker_nama = ?, proker_deskripsi = ?, proker_tanggal = ?, ketua_id = ?, sekertaris_id = ?, jumlah_anggota = ?, data_anggota = ?, proker_status = ? 
                WHERE proker_id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiisisi", $proker_nama, $proker_deskripsi, $proker_tanggal, $ketua_id, $sekertaris_id, $jumlah_anggota, $data_anggota, $proker_status, $proker_id);
        
        return $stmt->execute();
    }

    public function deleteProker($proker_id) {
        global $conn;

        $sql = "DELETE FROM tb_proker WHERE proker_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $proker_id);
        
        return $stmt->execute();
    }

    public function searchProkerByName($searchTerm) {
        global $conn;

        $sql = "SELECT * FROM tb_proker WHERE proker_nama LIKE ?";
        $stmt = $conn->prepare($sql);
        $likeTerm = "%$searchTerm%";
        $stmt->bind_param("s", $likeTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        $prokers = [];
        while ($row = $result->fetch_assoc()) {
            $prokers[] = $row;
        }
        return $prokers;
    }

    public function getAllProker() {
        return $this->getProkers();
    }

    public function getProkerForPDF() {
        global $conn;

        $sql = "SELECT p.*, 
                       k.anggota_nama AS ketua_nama, 
                       s.anggota_nama AS sekertaris_nama
                FROM tb_proker p
                LEFT JOIN tb_anggota k ON p.ketua_id = k.anggota_id
                LEFT JOIN tb_anggota s ON p.sekertaris_id = s.anggota_id";

        $result = $conn->query($sql);
        $prokers = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $prokers[] = $row;
            }
        }
        return $prokers;
    }
}
