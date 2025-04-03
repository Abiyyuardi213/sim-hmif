<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF ITATS - Organisasi</title>
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
        style="height: 400px; background: url('./public/image/struktur.jpg') center/cover no-repeat; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
        <div class="container position-relative">
            <h1>Struktur Organisasi HMIF ITATS</h1>
            <p class="lead">Mengenal lebih dekat kepengurusan dan perannya dalam organisasi</p>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Struktur Organisasi</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/ketua.jpg" class="card-img-top rounded-circle" alt="Ketua">
                        <h4 class="mt-3">Nama Ketua</h4>
                        <p>Ketua HMIF ITATS</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/wakil_ketua.jpg" class="card-img-top rounded-circle" alt="Wakil Ketua">
                        <h4 class="mt-3">Nama Wakil Ketua</h4>
                        <p>Wakil Ketua HMIF ITATS</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/sekretaris.jpg" class="card-img-top rounded-circle" alt="Sekretaris">
                        <h4 class="mt-3">Nama Sekretaris</h4>
                        <p>Sekretaris HMIF ITATS</p>
                    </div>
                </div>
            </div>

            <div class="row text-center mt-4">
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/bendahara.jpg" class="card-img-top rounded-circle" alt="Bendahara">
                        <h4 class="mt-3">Nama Bendahara</h4>
                        <p>Bendahara HMIF ITATS</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/divisi_kaderisasi.jpg" class="card-img-top rounded-circle" alt="Divisi Kaderisasi">
                        <h4 class="mt-3">Nama Kepala Divisi</h4>
                        <p>Divisi Kaderisasi</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="./public/image/divisi_humas.jpg" class="card-img-top rounded-circle" alt="Divisi Humas">
                        <h4 class="mt-3">Nama Kepala Divisi</h4>
                        <p>Divisi Humas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deskripsi Jabatan -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Peran & Tanggung Jawab</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Ketua</h4>
                    <p>Bertanggung jawab atas jalannya organisasi, memimpin rapat, dan membuat keputusan strategis.</p>
                </div>
                <div class="col-md-6">
                    <h4>Wakil Ketua</h4>
                    <p>Mendukung Ketua dalam menjalankan tugas serta menggantikan Ketua saat berhalangan.</p>
                </div>
                <div class="col-md-6">
                    <h4>Sekretaris</h4>
                    <p>Mengelola administrasi, menyusun notulen rapat, dan mengarsipkan dokumen penting.</p>
                </div>
                <div class="col-md-6">
                    <h4>Bendahara</h4>
                    <p>Mengelola keuangan organisasi, mencatat pemasukan dan pengeluaran dengan transparan.</p>
                </div>
                <div class="col-md-6">
                    <h4>Divisi Kaderisasi</h4>
                    <p>Mengembangkan potensi anggota melalui pelatihan, seminar, dan mentoring.</p>
                </div>
                <div class="col-md-6">
                    <h4>Divisi Humas</h4>
                    <p>Membangun hubungan dengan pihak eksternal serta mengelola komunikasi publik.</p>
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
