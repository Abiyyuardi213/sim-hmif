<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Anggota</title>
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
                            <h1 class="m-0">Update Data Anggota</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger"> <?= htmlspecialchars($error); ?> </div>
                            <?php endif; ?>

                            <form method="POST" action="index.php?modul=anggota&fitur=edit" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="anggota_id">ID Anggota</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($anggota['anggota_id'] ?? '') ?>" readonly>
                                    <input type="hidden" name="anggota_id" value="<?= htmlspecialchars($anggota['anggota_id'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="anggota_npm">NPM Anggota</label>
                                    <input type="text" class="form-control" name="anggota_npm" value="<?= htmlspecialchars($anggota['anggota_npm'] ?? '') ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="anggota_nama">Nama Anggota</label>
                                    <input type="text" class="form-control" name="anggota_nama" value="<?= htmlspecialchars($anggota['anggota_nama'] ?? '') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="anggota_email">Email Anggota</label>
                                    <input type="text" class="form-control" name="anggota_email" value="<?= htmlspecialchars($anggota['anggota_email'] ?? '') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="anggota_phone">No. Telp Anggota</label>
                                    <input type="text" class="form-control" name="anggota_phone" value="<?= htmlspecialchars($anggota['anggota_phone'] ?? '') ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Divisi Anggota</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <select class="form-control" id="divisi_id" name="divisi_id" required>
                                            <option value="" disabled>Pilih Peran</option>
                                            <?php foreach ($divisis as $divisi) { ?>
                                                <option value="<?= htmlspecialchars($divisi['divisi_id']) ?>" 
                                                    <?= (isset($anggota['divisi_id']) && $anggota['divisi_id'] == $divisi['divisi_id']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($divisi['divisi_name']) ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Peran Pengguna</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <select class="form-control" id="role_id" name="role_id" required>
                                            <option value="" disabled>Pilih Peran</option>
                                            <?php foreach ($roles as $role) { ?>
                                                <option value="<?= htmlspecialchars($role['role_id']) ?>" 
                                                    <?= (isset($anggota['role_id']) && $anggota['role_id'] == $role['role_id']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($role['role_name']) ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="anggota_status">Status</label>
                                    <select class="form-control" name="anggota_status">
                                        <option value="1" <?= (isset($anggota['anggota_status']) && $anggota['anggota_status'] == 1) ? 'selected' : '' ?>>Aktif</option>
                                        <option value="0" <?= (isset($anggota['anggota_status']) && $anggota['anggota_status'] == 0) ? 'selected' : '' ?>>Nonaktif</option>
                                    </select>
                                </div>

                                <!-- Input Upload Profile Picture -->
                                <div class="form-group">
                                    <label for="profile_picture">Foto Profil</label>
                                    <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                                    <br>
                                    <?php if (!empty($anggota['profile_picture'])) : ?>
                                        <img id="imagePreview" src="./uploads/foto_anggota/<?= htmlspecialchars($anggota['profile_picture']); ?>" alt="Foto Profil" 
                                             style="display: block; width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                                    <?php else : ?>
                                        <img id="imagePreview" src="#" alt="Pratinjau Gambar" 
                                             style="display: none; width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                <a href="index.php?modul=anggota&fitur=list" class="btn btn-secondary">Batal</a>
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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = "block";
            }
            reader.readAsDataURL(event.target.files[0]);
        }
        $(document).ready(function () {
            $('[data-widget="treeview"]').Treeview('init');
        });
    </script>
</body>
</html>
