<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF - Detail Pemasukkan</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
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
                            <h1 class="m-0">Detail Pemasukkan</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Detail Pemasukkan</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID Pemasukkan</th>
                                    <td><?= htmlspecialchars($pemasukkan['keuangan_id']); ?></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td><?= htmlspecialchars($pemasukkan['deskripsi']); ?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah</th>
                                    <td>Rp<?= number_format($pemasukkan['jumlah'], 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <th>Sumber Dana</th>
                                    <td><?= htmlspecialchars($pemasukkan['sumber_dana']); ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <td><?= htmlspecialchars($pemasukkan['anggota_nama']); ?></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td><?= htmlspecialchars($pemasukkan['kategori']); ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td><?= htmlspecialchars($pemasukkan['tanggal_transaksi']); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="index.php?modul=keuangan&fitur=pemasukkan" class="btn btn-secondary">
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
