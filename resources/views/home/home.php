<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HMIF ITATS - Homepage</title>
    <link rel="icon" type="image/png" href="./public/image/HMIF_1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #EFEBEBFF;
            --secondary-color:rgb(204, 0, 173);
            --light-color: #FFFFFF;
            --dark-color: #1C1C1C;
            --hima-blue: #00529B;
        }

        .navbar {
            background: var(--primary-color);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link {
            color: var(--hima-blue) !important;
        }

        .navbar-nav .nav-link:hover {
            color: var(--secondary-color) !important;
        }

        .btn-primary {
            background-color: var(--secondary-color) !important;
            border-color: var(--secondary-color) !important;
        }
        .btn-primary:hover {
            background-color:rgb(146, 10, 105) !important; /* Oranye lebih gelap saat hover */
            border-color:rgb(146, 10, 105) !important;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="wrapper">
        <?php include './resources/views/include/navbar.php'; ?>
        
        <!-- Hero Section with Carousel -->
        <section id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="hero-slide d-flex align-items-center justify-content-center text-white text-center"
                        style="background: url('./public/image/IMG_6334.jpg') center/cover no-repeat; height: 500px; width: 100%;">
                        <div class="overlay"></div>
                        <div class="container position-relative">
                            <h1>Selamat Datang di Himpunan Mahasiswa Teknik Informatika</h1>
                            <p class="lead">Membangun Masa Depan Bersama</p>
                            <a href="#" class="btn btn-lg btn-warning">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="hero-slide d-flex align-items-center justify-content-center text-white text-center"
                        style="background: url('./public/image/IMG-20240621-WA0042.jpg') center/cover no-repeat; height: 500px; width: 100%;">
                        <div class="overlay"></div>
                        <div class="container position-relative">
                            <h1>Bersama Menuju Prestasi</h1>
                            <p class="lead">Mewujudkan Mahasiswa Informatika yang Kompeten</p>
                            <a href="#" class="btn btn-lg btn-warning">Jelajahi</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="hero-slide d-flex align-items-center justify-content-center text-white text-center"
                        style="background: url('./public/image/2025_03_15_15_29_IMG_3918.jpg') center/cover no-repeat; height: 500px; width: 100%;">
                        <div class="overlay"></div>
                        <div class="container position-relative">
                            <h1>Inovasi & Teknologi</h1>
                            <p class="lead">Mendorong Kreativitas dan Keahlian Teknologi</p>
                            <a href="#" class="btn btn-lg btn-warning">Pelajari</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </section>

        <!-- Info Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 scroll-fade">
                        <div class="card p-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                            <h4 class="mt-3">Komunitas</h4>
                            <p>Bergabung dengan komunitas kami untuk saling berbagi dan bertumbuh.</p>
                        </div>
                    </div>
                    <div class="col-md-4 scroll-fade">
                        <div class="card p-3">
                            <i class="fas fa-handshake fa-3x text-success"></i>
                            <h4 class="mt-3">Kolaborasi</h4>
                            <p>Kami bekerja sama dengan berbagai organisasi untuk menciptakan dampak positif.</p>
                        </div>
                    </div>
                    <div class="col-md-4 scroll-fade">
                        <div class="card p-3">
                            <i class="fas fa-bullhorn fa-3x text-danger"></i>
                            <h4 class="mt-3">Event</h4>
                            <p>Ikuti berbagai event menarik yang kami adakan sepanjang tahun.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 scroll-fade">
            <div class="container">
                <h2 class="text-center mb-4">Event Terbaru</h2>
                <div class="row">
                    <div class="col-md-4 scroll-fade">
                        <div class="card">
                            <img src="./public/image/WEBINAR1.jpg" class="card-img-top" alt="Event">
                            <div class="card-body">
                                <h5 class="card-title">Webinar Teknologi Informasi</h5>
                                <p class="card-text">Memberikan informasi terkait perkembangan kecerdasan buatan.</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 scroll-fade">
                        <div class="card">
                            <img src="./public/image/2025_03_15_15_29_IMG_3918.jpg" class="card-img-top" alt="Event">
                            <div class="card-body">
                                <h5 class="card-title">Bakti Sosial HMIF 2025</h5>
                                <p class="card-text">Berbagi kebahagiaan dibulan ramadhan yang penuh berkah.</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 scroll-fade">
                        <div class="card">
                            <img src="./public/image/IMG_6334.jpg" class="card-img-top" alt="Event">
                            <div class="card-body">
                                <h5 class="card-title">Pelatihan Manajemen Organisasi</h5>
                                <p class="card-text">Membangun keahlian anggota himpunan untuk manajemen himpunan terstruktur.</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
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
