<?php
include './config/db_connect.php';

class ModelAnggota {
    public function getAnggotas() {
        global $conn;
        
        $sql = "SELECT 
                    a.anggota_id,
                    a.anggota_npm,
                    a.anggota_nama,
                    a.anggota_email,
                    a.anggota_phone,
                    a.anggota_status, 
                    a.profile_picture, 
                    d.divisi_id, 
                    d.divisi_name, 
                    r.role_id, 
                    r.role_name
                FROM tb_anggota a
                LEFT JOIN tb_divisi d ON a.divisi_id = d.divisi_id
                LEFT JOIN tb_role r ON a.role_id = r.role_id";
        
        $result = $conn->query($sql);
        $anggotas = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $anggotas[] = $row;
            }
        }
        return $anggotas;
    }

    public function getAnggotaById($anggota_id) {
        global $conn;
        
        $sql = "SELECT 
            a.anggota_id,
            a.anggota_npm, 
            a.anggota_nama,
            a.anggota_email, 
            a.anggota_phone,
            a.anggota_status,
            a.profile_picture, 
            d.divisi_id, 
            d.divisi_name, 
            r.role_id, 
            r.role_name
        FROM tb_anggota a
        LEFT JOIN tb_divisi d ON a.divisi_id = d.divisi_id
        LEFT JOIN tb_role r ON a.role_id = r.role_id
        WHERE a.anggota_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $anggota_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getDetailAnggota($anggota_id) {
        global $conn;
        
        $sql = "SELECT 
                    a.anggota_id,
                    a.anggota_npm, 
                    a.anggota_nama,
                    a.anggota_email, 
                    a.anggota_phone,
                    a.anggota_status,
                    a.profile_picture, 
                    d.divisi_id, 
                    d.divisi_name, 
                    r.role_id, 
                    r.role_name
                FROM tb_anggota a
                LEFT JOIN tb_divisi d ON a.divisi_id = d.divisi_id
                LEFT JOIN tb_role r ON a.role_id = r.role_id
                WHERE a.anggota_id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $anggota_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addAnggota($anggota_npm, $anggota_nama, $anggota_email, $anggota_phone, $anggota_status, $divisi_id, $role_id, $profile_picture = null) {
        global $conn;
    
        if ($divisi_id === null) {
            return "Error: divisi_id tidak boleh NULL.";
        }
        
        $sql = "INSERT INTO tb_anggota (anggota_npm, anggota_nama, anggota_email, anggota_phone, anggota_status, profile_picture, divisi_id, role_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssisii", $anggota_npm, $anggota_nama, $anggota_email, $anggota_phone, $anggota_status, $profile_picture, $divisi_id, $role_id);
    
        return $stmt->execute();
    }

    public function updateAnggota($anggota_npm, $anggota_id, $anggota_nama, $anggota_email, $anggota_phone, $anggota_status, $divisi_id, $role_id, $profile_picture = null) {
        global $conn;
    
        $setFields = "anggota_npm = ?, anggota_nama = ?, anggota_email = ?, anggota_phone = ?, anggota_status = ?, divisi_id = ?, role_id = ?";
        $params = [$anggota_npm, $anggota_nama, $anggota_email, $anggota_phone, $anggota_status, $divisi_id, $role_id];
    
        if (!empty($profile_picture)) {
            $setFields .= ", profile_picture = ?";
            $params[] = $profile_picture;
        }
    
        $params[] = $anggota_id;
        $sql = "UPDATE tb_anggota SET $setFields WHERE anggota_id = ?";
    
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing query: " . $conn->error);
        }
    
        $types = str_repeat('s', count($params) - 1) . 'i';
        $stmt->bind_param($types, ...$params);
    
        if (!$stmt->execute()) {
            die("Error executing query: " . $stmt->error);
        }
    
        return true;
    }

    public function deleteAnggota($anggota_id) {
        global $conn;
        $sql = "DELETE FROM tb_anggota WHERE anggota_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $anggota_id);
        return $stmt->execute();
    }

    public function searchAnggotaByName($searchTerm) {
        global $conn;
        $sql = "SELECT * FROM tb_anggota WHERE anggota_nama LIKE ?";
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

    public function getAllAnggota() {
        global $conn;
        $sql = "SELECT 
                    a.anggota_id,
                    a.anggota_npm,
                    a.anggota_nama, 
                    a.anggota_email, 
                    a.anggota_phone,
                    a.anggota_status, 
                    d.divisi_name, 
                    r.role_name
                FROM tb_anggota a
                LEFT JOIN tb_divisi d ON a.divisi_id = d.divisi_id
                LEFT JOIN tb_role r ON a.role_id = r.role_id";
        
        $result = $conn->query($sql);
        $anggotas = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $anggotas[] = $row;
            }
        }
        return $anggotas;
    }

    public function getAnggotaForPDF() {
        global $conn;
        
        $sql = "SELECT 
                    a.anggota_id,
                    a.anggota_npm,
                    a.anggota_nama,
                    a.anggota_email, 
                    a.anggota_phone,
                    a.anggota_status, 
                    d.divisi_name, 
                    r.role_name
                FROM tb_anggota p
                LEFT JOIN tb_divisi d ON a.divisi_id = d.divisi_id
                LEFT JOIN tb_role r ON a.role_id = r.role_id";
        
        $result = $conn->query($sql);
        $anggotas = [];
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $anggotas[] = $row;
            }
        }
        return $anggotas;
    }    
}