<?php
include './config/db_connect.php';
require_once './app/Models/Role.php';
require_once './app/Models/Pengguna.php';
require_once './app/Models/Divisi.php';
require_once './app/Models/Anggota.php';
require_once './app/Models/Proker.php';
require_once './app/Models/Keuangan.php';
require_once './app/Models/Pengumuman.php';

$modelPeran = new modelRole();
$totalPeran = $modelPeran->getTotalRole();

$modelUser = new ModelPengguna();
$totalPengguna = $modelUser->getTotalPengguna();

$modelDiv = new ModelDivisi();
$totalDivisi = $modelDiv->getTotalDivisi();

$modelAnggota = new ModelAnggota();
$totalAnggota = $modelAnggota->getTotalAnggota();

$modelProker = new ModelProker();
$totalProker = $modelProker->getTotalProker();

$modelKeuangan = new modelKeuangan();
$totalSaldo = $modelKeuangan->getTotalSaldo();

$modelPengumuman = new ModelPengumuman();
$pengumumans = $modelPengumuman->getLatestPengumuman();

if ($totalSaldo > 100000) {
    $saldoColor = 'bg-success'; 
} elseif ($totalSaldo >= -100000 && $totalSaldo <= 100000) {
    $saldoColor = 'bg-warning';
} else {
    $saldoColor = 'bg-danger';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF - Dashboard</title>
    <!-- AdminLTE & Bootstrap -->
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif !important;
        }
        .fc-daygrid-day-number {
            color: white !important; /* Warna teks putih */
        }
        .fc-daygrid-day {
            border: none !important; /* Menghilangkan garis pembatas */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include './resources/views/include/navbarSistem.php'; ?>
        <?php include './resources/views/include/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php?modul=dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- Card Jumlah Pengguna -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $totalPeran; ?></h3>
                                    <p>Total Peran</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <a href="index.php?modul=role&fitur=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                <h3><?= $totalPengguna; ?></h3>
                                <p>Total Pengguna</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="index.php?modul=pengguna&fitur=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                <h3><?= $totalDivisi; ?></h3>
                                <p>Total Divisi</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                                <a href="index.php?modul=divisi&fitur=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary"> <!-- Warna diubah dari bg-success ke bg-primary -->
                                <div class="inner">
                                    <h3><?= $totalAnggota; ?></h3>
                                    <p>Total Anggota</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-friends"></i> <!-- Ikon diubah dari fas fa-users ke fas fa-user-friends -->
                                </div>
                                <a href="index.php?modul=anggota&fitur=list" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                <h3><?= $totalProker; ?></h3>
                                <p>Total Proker</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <a href="index.php?modul=proker&fitur=list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box <?= $saldoColor; ?>">
                                <div class="inner">
                                    <h3>Rp<?= number_format((float)$totalSaldo, 0, ',', '.'); ?></h3>
                                    <p>Total Saldo</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <a href="index.php?modul=keuangan&fitur=dashboard" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <section class="col-lg-7 connectedSortable">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-bullhorn"></i> Pengumuman Terbaru</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($pengumumans)): ?>
                                        <ul class="list-group">
                                            <?php foreach ($pengumumans as $pengumuman): ?>
                                                <li class="list-group-item">
                                                    <h5 class="mb-1"> <?= htmlspecialchars($pengumuman['judul']); ?> </h5>
                                                    <p class="mb-1 text-muted"> <?= substr(strip_tags($pengumuman['isi']), 0, 100) . '...'; ?> </p>
                                                    <small class="text-muted"> <?= date('d M Y', strtotime($pengumuman['tanggal_dibuat'])); ?> </small>
                                                    <a href="index.php?modul=pengumuman&fitur=detail&id=<?= $pengumuman['pengumuman_id']; ?>" class="btn btn-sm btn-primary float-right">Read More</a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <p class="text-center text-muted">Tidak ada pengumuman terbaru.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>

                        <section class="col-lg-5 connectedSortable">
                            <div class="card bg-gradient-success">
                                <div class="card-header border-0">
                                    <h3 class="card-title">
                                        <i class="far fa-calendar-alt"></i>
                                        Calendar
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div id="calendar" style="width: 100%"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>

        <?php include './resources/views/include/footerSistem.php' ?>
    </div>

    <?php include './services/ToastModal.php' ?>
    <?php include './services/LogoutModal.php' ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="/resources/js/ToastScript.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'id'
                });
                calendar.render();
            }
        });
    </script>
</body>
</html>
