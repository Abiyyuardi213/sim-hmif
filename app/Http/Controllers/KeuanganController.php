<?php
include './app/Models/Keuangan.php';
include './app/Models/Anggota.php';

class ControllerKeuangan {
    private $modelKeuangan;
    private $modelAnggota;

    public function __construct() {
        $this->modelKeuangan = new ModelKeuangan();
        $this->modelAnggota = new ModelAnggota();
    }

    public function handleRequestKeuangan($fitur) {
        switch ($fitur) {
            case 'dashboard':
                $this->DashboardKeuangan();
                break;
            case 'tambah-pemasukkan':
                $this->tambahPemasukkan();
                break;
            case 'tambah-pengeluaran':
                $this->tambahPengeluaran();
                break;
            case 'list':
                $this->listKeuangan();
                break;
            case 'pemasukkan':
                $this->listPemasukkan();
                break;
            case 'pengeluaran':
                $this->listPengeluaran();
                break;
            case 'detail':
                $keuangan_id = $_GET['keuangan_id'] ?? null;
                if ($keuangan_id) {
                    $this->detailKeuangan($keuangan_id);
                } else {
                    header("Location: index.php?modul=keuangan&fitur=list&message=ID tidak valid");
                }
                break;
            case 'detail-pemasukkan':
                $keuangan_id = $_GET['keuangan_id'] ?? null;
                if ($keuangan_id) {
                    $this->detailPemasukkan($keuangan_id);
                } else {
                    header("Location: index.php?modul=keuangan&fitur=list&message=ID tidak valid");
                }
                break;
            case 'hapus-pemasukkan':
                $keuangan_id = $_GET['keuangan_id'] ?? null;
                if ($keuangan_id) {
                    $this->hapusPemasukkan($keuangan_id);
                }
                break;
            case 'hapus-pengeluaran':
                $keuangan_id = $_GET['keuangan_id'] ?? null;
                if ($keuangan_id) {
                    $this->hapusPengeluaran($keuangan_id);
                }
                break;
            case 'hapus':
                $keuangan_id = $_GET['keuangan_id'] ?? null;
                if ($keuangan_id) {
                    $this->hapusKeuangan($keuangan_id);
                }
                break;
        }
    }

    public function tambahPemasukkan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deskripsi = $_POST['deskripsi'] ?? '';
            $jumlah = $_POST['jumlah'] ?? 0;
            $anggota_id = $_POST['anggota_id'] ?? null;
            $sumber_dana = $_POST['sumber_dana'] ?? '';
            $kategori = $_POST['kategori'] ?? '';

            if (empty($deskripsi) || empty($sumber_dana) || empty($kategori) || $jumlah <= 0) {
                header("Location: index.php?modul=keuangan&fitur=tambah-pemasukkan&message=Data tidak valid");
                exit();
            }

