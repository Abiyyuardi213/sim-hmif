<?php
include './config/db_connect.php';

class ModelPengumuman {
    public function getPengumuman() {
        global $conn;
        $sql = "SELECT * FROM tb_pengumuman";
        $result = $conn->query($sql);

        $pengumumans = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pengumumans[] = $row;
            }
        }
        return $pengumumans;
    }

    public function getPengumumanById($pengumuman_id) {
        global $conn;
        $sql = "SELECT * FROM tb_pengumuman WHERE pengumuman_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $pengumuman_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function createPengumuman($judul, $isi, $author_id, $status = 'draft') {
        global $conn;
    
        // Cek apakah author_id ada di tb_pegawai
        $cekQuery = "SELECT id_user FROM tb_pengguna WHERE id_user = ?";
        $cekStmt = $conn->prepare($cekQuery);
        $cekStmt->bind_param("i", $author_id);
        $cekStmt->execute();
        $cekResult = $cekStmt->get_result();
    
        if ($cekResult->num_rows == 0) {
            return false; // Jika tidak ada, hentikan proses
        }
    
        $sql = "INSERT INTO tb_pengumuman (judul, isi, author_id, status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $judul, $isi, $author_id, $status);
        return $stmt->execute();
    }

    public function updatePengumuman($pengumuman_id, $judul, $isi, $status) {
        global $conn;
        $sql = "UPDATE tb_pengumuman SET judul = ?, isi = ?, status = ?, tanggal_diperbarui = NOW() WHERE pengumuman_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $judul, $isi, $status, $pengumuman_id);
        return $stmt->execute();
    }

    public function deletePengumuman($pengumuman_id) {
        global $conn;
        $sql = "DELETE FROM tb_pengumuman WHERE pengumuman_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $pengumuman_id);
        return $stmt->execute();
    }

    public function getAllPengumuman() {
        return $this->getPengumuman();
    }
}