<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF - Detail Pengguna</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif !important;
        }
        .profile-img {
            width: 200px; /* Ukuran tetap */
            height: 250px;
            max-width: 100%; /* Agar responsif */
            max-height: 100%;
            object-fit: cover; /* Menyesuaikan gambar agar tidak terdistorsi */
            border: 3px solid #ddd;
        }
    </style>
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
                            <h1 class="m-0">Detail Pengguna</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengguna</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="<?= $pengguna['profile_picture'] ? './uploads/profile_pictures/' . htmlspecialchars($pengguna['profile_picture']) : './public/image/default-avatar.png'; ?>" 
                                        class="profile-img img-fluid" alt="Foto Profil">
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ID Pengguna</th>
                                            <td><?= htmlspecialchars($pengguna['id_user']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= htmlspecialchars($pengguna['nama_user']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?= htmlspecialchars($pengguna['email_user']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td><?= htmlspecialchars($pengguna['username']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Peran</th>
                                            <td><?= htmlspecialchars($pengguna['role_name']); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="index.php?modul=pengguna&fitur=list" class="btn btn-secondary">
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