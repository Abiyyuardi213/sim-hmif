<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a href="index.php?modul=home" class="navbar-brand d-flex align-items-center ms-3">
            <img src="./public/image/ITATS.png" alt="Logo" class="me-2" style="height: 40px;">
            <img src="./public/image/hima.png" alt="Logo" class="me-2" style="height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="color: #00529B;"></i>
        </button>
        <?php $modul = isset($_GET['modul']) ? $_GET['modul'] : 'home'; ?>
        <!-- Navigasi -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="index.php?modul=home" class="nav-link <?= ($modul == 'home') ? 'active' : '' ?>">Beranda</a></li>
                <li class="nav-item"><a href="index.php?modul=about" class="nav-link <?= ($modul == 'about') ? 'active' : '' ?>">Tentang</a></li>
                <li class="nav-item"><a href="index.php?modul=organisasi" class="nav-link <?= ($modul == 'organisasi') ? 'active' : '' ?>">Organisasi</a></li>
                <li class="nav-item"><a href="index.php?modul=event" class="nav-link <?= ($modul == 'event') ? 'active' : '' ?>">Event</a></li>
                <li class="nav-item"><a href="index.php?modul=kontak" class="nav-link <?= ($modul == 'kontak') ? 'active' : '' ?>">Kontak</a></li>
                <li class="nav-item"><a href="index.php?modul=pengguna&fitur=login" class="nav-link">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
