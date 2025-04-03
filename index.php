<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

$modul = $_GET['modul'] ?? 'home';
$fitur = $_GET['fitur'] ?? 'list';

switch ($modul) {
    case 'home':
        include './resources/views/home/home.php';
        break;

    case 'about':
        include './resources/views/home/about.php';
        break;

    case 'organisasi':
        include './resources/views/home/organisasi.php';
        break;

    case 'event':
        include './resources/views/home/event.php';
        break;
    
    case 'kontak':
        include './resources/views/home/kontak.php';
        break;

    case 'dashboard':
        include './resources/views/Dashboard.php';
        break;

    case 'role':
        require_once './app/Http/Controllers/RoleController.php';
        $controllerRole = new controllerRole();
        $controllerRole->handleRequestRole($fitur);
        break;

    case 'divisi':
        require_once './app/Http/Controllers/DivisiController.php';
        $controllerDivisi = new controllerDivisi();
        $controllerDivisi->handleRequestDivisi($fitur);
        break;

    case 'pengguna':
        require_once './app/Http/Controllers/PenggunaController.php';
        $controllerPengguna = new ControllerPengguna();
        $controllerPengguna->handleRequestPengguna($fitur);
        break;

    case 'anggota':
        require_once './app/Http/Controllers/AnggotaController.php';
        $controllerAnggota = new ControllerAnggota();
        $controllerAnggota->handleRequestAnggota($fitur);
        break;

    case 'proker':
        require_once './app/Http/Controllers/ProkerController.php';
        $controllerProker = new ControllerProker();
        $controllerProker->handleRequestProker($fitur);
        break;

    case 'keuangan':
        require_once './app/Http/Controllers/KeuanganController.php';
        $controllerKeuangan = new ControllerKeuangan();
        $controllerKeuangan->handleRequestKeuangan($fitur);
        break;

    case 'pengumuman':
        require_once './app/Http/Controllers/PengumumanController.php';
        $controllerPengumuman = new controllerPengumuman();
        $controllerPengumuman->handleRequestPengumuman($fitur);
        break;

    default:
        include './services/404notfound.php';
        break;
}