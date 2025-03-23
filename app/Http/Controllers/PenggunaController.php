<?php
include './app/Models/Pengguna.php';
include './app/Models/Role.php';

class ControllerPengguna {
    private $modelPengguna;
    private $modelRole;

    public function __construct() {
        $this->modelPengguna = new ModelPengguna();
        $this->modelRole = new ModelRole();
    }

    public function handleRequestPengguna($fitur) {
        $id_user = $_GET['id_user'] ?? null;

        switch ($fitur) {
            case 'create':
                $this->createPengguna();
                break;
            case 'edit':
                $this->editPengguna($id_user);
                // if ($pegawai_id) {
                //     $this->editPegawai($pegawai_id);
                // } else {
                //     header("Location: index.php?modul=pegawai&fitur=list");
                // }
                break;
            case 'delete':
                $this->deletePengguna();
                break;
            case 'list':
                $this->listPengguna();
                break;
            case 'detail':
                if ($id_user) {
                    $this->detailPengguna($id_user);
                } else {
                    header("Location: index.php?modul=pengguna&fitur=list");
                }
                break;
            case 'profil':
                $this->profil();
                break;
            case 'edit-profil':
                $this->editProfilPenggunaLoggedIn();
                break;
            // case 'cetak-pdf':
            //     $this->cetakPDF();
            //     break;
            case 'login':
                $this->loginPengguna();
                break;
            case 'logout':
                $this->logoutPengguna();
                break;
            default:
                $this->listPengguna();
                break;
        }
    }

