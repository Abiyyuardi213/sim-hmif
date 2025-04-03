<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF ITATS - Event</title>
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
        style="height: 400px; background: url('./public/image/event-banner.jpg') center/cover no-repeat; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
        <div class="container position-relative">
            <h1>Event & Kegiatan HMIF ITATS</h1>
            <p class="lead">Jangan lewatkan berbagai acara seru dan edukatif yang kami selenggarakan</p>
        </div>
    </section>

    <!-- Daftar Event -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Daftar Event</h2>
            <div class="row">
                <?php 
                // Contoh data event (bisa diambil dari database)
                $events = [
                    [
                        "image" => "./public/image/event1.jpg",
                        "title" => "Workshop Web Development",
                        "date" => "20 April 2025",
                        "description" => "Belajar membangun website dari dasar hingga tingkat lanjut."
                    ],
                    [
                        "image" => "./public/image/event2.jpg",
                        "title" => "Seminar AI & Machine Learning",
                        "date" => "15 Mei 2025",
                        "description" => "Mengupas tren terbaru dalam kecerdasan buatan dan pembelajaran mesin."
                    ],
                    [
                        "image" => "./public/image/event3.jpg",
                        "title" => "Lomba CTF Cyber Security",
                        "date" => "30 Juni 2025",
                        "description" => "Uji kemampuan hacking secara legal dalam kompetisi Capture The Flag."
                    ]
                ];

                foreach ($events as $event): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?php echo $event['image']; ?>" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $event['title']; ?></h5>
                                <p class="card-text"><strong>Tanggal:</strong> <?php echo $event['date']; ?></p>
                                <p class="card-text"><?php echo $event['description']; ?></p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
