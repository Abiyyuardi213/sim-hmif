<?php
if (!isset($_SESSION['id_user'])) {
    header("Location: index.php?modul=pengguna&fitur=login&message=Harap login terlebih dahulu");
    exit();
}

$user = [
    'nama_user' => $_SESSION['nama_user'],
    'username' => $_SESSION['username'],
    'email_user' => $_SESSION['email_user'],
    'profile_picture' => $_SESSION['profile_picture'] ?? 'default.png'
];

$message = $_GET['message'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - HMIF ITATS</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Font Source Sans Pro (AdminLTE 3 Default) -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif !important;
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
                    <h1>Profil Pengguna</h1>
                </div>
            </div>
            
            <section class="content">
                <div class="container-fluid">
                    <?php if ($message) : ?>
                        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
                    <?php endif; ?>
                    
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="uploads/profile_pictures/<?= htmlspecialchars($user['profile_picture']) ?>" alt="Foto Profil" class="img-thumbnail rounded-circle" width="150">
                            <h3><?= htmlspecialchars($user['username']) ?></h3>
                            <p><?= htmlspecialchars($user['email_user']) ?></p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="index.php?modul=pengguna&fitur=edit-profil" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="profile_picture">Foto Profil (Opsional)</label>
                                    <input type="file" class="form-control" name="profile_picture" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_user">Nama Pengguna</label>
                                    <input type="text" class="form-control" name="nama_user" value="<?= htmlspecialchars($user['nama_user']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email_user">Email</label>
                                    <input type="email_user" class="form-control" name="email_user" value="<?= htmlspecialchars($user['email_user']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password Baru (Kosongkan jika tidak ingin mengubah)</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <span class="input-group-text" onclick="togglePassword()">
                                            <i id="eyeIcon" class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="index.php?modul=dashboard" class="btn btn-secondary">Kembali</a>
                            </form>
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

    <script>
        function togglePassword() {
            let passwordField = document.getElementById('password');
            let eyeIcon = document.getElementById('eyeIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
        $(document).ready(function () {
            $('[data-widget="treeview"]').Treeview('init');
        });
    </script>
</body>
</html>