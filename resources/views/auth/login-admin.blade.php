<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Admin - Desa Rejosari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #1e40af;
            --primary-dark: #1e3a8a;
            --secondary: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --dark: #1e293b;
            --light: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light);
        }

        /* ============ LOGIN PAGE STYLES ============ */
        .login-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            display: flex;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-left h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .login-left p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .login-left .features {
            margin-top: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .feature-item i {
            font-size: 1.5rem;
            margin-right: 15px;
            background: rgba(255,255,255,0.2);
            padding: 10px;
            border-radius: 10px;
        }

        .login-right {
            flex: 1;
            padding: 60px 40px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .login-header .logo i {
            font-size: 2.5rem;
            color: white;
        }

        .login-header h2 {
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #64748b;
        }

        .form-floating label {
            color: #64748b;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            padding: 12px 15px;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 14px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        /* ============ DASHBOARD STYLES ============ */
        .dashboard-page {
            display: none;
        }

        .dashboard-page.active {
            display: block;
        }

        .wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: var(--dark);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s;
        }

        .admin-sidebar.collapsed {
            margin-left: -260px;
        }

        .sidebar-header {
            padding: 25px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin: 0;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-section-title {
            padding: 15px 20px 10px;
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #94a3b8;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .menu-item {
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .menu-item:hover,
        .menu-item.active {
            background: rgba(255,255,255,0.05);
            color: white;
            border-left-color: #667eea;
        }

        .menu-item i {
            width: 24px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .menu-item .badge {
            margin-left: auto;
        }

        /* Main Content */
        .admin-content {
            flex: 1;
            margin-left: 260px;
            transition: all 0.3s;
        }

        .admin-content.expanded {
            margin-left: 0;
        }

        .top-navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn-toggle {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-btn {
            position: relative;
            background: #f1f5f9;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .notification-btn .badge {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Dashboard Content */
        .content-area {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: var(--dark);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .stat-icon.success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .stat-icon.warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .stat-icon.danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .stat-info h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .stat-info p {
            color: #64748b;
            margin: 0;
            font-size: 0.9rem;
        }

        .stat-info small {
            color: #10b981;
            font-size: 0.85rem;
        }

        /* Data Cards */
        .data-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }

        .data-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f5f9;
        }

        .data-card-header h5 {
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .table-custom {
            width: 100%;
        }

        .table-custom thead {
            background: #f8fafc;
        }

        .table-custom th {
            padding: 12px;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .table-custom td {
            padding: 12px;
            vertical-align: middle;
        }

        .table-custom tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s;
        }

        .table-custom tbody tr:hover {
            background: #f8fafc;
        }

        .badge-custom {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            margin: 0 2px;
        }

        .btn-action.view {
            background: #e0f2fe;
            color: #0369a1;
        }

        .btn-action.edit {
            background: #fef3c7;
            color: #92400e;
        }

        .btn-action.delete {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }

        /* Chart Card */
        .chart-container {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-left {
                padding: 40px 30px;
            }

            .login-right {
                padding: 40px 30px;
            }

            .admin-sidebar {
                margin-left: -260px;
            }

            .admin-sidebar.active {
                margin-left: 0;
            }

            .admin-content {
                margin-left: 0;
            }

            .content-area {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- ============ LOGIN PAGE ============ -->
    <div class="login-page" id="loginPage">
        <div class="login-container">
            <div class="login-left">
                <h1>Selamat Datang di Portal Admin Desa Rejosari</h1>
                <p>Sistem manajemen administrasi desa yang terintegrasi untuk melayani masyarakat dengan lebih baik.</p>
                
                <div class="features">
                    <div class="feature-item">
                        <i class="bi bi-shield-check"></i>
                        <div>
                            <strong>Keamanan Terjamin</strong>
                            <p class="mb-0">Sistem keamanan berlapis untuk melindungi data</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-lightning-charge"></i>
                        <div>
                            <strong>Proses Cepat</strong>
                            <p class="mb-0">Pengelolaan surat dan dokumen lebih efisien</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-graph-up"></i>
                        <div>
                            <strong>Laporan Real-time</strong>
                            <p class="mb-0">Dashboard analitik yang komprehensif</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="login-right">
                <div class="login-header">
                    <div class="logo">
                        <i class="bi bi-building"></i>
                    </div>
                    <h2>Login Perangkat Desa</h2>
                    <p>Masukkan kredensial Anda untuk melanjutkan</p>
                </div>

                <form onsubmit="handleLogin(event)">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                        <label for="email"><i class="bi bi-envelope me-2"></i>Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </button>
                </form>

                <div class="login-footer">
                    <p class="mb-2"><a href="#" class="text-decoration-none">Lupa Password?</a></p>
                    <p class="mb-0">Bukan Perangkat Desa? <a href="#" class="text-decoration-none fw-semibold">Login Warga</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ DASHBOARD PAGE ============ -->
    <div class="dashboard-page" id="dashboardPage">
        <div class="wrapper">
            <!-- Sidebar -->
            <aside class="admin-sidebar" id="adminSidebar">
                <div class="sidebar-header">
                    <h3><i class="bi bi-building me-2"></i>Admin Desa</h3>
                </div>

                <nav class="sidebar-menu">
                    <div class="menu-section-title">MENU UTAMA</div>
                    <a href="#" class="menu-item active">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="bi bi-people"></i>
                        <span>Data Penduduk</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Pengajuan Surat</span>
                        <span class="badge bg-danger">5</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="bi bi-printer"></i>
                        <span>Cetak Surat</span>
                    </a>

                    <div class="menu-section-title">ADMINISTRASI</div>
                    <a href="#" class="menu-item">
                        <i class="bi bi-house"></i>
                        <span>Data Keluarga</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="bi bi-cash-coin"></i>
                        <span>Keuangan Desa</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="bi bi-calendar-event"></i>
                        <span>Agenda & Kegiatan</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="bi bi-megaphone"></i>
                        <span>Pengumuman</span>
                    </a>

                    <div class="menu-section-title">LAPORAN</div>
                    <a href="#" class="menu-item">
                        <i class="bi bi-graph-up"></i>
                        <span>Statistik Desa</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Laporan Bulanan</span>
                    </a>

                    <div class="menu-section-title">PENGATURAN</div>
                    <a href="#" class="menu-item">
                        <i class="bi bi-gear"></i>
                        <span>Pengaturan Sistem</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="bi bi-person-badge"></i>
                        <span>Manajemen User</span>
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="admin-content" id="adminContent">
                <!-- Top Navbar -->
                <nav class="top-navbar">
                    <div class="navbar-left">
                        <button class="btn-toggle" onclick="toggleSidebar()">
                            <i class="bi bi-list"></i>
                        </button>
                        <div>
                            <h6 class="mb-0 fw-bold">Dashboard Admin</h6>
                            <small class="text-muted">Desa Rejosari</small>
                        </div>
                    </div>

                    <div class="navbar-right">
                        <button class="notification-btn">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-danger">3</span>
                        </button>

                        <div class="dropdown">
                            <div class="user-profile" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name=Admin+Desa&background=667eea&color=fff" class="user-avatar" alt="Admin">
                                <div class="d-none d-md-block">
                                    <strong class="d-block">Admin Desa</strong>
                                    <small class="text-muted">Kepala Desa</small>
                                </div>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="handleLogout()"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Content Area -->
                <div class="content-area">
                    <!-- Page Header -->
                    <div class="page-header">
                        <h1>Dashboard Administrasi</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Stats Cards -->
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon primary">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="stat-info">
                                <h3>2,547</h3>
                                <p>Total Penduduk</p>
                                <small><i class="bi bi-arrow-up"></i> +2.5% dari bulan lalu</small>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon success">
                                <i class="bi bi-file-earmark-check"></i>
                            </div>
                            <div class="stat-info">
                                <h3>143</h3>
                                <p>Surat Selesai</p>
                                <small><i class="bi bi-arrow-up"></i> +12% bulan ini</small>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon warning">
                                <i class="bi bi-hourglass-split"></i>
                            </div>
                            <div class="stat-info">
                                <h3>15</h3>
                                <p>Menunggu Proses</p>
                                <small class="text-warning"><i class="bi bi-clock"></i> Perlu ditindak lanjut</small>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon danger">
                                <i class="bi bi-house-fill"></i>
                            </div>
                            <div class="stat-info">
                                <h3>892</h3>
                                <p>Kepala Keluarga</p>
                                <small><i class="bi bi-arrow-up"></i> +1.2% tahun ini</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Recent Submissions -->
                        <div class="col-lg-8">
                            <div class="data-card">
                                <div class="data-card-header">
                                    <h5><i class="bi bi-inbox me-2"></i>Pengajuan Surat Terbaru</h5>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table-custom">
                                        <thead>
                                            <tr>
                                                <th>Nama Pemohon</th>
                                                <th>Jenis Surat</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Budi+Santoso&size=35" class="rounded-circle me-2" alt="">
                                                        <strong>Budi Santoso</strong>
                                                    </div>
                                                </td>
                                                <td>Surat Keterangan Usaha</td>
                                                <td>23 Nov 2025</td>
                                                <td><span class="badge badge-custom bg-warning">Menunggu</span></td>
                                                <td>
                                                    <button class="btn-action view"><i class="bi bi-eye"></i></button>
                                                    <button class="btn-action edit"><i class="bi bi-check2"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Siti+Aminah&size=35" class="rounded-circle me-2" alt="">
                                                        <strong>Siti Aminah</strong>
                                                    </div>
                                                </td>
                                                <td>Surat Keterangan Domisili</td>
                                                <td>23 Nov 2025</td>
                                                <td><span class="badge badge-custom bg-info">Diproses</span></td>
                                                <td>
                                                    <button class="btn-action view"><i class="bi bi-eye"></i></button>
                                                    <button class="btn-action edit"><i class="bi bi-check2"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Ahmad+Yani&size=35" class="rounded-circle me-2" alt="">
                                                        <strong>Ahmad Yani</strong>
                                                    </div>
                                                </td>
                                                <td>Surat Pengantar SKCK</td>
                                                <td>22 Nov 2025</td>
                                                <td><span class="badge badge-custom bg-success">Selesai</span></td>
                                                <td>
                                                    <button class="btn-action view"><i class="bi bi-eye"></i></button>
                                                    <button class="btn-action delete"><i class="bi bi-printer"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Dewi+Lestari&size=35" class="rounded-circle me-2" alt="">
                                                        <strong>Dewi Lestari</strong>
                                                    </div>
                                                </td>
                                                <td>Surat Keterangan Nikah</td>
                                                <td>22 Nov 2025</td>
                                                <td><span class="badge badge-custom bg-warning">Menunggu</span></td>
                                                <td>
                                                    <button class="btn-action view"><i class="bi bi-eye"></i></button>
                                                    <button class="btn-action edit"><i class="bi bi-check2"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Eko+Prasetyo&size=35" class="rounded-circle me-2" alt="">
                                                        <strong>Eko Prasetyo</strong>
                                                    </div>
                                                </td>
                                                <td>Surat Keterangan Tidak Mampu</td>
                                                <td>21 Nov 2025</td>
                                                <td><span class="badge badge-custom bg-success">Selesai</span></td>
                                                <td>
                                                    <button class="btn-action view"><i class="bi bi-eye"></i></button>
                                                    <button class="btn-action delete"><i class="bi bi-printer"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats & Activities -->
                        <div class="col-lg-4">
                            <!-- Activity Log -->
                            <div class="data-card">
                                <div class="data-card-header">
                                    <h5><i class="bi bi-activity me-2"></i>Aktivitas Terkini</h5>
                                </div>
                                <div class="activity-list">
                                    <div class="activity-item mb-3 pb-3 border-bottom">
                                        <div class="d-flex align-items-start">
                                            <div class="activity-icon bg-success text-white rounded-circle p-2 me-3">
                                                <i class="bi bi-check2"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fw-semibold">Surat Disetujui</p>
                                                <small class="text-muted">Ahmad Yani - SKCK</small>
                                                <br>
                                                <small class="text-muted"><i class="bi bi-clock"></i> 5 menit lalu</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activity-item mb-3 pb-3 border-bottom">
                                        <div class="d-flex align-items-start">
                                            <div class="activity-icon bg-primary text-white rounded-circle p-2 me-3">
                                                <i class="bi bi-file-earmark-plus"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fw-semibold">Pengajuan Baru</p>
                                                <small class="text-muted">Budi Santoso - Surat Usaha</small>
                                                <br>
                                                <small class="text-muted"><i class="bi bi-clock"></i> 15 menit lalu</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activity-item mb-3 pb-3 border-bottom">
                                        <div class="d-flex align-items-start">
                                            <div class="activity-icon bg-info text-white rounded-circle p-2 me-3">
                                                <i class="bi bi-person-plus"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fw-semibold">Penduduk Baru</p>
                                                <small class="text-muted">Rini Wulandari terdaftar</small>
                                                <br>
                                                <small class="text-muted"><i class="bi bi-clock"></i> 1 jam lalu</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activity-item mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="activity-icon bg-warning text-white rounded-circle p-2 me-3">
                                                <i class="bi bi-megaphone"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-1 fw-semibold">Pengumuman Baru</p>
                                                <small class="text-muted">Jadwal Posyandu Desember</small>
                                                <br>
                                                <small class="text-muted"><i class="bi bi-clock"></i> 2 jam lalu</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="data-card mt-3">
                                <div class="data-card-header">
                                    <h5><i class="bi bi-lightning-fill me-2"></i>Aksi Cepat</h5>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary">
                                        <i class="bi bi-person-plus me-2"></i>Tambah Penduduk
                                    </button>
                                    <button class="btn btn-success">
                                        <i class="bi bi-printer me-2"></i>Cetak Surat
                                    </button>
                                    <button class="btn btn-info">
                                        <i class="bi bi-megaphone me-2"></i>Buat Pengumuman
                                    </button>
                                    <button class="btn btn-warning">
                                        <i class="bi bi-file-earmark-bar-graph me-2"></i>Lihat Laporan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="chart-container">
                                <h5 class="mb-4"><i class="bi bi-bar-chart me-2"></i>Statistik Surat (6 Bulan Terakhir)</h5>
                                <div style="height: 300px; display: flex; align-items: flex-end; justify-content: space-around; gap: 10px; padding: 20px; background: #f8fafc; border-radius: 8px;">
                                    <div style="flex: 1; background: linear-gradient(to top, #667eea, #764ba2); border-radius: 8px 8px 0 0; height: 70%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; color: white; padding: 10px;">
                                        <strong>Jun</strong>
                                        <small>45</small>
                                    </div>
                                    <div style="flex: 1; background: linear-gradient(to top, #667eea, #764ba2); border-radius: 8px 8px 0 0; height: 85%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; color: white; padding: 10px;">
                                        <strong>Jul</strong>
                                        <small>62</small>
                                    </div>
                                    <div style="flex: 1; background: linear-gradient(to top, #667eea, #764ba2); border-radius: 8px 8px 0 0; height: 60%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; color: white; padding: 10px;">
                                        <strong>Agu</strong>
                                        <small>38</small>
                                    </div>
                                    <div style="flex: 1; background: linear-gradient(to top, #667eea, #764ba2); border-radius: 8px 8px 0 0; height: 95%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; color: white; padding: 10px;">
                                        <strong>Sep</strong>
                                        <small>71</small>
                                    </div>
                                    <div style="flex: 1; background: linear-gradient(to top, #667eea, #764ba2); border-radius: 8px 8px 0 0; height: 78%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; color: white; padding: 10px;">
                                        <strong>Okt</strong>
                                        <small>53</small>
                                    </div>
                                    <div style="flex: 1; background: linear-gradient(to top, #667eea, #764ba2); border-radius: 8px 8px 0 0; height: 100%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; color: white; padding: 10px;">
                                        <strong>Nov</strong>
                                        <small>82</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="chart-container">
                                <h5 class="mb-4"><i class="bi bi-pie-chart me-2"></i>Jenis Surat Populer</h5>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <div class="p-3 bg-light rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-semibold">Surat Domisili</span>
                                                <span class="badge bg-primary">35%</span>
                                            </div>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-primary" style="width: 35%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="p-3 bg-light rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-semibold">Surat Usaha</span>
                                                <span class="badge bg-success">28%</span>
                                            </div>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 28%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="p-3 bg-light rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-semibold">SKCK</span>
                                                <span class="badge bg-warning">22%</span>
                                            </div>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 22%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="p-3 bg-light rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-semibold">Surat Nikah</span>
                                                <span class="badge bg-info">15%</span>
                                            </div>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-info" style="width: 15%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 p-3 bg-light rounded">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h4 class="mb-0 text-primary">143</h4>
                                            <small class="text-muted">Total Bulan Ini</small>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="mb-0 text-success">128</h4>
                                            <small class="text-muted">Selesai</small>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="mb-0 text-warning">15</h4>
                                            <small class="text-muted">Proses</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle Login
        function handleLogin(e) {
            e.preventDefault();
            // Simulate login
            document.getElementById('loginPage').style.display = 'none';
            document.getElementById('dashboardPage').classList.add('active');
        }

        // Handle Logout
        function handleLogout() {
            document.getElementById('dashboardPage').classList.remove('active');
            document.getElementById('loginPage').style.display = 'flex';
        }

        // Toggle Sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const content = document.getElementById('adminContent');
            
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        }

        // Menu Active State
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Responsive Sidebar
        if (window.innerWidth <= 768) {
            document.getElementById('adminSidebar').classList.add('collapsed');
            document.getElementById('adminContent').classList.add('expanded');
        }

        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                document.getElementById('adminSidebar').classList.add('collapsed');
                document.getElementById('adminContent').classList.add('expanded');
            }
        });
    </script>
</body>
</html>