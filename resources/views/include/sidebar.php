<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="./public/image/hima.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminPanel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="./uploads/profile_pictures/<?php echo htmlspecialchars($_SESSION['profile_picture'] ?? 'default.png'); ?>" 
                    class="img-circle elevation-2" 
                    alt="User Image" 
                    style="width: 45px; height: 45px; object-fit: cover; border: 2px solid white;">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white font-weight-bold">
                    <?php echo htmlspecialchars($_SESSION['nama_user']); ?>
                </a>
                <span class="badge badge-success">Online</span>  
                <span class="d-block" style="color: #f39c12; font-size: 14px; font-weight: 600;">
                    <?php echo htmlspecialchars($_SESSION['role_name'] ?? 'Unknown'); ?>
                </span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="index.php?modul=dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modul=role&fitur=list" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Peran Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modul=pengguna&fitur=list" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modul=divisi&fitur=list" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>Divisi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modul=anggota&fitur=list" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Anggota</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?modul=proker&fitur=list" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Proker</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Keuangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?modul=keuangan&fitur=dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?modul=keuangan&fitur=pemasukkan" class="nav-link">
                                <i class="fas fa-arrow-down nav-icon text-success"></i>
                                <p>Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?modul=keuangan&fitur=pengeluaran" class="nav-link">
                                <i class="fas fa-arrow-up nav-icon text-danger"></i>
                                <p>Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="index.php?modul=pengumuman&fitur=list" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>