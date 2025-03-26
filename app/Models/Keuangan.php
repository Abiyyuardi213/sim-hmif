<?php
include './config/db_connect.php';

class ModelKeuangan {
    
    public function getKeuangans() {
        global $conn;

        $sql = "SELECT * FROM tb_keuangan";
        $result = $conn->query($sql);

        $keuangans = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $keuangans[] = $row;
            }
        }
        return $keuangans;
    }

    public function getPemasukkan() {
        global $conn;
        $sql = "SELECT * FROM tb_keuangan WHERE jenis_transaksi = 'pemasukan'";
        $result = $conn->query($sql);
    
        $pemasukkan = [];
        while ($row = $result->fetch_assoc()) {
            $pemasukkan[] = $row;
        }
        return $pemasukkan;
    }

    public function getTotalPemasukkan() {
        global $conn;
        $sql = "SELECT SUM(jumlah) AS total FROM tb_keuangan WHERE jenis_transaksi = 'pemasukan'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['total'] ?? 0; // Mengembalikan total pemasukkan sebagai angka
    }

    public function getPengeluaran() {
        global $conn;
        $sql = "SELECT * FROM tb_keuangan WHERE jenis_transaksi = 'pengeluaran'";
        $result = $conn->query($sql);

        $pengeluaran = [];
        while ($row = $result->fetch_assoc()) {
            $pengeluaran[] = $row;
        }
        return $pengeluaran;
    }

    public function searchKeuangan($keyword) {
        global $conn;

        $sql = "SELECT * FROM tb_keuangan WHERE deskripsi LIKE ? OR kategori LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%" . $keyword . "%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        $keuangans = [];
        while ($row = $result->fetch_assoc()) {
            $keuangans[] = $row;
        }
        return $keuangans;
    }

    public function getKeuanganById($keuangan_id) {
        global $conn;

        $sql = "SELECT * FROM tb_keuangan WHERE keuangan_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $keuangan_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function addPemasukkan($deskripsi, $jumlah, $anggota_id, $sumber_dana, $kategori) {
        global $conn;
    
        if ($jumlah <= 0) {
            return false;
        }
    
        $sql = "INSERT INTO tb_keuangan (jenis_transaksi, deskripsi, jumlah, anggota_id, sumber_dana, kategori) VALUES ('pemasukan', ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdiss", $deskripsi, $jumlah, $anggota_id, $sumber_dana, $kategori);
    
        return $stmt->execute();
    }

    public function addPengeluaran($deskripsi, $jumlah, $anggota_id, $sumber_dana, $kategori) {
        global $conn;
    
        if ($jumlah <= 0) {
            return false;
        }
    
        $sql = "INSERT INTO tb_keuangan (jenis_transaksi, deskripsi, jumlah, anggota_id, sumber_dana, kategori) VALUES ('pengeluaran', ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdiss", $deskripsi, $jumlah, $anggota_id, $sumber_dana, $kategori);
    
        return $stmt->execute();
    }

    public function updateKeuangan($keuangan_id, $deskripsi, $jumlah, $sumber_dana, $kategori) {
        global $conn;

        $sql = "UPDATE tb_keuangan SET deskripsi = ?, jumlah = ?, sumber_dana = ?, kategori = ? WHERE keuangan_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdssi", $deskripsi, $jumlah, $sumber_dana, $kategori, $keuangan_id);

        return $stmt->execute();
    }

    public function deleteKeuangan($keuangan_id) {
        global $conn;

        $sql = "DELETE FROM tb_keuangan WHERE keuangan_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $keuangan_id);

        return $stmt->execute();
    }

    public function getTotalSaldo() {
        global $conn;

        $sql = "SELECT 
                    SUM(CASE WHEN jenis_transaksi = 'pemasukan' THEN jumlah ELSE 0 END) 
                    - 
                    SUM(CASE WHEN jenis_transaksi = 'pengeluaran' THEN jumlah ELSE 0 END) 
                    AS total_saldo 
                FROM tb_keuangan";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        return $row['total_saldo'] ?? 0;
    }

    public function getKeuanganByJenis($jenis) {
        global $conn;

        $sql = "SELECT * FROM tb_keuangan WHERE jenis_transaksi = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $jenis);
        $stmt->execute();
        $result = $stmt->get_result();

        $keuangans = [];
        while ($row = $result->fetch_assoc()) {
            $keuangans[] = $row;
        }

        return $keuangans;
    }

    public function bayarKas($anggota_id, $jumlah, $keterangan) {
        global $conn;
    
        if ($jumlah <= 0) {
            return false;
        }
    
        $conn->begin_transaction();
    
        try {
            $check_sql = "SELECT anggota_id FROM tb_anggota WHERE anggota_id = ?";
            $stmt = $conn->prepare($check_sql);
            $stmt->bind_param("i", $anggota_id);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows === 0) {
                throw new Exception("Anggota tidak ditemukan.");
            }

            $sql = "INSERT INTO tb_pembayaran_kas (anggota_id, jumlah, keterangan) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ids", $anggota_id, $jumlah, $keterangan);
            if (!$stmt->execute()) {
                throw new Exception("Gagal memasukkan pembayaran kas.");
            }
    
            $sql = "INSERT INTO tb_kas_anggota (anggota_id, saldo) 
                    VALUES (?, ?) 
                    ON DUPLICATE KEY UPDATE saldo = saldo + VALUES(saldo)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("id", $anggota_id, $jumlah);
            if (!$stmt->execute()) {
                throw new Exception("Gagal memperbarui saldo kas anggota.");
            }
    
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }
    
    public function getSaldoAnggota($anggota_id) {
        global $conn;
    
        $sql = "SELECT saldo FROM tb_kas_anggota WHERE anggota_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $anggota_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $row = $result->fetch_assoc();
        return $row['saldo'] ?? 0;
    }
    
    public function getTotalKasKeseluruhan() {
        global $conn;
    
        $sql = "SELECT SUM(saldo) AS total_kas FROM tb_kas_anggota";
        $result = $conn->query($sql);
    
        $row = $result->fetch_assoc();
        return $row['total_kas'] ?? 0;
    }

    public function getRiwayatPembayaranKas($anggota_id) {
        global $conn;
    
        $sql = "SELECT * FROM tb_pembayaran_kas WHERE anggota_id = ? ORDER BY tanggal_pembayaran DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $anggota_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $pembayaran = [];
        while ($row = $result->fetch_assoc()) {
            $pembayaran[] = $row;
        }
    
        return $pembayaran;
    }
}
?>
