<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF ITATS - Tentang</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .hero {
            position: relative;
            height: 400px;
            background: url('./public/image/2025_03_15_15_29_IMG_3918.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero .content {
            position: relative;
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
        }

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
    
    <section class="hero">
        <div class="overlay"></div>
        <div class="container position-relative text-white">
            <div class="content">
                <h1>Tentang Kami</h1>
                <p class="lead">Mengenal lebih dekat Himpunan Mahasiswa Teknik Informatika ITATS</p>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Visi & Misi</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Visi</h4>
                    <p>Menjadi wadah pengembangan mahasiswa Teknik Informatika ITATS yang inovatif, kompetitif, dan berdaya saing tinggi dalam dunia teknologi.</p>
                </div>
                <div class="col-md-6">
                    <h4>Misi</h4>
                    <ul>
                        <li>Mengembangkan keterampilan teknologi mahasiswa.</li>
                        <li>Meningkatkan hubungan dan kerja sama dengan pihak eksternal.</li>
                        <li>Menyelenggarakan kegiatan edukatif dan sosial.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Tim Pengurus</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/pengurus1.jpg" class="card-img-top rounded-circle" alt="Ketua">
                        <h4 class="mt-3">Nama Ketua</h4>
                        <p>Ketua HMIF ITATS</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/pengurus2.jpg" class="card-img-top rounded-circle" alt="Wakil Ketua">
                        <h4 class="mt-3">Nama Wakil Ketua</h4>
                        <p>Wakil Ketua HMIF ITATS</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/pengurus3.jpg" class="card-img-top rounded-circle" alt="Sekretaris">
                        <h4 class="mt-3">Nama Sekretaris</h4>
                        <p>Sekretaris HMIF ITATS</p>
                    </div>
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
