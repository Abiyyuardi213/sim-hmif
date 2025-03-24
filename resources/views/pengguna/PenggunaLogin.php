<?php

if (isset($_SESSION['user_id'])) {
    header("Location: index.php?modul=pegawai&fitur=login");
    exit();
}
$message = $_GET['error'] ?? "";
$logoutSuccess = isset($_SESSION['logout_success']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HMIF ITATS</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    
    <!-- AdminLTE & Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            background: url('./public/image/itatsGraha.webp') center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card login-card shadow-lg">
            <div class="card-body login-card-body">
                <div class="text-center mb-4">
                    <img src="./public/image/HMIF_1.png" alt="Logo" width="100">
                </div>
                <h4 class="text-center font-weight-bold">Login Admin</h4>
                <form action="index.php?modul=pengguna&fitur=login" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text" onclick="togglePassword()">
                                <i id="eyeIcon" class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </div>
                </form>
                <p class="mt-3 text-center">
                    <a href="index.php?modul=home">Kembali ke Beranda</a>
                </p>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.getElementById("eyeIcon");
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
