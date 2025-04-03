<?php
include './app/Models/Pengumuman.php';

class controllerPengumuman {
    private $model;
    public function __construct() {
        $this->model = new ModelPengumuman();
    }

    public function handleRequestPengumuman($fitur) {
        $pengumuman_id = $_GET['id'] ?? null;

        switch ($fitur) {
            case 'create':
                $this->createPengumuman();
                break;
            case 'edit':
                $pengumuman_id = $_GET['id'] ?? null;
                if ($pengumuman_id) {
                    $this->updatePengumuman($pengumuman_id);
                } else {
                    header("Location: index.php?modul=pengumuman&fitur=list");
                    exit;
                }
                break;
            case 'delete':
                $pengumuman_id = $_GET['id'] ?? null;
                if ($pengumuman_id) {
                    $this->deletePengumuman($pengumuman_id);
                } else {
                    header("Location: index.php?modul=pengumuman&fitur=list");
                    exit;
                }
                break;
            case 'list':
                $this->listPengumuman();
                break;
            case 'detail':
                if ($pengumuman_id) {
                    $this->detailPengumuman($pengumuman_id);
                } else {
                    header("Location: index.php?modul=pengumuman&fitur=list");
                }
                break;
            default:
                $this->listPengumuman();
                break;
        }
    }

    public function listPengumuman() {
        $pengumumans = $this->model->getPengumuman();
        include './resources/views/pengumuman/PengumumanList.php';
    }

    public function detailPengumuman($pengumuman_id) {
        $pengumuman = $this->model->getPengumumanById($pengumuman_id);
        include './resources/views/pengumuman/PengumumanDetail.php';
    }

    public function createPengumuman() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $judul = trim($_POST['judul']);
            $isi = trim($_POST['isi']);
            $author_id = $_SESSION['id_user'] ?? null; // Ambil dari session
            $status = $_POST['status'] ?? 'draft';
    
            if (!empty($judul) && !empty($isi) && $author_id !== null) {
                $this->model->createPengumuman($judul, $isi, $author_id, $status);
                header("Location: index.php?modul=pengumuman&fitur=list&message=Pengumuman Berhasil Ditambahkan");
                exit;
            } else {
                $_SESSION['error'] = "Judul, isi, dan author tidak boleh kosong!";
                header("Location: index.php?modul=pengumuman&fitur=create");
                exit;
            }
        } else {
            include './resources/views/pengumuman/PengumumanForm.php';
        }
    }

    public function updatePengumuman($pengumuman_id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $judul = trim($_POST['judul']);
            $isi = trim($_POST['isi']);
            $status = $_POST['status'] ?? 'draft';

            if (!empty($judul) && !empty($isi)) {
                $this->model->updatePengumuman($pengumuman_id, $judul, $isi, $status);
                header("Location: index.php?modul=pengumuman&fitur=list&message=Pengumuman Berhasil Diupdate");
                exit;
            } else {
                $_SESSION['error'] = "Judul dan isi tidak boleh kosong!";
                header("Location: index.php?modul=pengumuman&fitur=edit&id=" . $pengumuman_id);
                exit;
            }
        } else {
            $pengumuman = $this->model->getPengumumanById($pengumuman_id);
            include './resources/views/pengumuman/pengumumanUpdate.php';
        }
    }

    public function deletePengumuman($pengumuman_id) {
        $this->model->deletePengumuman($pengumuman_id);
        header("Location: index.php?modul=pengumuman&fitur=list&message=Pengumuman Berhasil Dihapus");
        exit;
    }
}