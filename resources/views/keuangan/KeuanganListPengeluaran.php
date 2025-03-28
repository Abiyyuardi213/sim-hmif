<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF - Pemasukkan Keuangan</title>
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

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manajemen Pemasukkan</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Daftar Pemasukkan</h3>
                            <a href="index.php?modul=keuangan&fitur=tambah-pemasukkan" class="btn btn-primary btn-sm ml-auto">
                                <i class="fas fa-plus"></i> Tambah Pemasukkan
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="pemasukkanTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pemasukkan</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah</th>
                                        <th>Sumber Dana</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pemasukkan as $index => $data) : ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= htmlspecialchars($data['tanggal_transaksi']); ?></td>
                                            <td><?= htmlspecialchars($data['deskripsi']); ?></td>
                                            <td>Rp<?= number_format($data['jumlah'], 0, ',', '.'); ?></td>
                                            <td><?= htmlspecialchars($data['sumber_dana']); ?></td>
                                            <td><?= htmlspecialchars($data['kategori']); ?></td>
                                            <td>
                                                <a href="index.php?modul=keuangan&fitur=detail-pemasukkan&keuangan_id=<?= $data['keuangan_id']; ?>" class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                                <a href="index.php?modul=keuangan&fitur=hapus&keuangan_id=<?= $data['keuangan_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pemasukkan ini?');">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include './resources/views/include/footerSistem.php' ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pemasukkanTable').DataTable();
        });
    </script>
</body>
</html>
