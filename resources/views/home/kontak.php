<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF ITATS - Kontak</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <?php include './resources/views/include/navbar.php'; ?>
    
    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center text-center text-white"
        style="height: 400px; background: url('./public/image/contact-banner.jpg') center/cover no-repeat; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
        <div class="container position-relative">
            <h1>Hubungi Kami</h1>
            <p class="lead">Jangan ragu untuk menghubungi kami jika ada pertanyaan atau kolaborasi</p>
        </div>
    </section>

    <!-- Informasi Kontak -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Informasi Kontak</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="fas fa-map-marker-alt fa-3x text-primary"></i>
                    <h5 class="mt-3">Alamat</h5>
                    <p>Jl. Arief Rahman Hakim No.100, Surabaya</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-envelope fa-3x text-primary"></i>
                    <h5 class="mt-3">Email</h5>
                    <p>hmif@itats.ac.id</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-phone fa-3x text-primary"></i>
                    <h5 class="mt-3">Telepon</h5>
                    <p>+62 812-3456-7890</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulir Kontak -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Kirim Pesan</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="proses_kontak.php" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include './resources/views/include/footer.php'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
