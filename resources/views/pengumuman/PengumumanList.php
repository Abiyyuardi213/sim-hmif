<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF - Pengumuman</title>
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
                            <h1 class="m-0">Manajemen Pengumuman</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Daftar Pengumuman</h3>
                            <a href="index.php?modul=pengumuman&fitur=create" class="btn btn-primary btn-sm ml-auto">
                                <i class="fas fa-plus"></i> Buat Pengumuman
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php if (!empty($pengumumans)): ?>
                                    <?php foreach ($pengumumans as $pengumuman): ?>
                                        <div class="col-md-4">
                                            <div class="card shadow-sm mb-4">
                                                <div class="card-body">
                                                    <h5 class="card-title"> <?= htmlspecialchars($pengumuman['judul']); ?> </h5>
                                                    <p class="card-text text-muted">
                                                        <?= nl2br(htmlspecialchars(substr($pengumuman['isi'], 0, 150))) . '...'; ?>
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="badge <?= ($pengumuman['status'] == 'published') ? 'badge-success' : 
                                                        (($pengumuman['status'] == 'draft') ? 'badge-warning' : 'badge-secondary'); ?>">
                                                            <?= ucfirst($pengumuman['status']); ?>
                                                        </span>
                                                        <small class="text-muted"> <?= date('d M Y', strtotime($pengumuman['tanggal_dibuat'])); ?> </small>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between">
                                                    <a href="index.php?modul=pengumuman&fitur=detail&id=<?= $pengumuman['pengumuman_id']; ?>" class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i> Read More
                                                    </a>
                                                    <a href="index.php?modul=pengumuman&fitur=edit&id=<?= $pengumuman['pengumuman_id']; ?>" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <button class="btn btn-danger btn-sm btn-delete" 
                                                            data-id="<?= $pengumuman['pengumuman_id']; ?>" 
                                                            data-toggle="modal" 
                                                            data-target="#deletePengumumanModal">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-12 text-center">
                                        <p class="text-muted">Tidak ada pengumuman.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include './resources/views/include/footerSistem.php' ?>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deletePengumumanModal" tabindex="-1" aria-labelledby="deletePengumumanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deletePengumumanModalLabel"><i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus pengumuman ini? Tindakan ini tidak dapat dibatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="#" id="confirmDeleteBtn" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <?php include './services/ToastModal.php' ?>
    <?php include './services/LogoutModal.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="./resources/js/PengumumanScript.js"></script>
    <script src="./resources/js/ToastScript.js"></script>
</body>
</html>
