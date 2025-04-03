<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemasukkan</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
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
                            <h1 class="m-0">Tambah Pemasukkan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($_GET['message'])) : ?>
                                <div class="alert alert-danger"> <?= htmlspecialchars($_GET['message']); ?> </div>
                            <?php endif; ?>
                            <form action="index.php?modul=keuangan&fitur=tambah-pemasukkan" method="POST">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah (Rp)</label>
                                    <input type="number" class="form-control" name="jumlah" required>
                                </div>
                                <div class="form-group">
                                    <label for="sumber_dana">Sumber Dana</label>
                                    <input type="text" class="form-control" name="sumber_dana" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="Donasi">Donasi</option>
                                        <option value="Sponsorship">Sponsorship</option>
                                        <option value="Kas">Kas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="anggota_id">Anggota yang Melakukan Pembayaran</label>
                                    <select class="form-control" name="anggota_id" required>
                                        <option value="">Pilih Anggota</option>
                                        <?php foreach ($anggota as $a) { ?>
                                            <option value="<?= htmlspecialchars($a['anggota_id']) ?>">
                                                <?= htmlspecialchars($a['anggota_npm']) ?> | <?= htmlspecialchars($a['anggota_nama']) ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                <a href="index.php?modul=keuangan&fitur=pemasukkan" class="btn btn-secondary">Batal</a>
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
        $(document).ready(function () {
            $('[data-widget="treeview"]').Treeview('init');
        });
    </script>
</body>
</html>