    public function createPengguna() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_user = $_POST['nama_user'];
            $email_user = $_POST['email_user'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role_id = $_POST['role_id'];

            $profile_picture = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
                $fileName = time() . '_' . basename($_FILES['profile_picture']['name']);
                $uploadDir = 'uploads/profile_pictures/';
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
                        header('Location: index.php?modul=pengguna&fitur=create&message=Gagal mengupload file');
                        exit();
                    }
                } else {
                    header('Location: index.php?modul=pengguna&fitur=create&message=File yang diupload harus berupa gambar');
                    exit();
                }
            }

            $isAdded = $this->modelPengguna->addPengguna($nama_user, $email_user, $username, $password, $role_id, $profile_picture);

            if ($isAdded) {
                header('Location: index.php?modul=pengguna&fitur=list&message=Pengguna Berhasil Ditambahkan');
            } else {
                header('Location: index.php?modul=pengguna&fitur=create&message=Gagal Menambahkan Pengguna');
            }
            exit;
        }

        $roles = $this->modelRole->getRoles();
        include './resources/views/pengguna/PenggunaAdd.php';
    }

    public function editPengguna($id_user) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $id_user = $_POST['id_user'];
            $nama_user = $_POST['nama_user'];
            $email_user = $_POST['email_user'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role_id = $_POST['role_id'];

            $pengguna = $this->modelPengguna->getPenggunaById($id_user);
            $profile_picture = $pengguna['profile_picture'];

            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
                $fileName = time() . '_' . basename($_FILES['profile_picture']['name']);
                $uploadDir = 'uploads/profile_pictures/';
                $destPath = $uploadDir . $fileName;
            
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
            
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            
                if (in_array($fileExtension, $allowedExtensions)) {
                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                        if (!empty($pengguna['profile_picture']) && file_exists($uploadDir . $pengguna['profile_picture'])) {
                            unlink($uploadDir . $pengguna['profile_picture']); // Hapus foto lama
                        }
                        $profile_picture = $fileName;
                    } else {
                        header('Location: index.php?modul=pengguna&fitur=edit&id_user=' . $id_user . '&message=Gagal mengupload file');
                        exit();
                    }
                } else {
                    header('Location: index.php?modul=pengguna&fitur=edit&id_user=' . $id_user . '&message=File yang diupload harus berupa gambar');
                    exit();
                }
            }

            $isUpdated = $this->modelPengguna->updatePengguna(
                $id_user, $nama_user, $email_user, $username,
                $password, $role_id, $profile_picture
            );

            if ($isUpdated) {
                header('Location: index.php?modul=pengguna&fitur=list&message=Pengguna Berhasil Diubah');
            } else {
                header('Location: index.php?modul=pengguna&fitur=edit&id_user=' . $id_user . '&message=Gagal Mengubah Pengguna');
            }
            exit();
        }
        
        $pengguna = $this->modelPengguna->getPenggunaById($id_user);
        $roles = $this->modelRole->getRoles();
        include './resources/views/pengguna/PenggunaUpdate.php';
    }

    public function profil() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['id_user'])) {
            header("Location: index.php?modul=pengguna&fitur=login&message=Harap login terlebih dahulu");
            exit();
        }
    
        $id_user = $_SESSION['id_user'];
        $pengguna = $this->modelPengguna->getPenggunaById($id_user);
        include './resources/views/pengguna/PenggunaProfil.php';
    }

    public function editProfilPenggunaLoggedIn() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['id_user'])) {
            header("Location: index.php?modul=pengguna&fitur=login&message=Harap login terlebih dahulu");
            exit();
        }
    
        $id_user = $_SESSION['id_user'];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_user = $_POST['nama_user'];
            $email_user = $_POST['email_user'];
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $pengguna = $this->modelPengguna->getPenggunaById($id_user);
            $profile_picture = $pengguna['profile_picture'];
    
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
                $fileName = time() . '_' . basename($_FILES['profile_picture']['name']);
                $uploadDir = 'uploads/profile_pictures/';
                $destPath = $uploadDir . $fileName;
    
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
    
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
                if (in_array($fileExtension, $allowedExtensions)) {
                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                        if (!empty($pengguna['profile_picture']) && file_exists($uploadDir . $pengguna['profile_picture'])) {
                            unlink($uploadDir . $pengguna['profile_picture']); // Hapus foto lama
                        }
                        $profile_picture = $fileName;
                    } else {
                        header('Location: index.php?modul=pengguna&fitur=profil&message=Gagal mengupload file');
                        exit();
                    }
                } else {
                    header('Location: index.php?modul=pengguna&fitur=profil&message=File harus berupa gambar');
                    exit();
                }
            }
    
            $isUpdated = $this->modelPengguna->updateLoggedInPengguna(
                $id_user, $nama_user, $email_user, $username, $password, $profile_picture
            );
    
            if ($isUpdated) {
                $_SESSION['nama_user'] = $nama_user;
                $_SESSION['email_user'] = $email_user;
                $_SESSION['username'] = $username;
                $_SESSION['profile_picture'] = $profile_picture;
                
                header('Location: index.php?modul=pengguna&fitur=profil&message=Profil Berhasil Diperbarui');
            } else {
                header('Location: index.php?modul=pengguna&fitur=profil&message=Gagal Memperbarui Profil');
            }
            exit();
        }
    
        $pengguna = $this->modelPengguna->getPenggunaById($id_user);
        include './resources/views/pengguna/PenggunaProfil.php';
    }

    public function deletePengguna() {
        $id_user = $_GET['id_user'] ?? null;
        if ($id_user) {
            $this->modelPengguna->deletePengguna($id_user);
        }
        header("Location: index.php?modul=pengguna&fitur=list&message=Pengguna Berhasil Dihapus");
        exit();
    }

    public function detailPengguna($id_user) {
        $pengguna = $this->modelPengguna->getPenggunaById($id_user);
        include './resources/views/pengguna/PenggunaDetail.php';
    }

    public function listPengguna() {
        $searchTerm = $_GET['search'] ?? null;
        if ($searchTerm) {
            $penggunas = $this->modelPengguna->searchPenggunaByName($searchTerm);
        } else {
            $penggunas = $this->modelPengguna->getPenggunas();
        }
        include './resources/views/pengguna/PenggunaList.php';
    }

    public function loginPengguna() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $pengguna = $this->modelPengguna->loginPengguna($username, $password);
    
            if ($pengguna) {
                $_SESSION['id_user'] = $pengguna['id_user'];
                $_SESSION['nama_user'] = $pengguna['nama_user'];
                $_SESSION['email_user'] = $pengguna['email_user'];
                $_SESSION['username'] = $pengguna['username'];
                $_SESSION['role_id'] = $pengguna['role_id'];
                $_SESSION['role_name'] = $pengguna['role_name'];
                $_SESSION['profile_picture'] = $pengguna['profile_picture'];
                $_SESSION['login_success'] = true;
    
                // Redirect ke dashboard jika login sukses
                header('Location: index.php?modul=dashboard&message=Login Berhasil');
                exit();
            } else {
                // Redirect ke halaman login jika gagal dengan pesan error
                header('Location: index.php?modul=pengguna&fitur=login&error=Username atau Password Salah');
                exit();
            }
        }
        include './resources/views/pengguna/PenggunaLogin.php';
    }

    public function logoutPengguna() {
        session_start();
        session_unset();
        session_destroy();
        
        header("Location: index.php?modul=pengguna&fitur=login&message=Logout Berhasil");
        exit();
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
