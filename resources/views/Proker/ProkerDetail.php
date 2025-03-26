<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF - Detail Proker</title>
    <link rel="icon" type="image/png" href="./public/image/hima.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./resources/css/FontConfig.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include './resources/views/include/navbarSistem.php'; ?>
        <?php include './resources/views/include/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Detail Program Kerja</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Program Kerja</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ID Proker</th>
                                            <td><?= htmlspecialchars($proker['proker_id']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Proker</th>
                                            <td><?= htmlspecialchars($proker['proker_nama']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi Proker</th>
                                            <td><?= htmlspecialchars($proker['proker_deskripsi']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Pelaksanaan</th>
                                            <td><?= htmlspecialchars($proker['proker_tanggal']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ketua Pelaksana</th>
                                            <td><?= htmlspecialchars($proker['ketua_nama']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sekertaris Pelaksana</th>
                                            <td><?= htmlspecialchars($proker['sekertaris_nama']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Anggota</th>
                                            <td><?= htmlspecialchars($proker['jumlah_anggota']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Data Anggota</th>
                                            <td><?= htmlspecialchars($proker['data_anggota']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status Proker</th>
                                            <td><?= htmlspecialchars($proker['proker_status'] == 1) ? 'Terlaksana' : 'Belum Terlaksana'; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="index.php?modul=proker&fitur=list" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include './resources/views/include/footerSistem.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>