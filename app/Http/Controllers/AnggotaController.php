<?php
include './app/Models/Anggota.php';
include './app/Models/Divisi.php';
include './app/Models/Role.php';

class ControllerAnggota {
    private $modelAnggota;
    private $modelDivisi;
    private $modelRole;

    public function __construct() {
        $this->modelAnggota = new ModelAnggota();
        $this->modelDivisi = new ModelDivisi();
        $this->modelRole = new ModelRole();
    }

    public function handleRequestAnggota($fitur) {
        $anggota_id = $_GET['anggota_id'] ?? null;

        switch ($fitur) {
            case 'create':
                $this->createAnggota();
                break;
            case 'edit':
                $this->editAnggota($anggota_id);
                // if ($pegawai_id) {
                //     $this->editPegawai($pegawai_id);
                // } else {
                //     header("Location: index.php?modul=pegawai&fitur=list");
                // }
                break;
            case 'delete':
                $this->deleteAnggota();
                break;
            case 'list':
                $this->listAnggota();
                break;
            case 'detail':
                if ($anggota_id) {
                    $this->detailAnggota($anggota_id);
                } else {
                    header("Location: index.php?modul=anggota&fitur=list");
                }
                break;
            // case 'cetak_pdf':
            //     $this->cetakPDF();
            //     break;
            default:
                $this->listAnggota();
                break;
        }
    }

    public function createAnggota() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $anggota_npm = $_POST['anggota_npm'];
            $anggota_nama = $_POST['anggota_nama'];
            $anggota_email = $_POST['anggota_email'];
            $anggota_phone = $_POST['anggota_phone'];
            $anggota_status = $_POST['anggota_status'];
            $divisi_id = $_POST['divisi_id'];
            $role_id = $_POST['role_id'];

            $profile_picture = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
                $fileName = time() . '_' . basename($_FILES['profile_picture']['name']);
                $uploadDir = 'uploads/foto_anggota/';
                $destPath = $uploadDir . $fileName;

                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                        $profile_picture = $fileName;
                    } else {
                        header('Location: index.php?modul=anggota&fitur=create&message=Gagal mengupload file');
                        exit();
                    }
                } else {
                    header('Location: index.php?modul=anggota&fitur=create&message=File yang diupload harus berupa gambar');
                    exit();
                }
            }

            $isAdded = $this->modelAnggota->addAnggota($anggota_npm, $anggota_nama, $anggota_email, $anggota_phone, $anggota_status, $divisi_id, $role_id, $profile_picture);

            if ($isAdded) {
                header('Location: index.php?modul=anggota&fitur=list&message=Data Anggota Berhasil Ditambahkan');
            } else {
                header('Location: index.php?modul=anggota&fitur=create&message=Gagal Menambahkan Data Anggota');
            }
            exit;
        }

        $roles = $this->modelRole->getRoles();
        $divisis = $this->modelDivisi->getDivisis();
        include './resources/views/anggota/AnggotaAdd.php';
    }

    public function editAnggota($anggota_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $anggota_id = $_POST['anggota_id'];
            $anggota_npm = $_POST['anggota_npm'];
            $anggota_nama = $_POST['anggota_nama'];
            $anggota_email = $_POST['anggota_email'];
            $anggota_phone = $_POST['anggota_phone'];
            $anggota_status = $_POST['anggota_status'];
            $divisi_id = $_POST['divisi_id'];
            $role_id = $_POST['role_id'];

            $anggota = $this->modelAnggota->getAnggotaById($anggota_id);
            $profile_picture = $anggota['profile_picture'];

            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
                $fileName = time() . '_' . basename($_FILES['profile_picture']['name']);
                $uploadDir = 'uploads/foto_anggota/'; // Perbaiki path
                $destPath = $uploadDir . $fileName;
            
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
            
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            
                if (in_array($fileExtension, $allowedExtensions)) {
                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                        if (!empty($anggota['profile_picture']) && file_exists($uploadDir . $anggota['profile_picture'])) {
                            unlink($uploadDir . $anggota['profile_picture']); // Hapus foto lama
                        }
                        $profile_picture = $fileName;
                    } else {
                        header('Location: index.php?modul=anggota&fitur=edit&anggota_id=' . $anggota_id . '&message=Gagal mengupload file');
                        exit();
                    }
                } else {
                    header('Location: index.php?modul=anggota&fitur=edit&anggota_id=' . $anggota_id . '&message=File yang diupload harus berupa gambar');
                    exit();
                }
            }

            $isUpdated = $this->modelAnggota->updateAnggota(
                $anggota_npm, $anggota_id, $anggota_nama, $anggota_email, $anggota_phone, 
                $anggota_status, $divisi_id, $role_id, 
                $profile_picture
            );

            if ($isUpdated) {
                header('Location: index.php?modul=anggota&fitur=list&message=Data Anggota Berhasil Diubah');
            } else {
                header('Location: index.php?modul=anggota&fitur=edit&anggota_id=' . $anggota_id . '&message=Gagal Mengubah Data Anggota');
            }
            exit();
        }
        
        $anggota = $this->modelAnggota->getAnggotaById($anggota_id);
        $roles = $this->modelRole->getRoles();
        $divisis = $this->modelDivisi->getDivisis();
        include './resources/views/anggota/AnggotaUpdate.php';
    }

    public function deleteAnggota() {
        $anggota_id = $_GET['anggota_id'] ?? null;
        if ($anggota_id) {
            $this->modelAnggota->deleteAnggota($anggota_id);
        }
        header("Location: index.php?modul=anggota&fitur=list&message=Data Anggota Berhasil Dihapus");
        exit();
    }

    public function detailAnggota($anggota_id) {
        $anggota = $this->modelAnggota->getAnggotaById($anggota_id);
        include './resources/views/anggota/AnggotaDetail.php';
    }

    public function listAnggota() {
        $searchTerm = $_GET['search'] ?? null;
        if ($searchTerm) {
            $anggotas = $this->modelAnggota->searchAnggotaByName($searchTerm);
        } else {
            $anggotas = $this->modelAnggota->getAnggotas();
        }
        include './resources/views/anggota/AnggotaList.php';
    }

    // public function cetakPDF() {
    //     require_once './vendor/autoload.php'; // Pastikan DomPDF terinstal dengan Composer
    //     $dompdf = new Dompdf\Dompdf();
    
    //     $pegawais = $this->modelPegawai->getPegawaiForPDF();
    
    //     ob_start();
    //     include './export/pegawai/printPdf.php'; // File template untuk tampilan PDF
    //     $html = ob_get_clean();
    
    //     $dompdf->loadHtml($html);
    //     $dompdf->setPaper('A4', 'portrait');
    //     $dompdf->render();
    //     $dompdf->stream("data_pegawai.pdf", ["Attachment" => false]);
    // }
}