<?php
include './app/Models/Divisi.php';

class controllerDivisi {
    private $model;

    public function __construct() {
        $this->model = new ModelDivisi();
    }

    public function handleRequestDivisi($fitur) {
        $divisi_id = $_GET['divisi_id'] ?? null;

        switch ($fitur) {
            case 'create':
                $this->createDivisi();
                break;
            case 'edit':
                $this->updateDivisi($divisi_id);
                break;
            case 'update-status':
                $this->updateDivisiStatus();
                break;
            case 'delete':
                $this->deleteDivisi($divisi_id);
                break;
            case 'list':
                $this->listDivisis();
                break;
            default:
                $this->listDivisis();
                break;
        }
    }

    public function listDivisis() {
        $searchTerm = $_GET['search'] ?? null;
        if ($searchTerm) {
            $divisis = $this->model->searchDivisiByName($searchTerm);
        } else {
            $divisis = $this->model->getDivisis();
        }
        include './resources/views/divisi/DivisiList.php';
    }

    public function createDivisi() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $divisi_name = $_POST['divisi_name'] ?? '';
            $divisi_description = $_POST['divisi_description'] ?? '';
            $divisi_status = $_POST['divisi_status'] ?? 0;

            $isAdded = $this->model->addDivisi($divisi_name, $divisi_description, (int)$divisi_status);

            if ($isAdded) {
                header('Location: index.php?modul=divisi&fitur=list&message=Divisi Berhasil Ditambahkan');
            } else {
                header('Location: index.php?modul=divisi&fitur=create&message=Gagal Menambahkan Divisi');
            }
            exit;
        } else {
            include './resources/views/divisi/DivisiAdd.php';
        }
    }

    public function updateDivisi($divisi_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $divisi_name = $_POST['divisi_name'] ?? '';
            $divisi_description = $_POST['divisi_description'] ?? '';
            $divisi_status = $_POST['divisi_status'] ?? 0;

            $isUpdated = $this->model->updateDivisi($divisi_id, $divisi_name, $divisi_description, (int)$divisi_status);

            if ($isUpdated) {
                header('Location: index.php?modul=divisi&fitur=list&message=Divisi Berhasil Diubah');
            } else {
                header('Location: index.php?modul=divisi&fitur=edit&divisi_id=' . $divisi_id . '&message=Gagal Mengubah Divisi');
            }
            exit;
        } else {
            $divisi = $this->model->getDivisiById($divisi_id);
            include './resources/views/divisi/DivisiUpdate.php';
        }
    }

    public function updateDivisiStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $divisi_id = $_POST['divisi_id'] ?? null;
            $divisi_status = $_POST['divisi_status'] ?? null;
    
            if ($divisi_id === null || $divisi_status === null) {
                echo json_encode(["success" => false, "message" => "Data tidak valid"]);
                exit;
            }
    
            $isUpdated = $this->model->updateDivisiStatus((int)$divisi_id, (int)$divisi_status);
    
            if ($isUpdated) {
                echo json_encode(["success" => true, "message" => "Status berhasil diperbarui"]);
            } else {
                echo json_encode(["success" => false, "message" => "Gagal memperbarui status"]);
            }
            exit;
        }
    }

    public function deleteDivisi($divisi_id) {
        $isDeleted = $this->model->deteteDivisi($divisi_id);

        if ($isDeleted) {
            header('Location: index.php?modul=divisi&fitur=list&message=Divisi Berhasil Dihapus');
        } else {
            header('Location: index.php?modul=divisi&fitur=list&message=Gagal Menghapus Divisi');
        }
        exit;
    }
}