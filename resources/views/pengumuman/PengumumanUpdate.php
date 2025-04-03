<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
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
                            <h1 class="m-0">Edit Pengumuman</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="alert alert-danger"> <?= $_SESSION['error']; unset($_SESSION['error']); ?> </div>
                            <?php endif; ?>
                            <form action="index.php?modul=pengumuman&fitur=edit&id=<?= $pengumuman['pengumuman_id']; ?>" method="POST">
                                <div class="form-group">
                                    <label class="form-label">Author</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($_SESSION['username']) ?>" disabled>
                                    <input type="hidden" name="author_id" value="<?= $_SESSION['id_user'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul Pengumuman</label>
                                    <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($pengumuman['judul']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="isi">Isi Pengumuman</label>
                                    <textarea name="isi" id="isi" rows="5"><?= htmlspecialchars($pengumuman['isi']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="draft" <?= ($pengumuman['status'] == 'draft') ? 'selected' : ''; ?>>Draft</option>
                                        <option value="published" <?= ($pengumuman['status'] == 'published') ? 'selected' : ''; ?>>Published</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                <a href="index.php?modul=pengumuman&fitur=list" class="btn btn-secondary">Batal</a>
                            </form>
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
    <script>
        // Inisialisasi CKEditor pada textarea dengan id="isi"
        CKEDITOR.replace('isi', {
            height: 300,  // Tinggi editor
        });
        $(document).ready(function () {
            $('[data-widget="treeview"]').Treeview('init');
        });
    </script>
</body>
</html>
