<?php
include './config/db_connect.php';
require_once './app/Models/Keuangan.php';

$modelKeuangan = new modelKeuangan();
$totalPemasukkan = $modelKeuangan->getTotalPemasukkan();
$totalPengeluaran = $modelKeuangan->getTotalPengeluaran();
$totalSaldo = $modelKeuangan->getTotalSaldo();

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
    <title>HMIF - Dashboard Keuangan</title>
    <!-- AdminLTE & Bootstrap -->
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./resources/css/FontConfig.css">
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
                            <h1 class="m-0">Dashboard Keuangan</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= number_format((float)$totalPemasukkan, 0, ',', '.'); ?></h3>
                                    <p>Total Pemasukkan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <a href="index.php?modul=keuangan&fitur=pemasukkan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= number_format((float)$totalPengeluaran, 0, ',', '.'); ?></h3>
                                    <p>Total Pengeluaran</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <a href="index.php?modul=keuangan&fitur=pengeluaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <a href="index.php?modul=keuangan&fitur=list" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
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
    <script src="/resources/js/ToastScript.js"></script>
</body>
</html>
