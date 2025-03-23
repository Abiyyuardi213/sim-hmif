<?php
include './app/Models/Proker.php';
include './app/Models/Anggota.php';;

class ControllerProker {
    private $modelProker;
    private $modelAnggota;

    public function __construct() {
        $this->modelProker = new ModelProker();
        $this->modelAnggota = new ModelAnggota();
    }

    public function handleRequestProker($fitur) {
        $proker_id = $_GET['proker_id'] ?? null;

        switch ($fitur) {
            case 'create':
                $this->createProker();
                break;
            case 'edit':
                if ($proker_id) {
                    $this->editProker($proker_id);
                } else {
                    header("Location: index.php?modul=proker&fitur=list");
                    exit();
                }
                break;
            case 'delete':
                $this->deleteProker();
                break;
            case 'list':
                $this->listProker();
                break;
            case 'detail':
                if ($proker_id) {
                    $this->detailProker($proker_id);
                } else {
                    header("Location: index.php?modul=proker&fitur=list");
                    exit();
                }
                break;
            // case 'cetak_pdf':
            //     $this->cetakPDF();
            //     break;
            default:
                $this->listProker();
                break;
        }
    }

    public function createProker() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $proker_nama = $_POST['proker_nama'] ?? '';
            $proker_deskripsi = $_POST['proker_deskripsi'] ?? '';
            $proker_tanggal = $_POST['proker_tanggal'] ?? '';
            $ketua_id = $_POST['ketua_id'] ?? '';
            $sekertaris_id = $_POST['sekertaris_id'] ?? '';
            $data_anggota = $_POST['data_anggota'] ?? '';
            $proker_status = $_POST['proker_status'] ?? 0;

            if (!empty($proker_nama) && !empty($proker_deskripsi) && !empty($proker_tanggal)) {
                $success = $this->modelProker->addProker($proker_nama, $proker_deskripsi, $proker_tanggal, $ketua_id, $sekertaris_id, $data_anggota, $proker_status);
                if ($success) {
                    header("Location: index.php?modul=proker&fitur=list&message=Data Berhasil Ditambahkan");
                    exit();
                } else {
                    $error = "Gagal menambahkan data!";
                }
            } else {
                $error = "Harap isi semua data!";
            }
        }
        include './resources/views/proker/ProkerAdd.php';
    }

    public function editProker($proker_id) {
        $proker = $this->modelProker->getProkerById($proker_id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $proker_nama = $_POST['proker_nama'] ?? '';
            $proker_deskripsi = $_POST['proker_deskripsi'] ?? '';
            $proker_tanggal = $_POST['proker_tanggal'] ?? '';
            $ketua_id = $_POST['ketua_id'] ?? '';
            $sekertaris_id = $_POST['sekertaris_id'] ?? '';
            $data_anggota = $_POST['data_anggota'] ?? '';
            $proker_status = $_POST['proker_status'] ?? 0;

            if (!empty($proker_nama) && !empty($proker_deskripsi) && !empty($proker_tanggal)) {
                $success = $this->modelProker->updateProker($proker_id, $proker_nama, $proker_deskripsi, $proker_tanggal, $ketua_id, $sekertaris_id, $data_anggota, $proker_status);
                if ($success) {
                    header("Location: index.php?modul=proker&fitur=list&message=Data Berhasil Diperbarui");
                    exit();
                } else {
                    $error = "Gagal memperbarui data!";
                }
            } else {
                $error = "Harap isi semua data!";
            }
        }
        include './resources/views/proker/ProkerUpdate.php';
    }

    public function deleteProker() {
        $proker_id = $_GET['proker_id'] ?? null;

        if ($proker_id) {
            $this->modelProker->deleteProker($proker_id);
        }

        header("Location: index.php?modul=proker&fitur=list&message=Data Proker Berhasil Dihapus");
        exit();
    }

    public function detailProker($proker_id) {
        $proker = $this->modelProker->getDetailProker($proker_id);
        include './resources/views/proker/ProkerDetail.php';
    }

    public function listProker() {
        $searchTerm = $_GET['search'] ?? null;

        if ($searchTerm) {
            $prokers = $this->modelProker->searchProkerByName($searchTerm);
        } else {
            $prokers = $this->modelProker->getProkers();
        }

        include './resources/views/proker/ProkerList.php';
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