            try {
                if ($this->modelKeuangan->addPemasukkan($deskripsi, $jumlah, $anggota_id, $sumber_dana, $kategori)) {
                    header("Location: index.php?modul=keuangan&fitur=pemasukkan&message=Pemasukan Berhasil Ditambahkan");
                } else {
                    header("Location: index.php?modul=keuangan&fitur=tambah-pemasukkan&message=Gagal Menambahkan Pemasukan");
                }
            } catch (Exception $e) {
                header("Location: index.php?modul=keuangan&fitur=tambah-pemasukkan&message=" . $e->getMessage());
            }
            exit();
        }
        $anggota = $this->modelAnggota->getAllAnggota();
        include './resources/views/keuangan/KeuanganAddPemasukkan.php';
    }

    public function tambahPengeluaran() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deskripsi = $_POST['deskripsi'] ?? '';
            $jumlah = $_POST['jumlah'] ?? 0;
            $anggota_id = $_POST['anggota_id'] ?? null;
            $sumber_dana = $_POST['sumber_dana'] ?? '';
            $kategori = $_POST['kategori'] ?? '';

            if (empty($deskripsi) || empty($sumber_dana) || empty($kategori) || $jumlah <= 0) {
                header("Location: index.php?modul=keuangan&fitur=tambah-pengeluaran&message=Data tidak valid");
                exit();
            }

            try {
                if ($this->modelKeuangan->addPengeluaran($deskripsi, $jumlah, $anggota_id, $sumber_dana, $kategori)) {
                    header("Location: index.php?modul=keuangan&fitur=pengeluaran&message=Pengeluaran Berhasil Ditambahkan");
                } else {
                    header("Location: index.php?modul=keuangan&fitur=tambah-pengeluaran&message=Gagal Menambahkan Pengeluaran");
                }
            } catch (Exception $e) {
                header("Location: index.php?modul=keuangan&fitur=tambah-pengeluaran&message=" . $e->getMessage());
            }
            exit();
        }
        $anggota = $this->modelAnggota->getAllAnggota();
        include './resources/views/keuangan/KeuanganAddPengeluaran.php';
    }

    public function listKeuangan() {
        $searchTerm = $_GET['search'] ?? '';
        if (!empty($searchTerm)) {
            $keuangan = $this->modelKeuangan->searchKeuangan($searchTerm);
        } else {
            $keuangan = $this->modelKeuangan->getKeuangans();
        }
        include './resources/views/keuangan/KeuanganList.php';
    }

    public function detailKeuangan($keuangan_id) {
        $pemasukkan = $this->modelKeuangan->getDetailKeuangan($keuangan_id);
        if (!$pemasukkan) {
            header("Location: index.php?modul=keuangan&fitur=list&message=Data tidak ditemukan");
            exit();
        }
        include './resources/views/keuangan/KeuanganDetail.php';
    }

    public function detailPemasukkan($keuangan_id) {
        $pemasukkan = $this->modelKeuangan->getDetailPemasukkan($keuangan_id);
        if (!$pemasukkan) {
            header("Location: index.php?modul=keuangan&fitur=list&message=Data tidak ditemukan");
            exit();
        }
        include './resources/views/keuangan/KeuanganPemasukkanDetail.php';
    }

    public function hapusKeuangan($keuangan_id) {
        try {
            if ($this->modelKeuangan->deleteKeuangan($keuangan_id)) {
                header("Location: index.php?modul=keuangan&fitur=list&message=Keuangan Berhasil Dihapus");
            } else {
                header("Location: index.php?modul=keuangan&fitur=list&message=Gagal Menghapus Keuangan");
            }
        } catch (Exception $e) {
            header("Location: index.php?modul=keuangan&fitur=list&message=" . $e->getMessage());
        }
        exit();
    }

    public function hapusPemasukkan($keuangan_id) {
        try {
            if ($this->modelKeuangan->deleteKeuangan($keuangan_id)) {
                header("Location: index.php?modul=keuangan&fitur=pemasukkan&message=Pemasukkan Berhasil Dihapus");
            } else {
                header("Location: index.php?modul=keuangan&fitur=pemasukkan&message=Gagal Menghapus Pengeluaran");
            }
        } catch (Exception $e) {
            header("Location: index.php?modul=keuangan&fitur=pengeluaran&message=" . $e->getMessage());
        }
        exit();
    }

    public function hapusPengeluaran($keuangan_id) {
        try {
            if ($this->modelKeuangan->deleteKeuangan($keuangan_id)) {
                header("Location: index.php?modul=keuangan&fitur=pengeluaran&message=Pengeluaran Berhasil Dihapus");
            } else {
                header("Location: index.php?modul=keuangan&fitur=pengeluaran&message=Gagal Menghapus Pengeluaran");
            }
        } catch (Exception $e) {
            header("Location: index.php?modul=keuangan&fitur=pengeluaran&message=" . $e->getMessage());
        }
        exit();
    }

    public function listPemasukkan() {
        $pemasukkan = $this->modelKeuangan->getPemasukkan();
        include './resources/views/keuangan/KeuanganListPemasukkan.php';
    }

    public function listPengeluaran() {
        $pengeluaran = $this->modelKeuangan->getPengeluaran();
        include './resources/views/keuangan/KeuanganListPengeluaran.php';
    }

    public function DashboardKeuangan() {
        include './resources/views/keuangan/KeuanganDashboard.php';
    }
}