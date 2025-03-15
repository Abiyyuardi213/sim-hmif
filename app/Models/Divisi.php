<?php
include './config/db_connect.php';

class ModelDivisi {
    public function getDivisis() {
        global $conn;
        $sql = "SELECT * FROM tb_divisi";
        $result = $conn->query($sql);

        $divisis = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $divisis[] = $row;
            }
        }
        return $divisis;
    }

    public function getDivisiById($divisi_id) {
        global $conn;
        $sql = "SELECT * FROM tb_divisi WHERE divisi_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $divisi_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addDivisi($divisi_name, $divisi_description, $divisi_status) {
        global $conn;
        $sql = "INSERT INTO tb_divisi (divisi_name, divisi_description, divisi_status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $divisi_name, $divisi_description, $divisi_status);
        return $stmt->execute();
    }

    public function updateDivisi($divisi_id, $divisi_name, $divisi_description, $divisi_status) {
        global $conn;
        $sql = "UPDATE tb_divisi SET divisi_name = ?, divisi_description = ?, divisi_status = ? WHERE divisi_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $divisi_name, $divisi_description, $divisi_status, $divisi_id);
        return $stmt->execute();
    }

    public function deteteDivisi($divisi_id) {
        global $conn;
        $sqlCheck = "SELECT COUNT(*) AS count FROM tb_anggota WHERE divisi_id = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("i", $divisi_id);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        $count = $result->fetch_assoc()['count'];

        if ($count > 0) {
            return ['success' => false, 'error' => 'Divisi tidak bisa dihapus karena masih digunakan oleh user'];
        }

        $sql = "DELETE FROM tb_divisi WHERE divisi_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $divisi_id);
        // return $stmt->execute();

        if ($stmt->execute()) {
            return ['success' => true];
        }

        return ['success' => false, 'error' => 'Gagal menghapus divisi'];
    }

    public function searchDivisiByName($searchTerm) {
        global $conn;
        $sql = "SELECT * FROM tb_divisi WHERE divisi_name LIKE ?";
        $stmt = $conn->prepare($sql);
        $likeTerm = "%$searchTerm%";
        $stmt->bind_param("s", $likeTerm);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $roles = [];
        while ($row = $result->fetch_assoc()) {
            $roles[] = $row;
        }
        return $roles;
    }

    public function getAllDivisis() {
        return $this->getDivisis();
    }
}