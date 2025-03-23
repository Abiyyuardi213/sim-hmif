<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - HMIF ITATS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include '../include/navbarSistem.php'; ?>
        <?php include '../include/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <h1>Profil Pengguna</h1>
                </div>
            </div>
            
            <section class="content">
                <div class="container-fluid">
                    <?php if ($message) : ?>
                        <div class="alert alert-info"> <?= $message ?> </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
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
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

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
    </script>
</body>
</html>