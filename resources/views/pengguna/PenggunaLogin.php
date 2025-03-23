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
    
    <!-- Bootstrap 5 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            background: url('./public/image/itatsGraha.webp') center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .btn-login {
            width: 100%;
            background: #007bff;
            color: white;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #0056b3;
        }

        .form-control {
            border-radius: 5px;
        }

        .login-footer {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login Admin</h2>
        <form action="index.php?modul=pengguna&fitur=login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                        <i id="eyeIcon" class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-login">Masuk</button>
            <a href="index.php?modul=home" class="btn btn-secondary mt-2 w-100">Kembali</a>
        </form>

        <div class="login-footer">
            <p>Belum punya akun? <a href="#">Daftar</a></p>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
