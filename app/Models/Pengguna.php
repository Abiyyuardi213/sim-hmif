<?php
include './config/db_connect.php';

class ModelPengguna {
    public function getPenggunas() {
        global $conn;
        
        $sql = "SELECT 
                    p.id_user, 
                    p.nama_user, 
                    p.email_user, 
                    p.username, 
                    p.password,
                    p.profile_picture, 
                    r.role_id, 
                    r.role_name
                FROM tb_pengguna p
                LEFT JOIN tb_role r ON p.role_id = r.role_id";
        
        $result = $conn->query($sql);
        $penggunas = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $penggunas[] = $row;
            }
        }
        return $penggunas;
    }

    public function getPenggunaById($id_user) {
        global $conn;
        
        $sql = "SELECT 
            p.id_user, 
            p.nama_user,
            p.email_user, 
            p.username, 
            p.password,
            p.profile_picture,
            r.role_id, 
            r.role_name
        FROM tb_pengguna p
        LEFT JOIN tb_role r ON p.role_id = r.role_id
        WHERE p.id_user = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getDetailPengguna($id_user) {
        global $conn;
        
        $sql = "SELECT 
                    p.id_user, 
                    p.nama_user,
                    p.email_user, 
                    p.username, 
                    p.password, 
                    p.profile_picture, 
                    r.role_id, 
                    r.role_name
                FROM tb_pengguna p
                LEFT JOIN tb_role r ON p.role_id = r.role_id
                WHERE p.id_user = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addPengguna($nama_user, $email_user, $username, $password, $role_id, $profile_picture = null) {
        global $conn;
    
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO tb_pengguna (nama_user, email_user, username, password, profile_picture, role_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $nama_user, $email_user, $username, $hashed_password, $profile_picture, $role_id);
    
        return $stmt->execute();
    }

    public function updatePengguna($id_user, $nama_user, $email_user, $username, $password, $role_id, $profile_picture = null) {
        global $conn;
    
        $setFields = "nama_user = ?, email_user = ?, username = ?, role_id = ?";
        $params = [$nama_user, $email_user, $username, $role_id];
    
        if (!empty($password)) {
            $setFields .= ", password = ?";
            $params[] = password_hash($password, PASSWORD_DEFAULT);
        }
    
        if (!empty($profile_picture)) {
            $setFields .= ", profile_picture = ?";
            $params[] = $profile_picture;
        }
    
        $params[] = $id_user;
        $sql = "UPDATE tb_pengguna SET $setFields WHERE id_user = ?";
    
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

    public function deletePengguna($id_user) {
        global $conn;
        $sql = "DELETE FROM tb_pengguna WHERE id_user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_user);
        return $stmt->execute();
    }

    public function searchPenggunaByName($searchTerm) {
        global $conn;
        $sql = "SELECT * FROM tb_pengguna WHERE nama_user LIKE ?";
        $stmt = $conn->prepare($sql);
        $likeTerm = "%$searchTerm%";
        $stmt->bind_param("s", $likeTerm);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $penggunas = [];
        while ($row = $result->fetch_assoc()) {
            $penggunas[] = $row;
        }
        return $penggunas;
    }

    public function getAllPengguna() {
        global $conn;
        $sql = "SELECT 
                    p.id_user, 
                    p.nama_user, 
                    p.email_user, 
                    p.username,
                    r.role_name
                FROM tb_pengguna p
                LEFT JOIN tb_role r ON p.role_id = r.role_id";
        
        $result = $conn->query($sql);
        $penggunas = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $penggunas[] = $row;
            }
        }
        return $penggunas;
    }

    public function loginPengguna($username, $password) {
        global $conn;

        $sql = "SELECT p.id_user, p.nama_user, p.email_user, p.username, p.password, p.profile_picture, r.role_id, r.role_name
                FROM tb_pengguna p
                LEFT JOIN tb_role r ON p.role_id = r.role_id
                WHERE p.username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $pengguna = $result->fetch_assoc();

        if ($pengguna && password_verify($password, $pengguna['password'])) {
            return $pengguna;
        }

        return null;
    }

    // public function getPegawaiForPDF() {
    //     global $conn;
        
    //     $sql = "SELECT 
    //                 p.pegawai_id, 
    //                 p.pegawai_name, 
    //                 p.username, 
    //                 p.pegawai_email, 
    //                 p.pegawai_phone,
    //                 p.pegawai_status, 
    //                 d.divisi_name, 
    //                 o.daop_name, 
    //                 r.role_name
    //             FROM tb_pegawai p
    //             LEFT JOIN tb_divisi d ON p.divisi_id = d.divisi_id
    //             LEFT JOIN tb_daop o ON p.daop_id = o.daop_id
    //             LEFT JOIN tb_role r ON p.role_id = r.role_id";
        
    //     $result = $conn->query($sql);
    //     $pegawais = [];
    
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $pegawais[] = $row;
    //         }
    //     }
    //     return $pegawais;
    // }    
}
