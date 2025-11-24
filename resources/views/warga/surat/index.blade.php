<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Pengajuan Surat - Desa Rejosari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <style>
        /* Custom Styles for Service Grid */
        .service-card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
            height: 100%;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
            position: relative;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
            border-color: var(--primary-color);
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-color);
            transform: scaleX(0);
            transition: transform 0.3s ease;
            transform-origin: left;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: var(--svc-bg, #eff6ff);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
            background: var(--primary-color);
            color: #fff;
        }

        .service-icon i {
            font-size: 1.8rem;
            color: var(--svc-icon-color, var(--primary-color));
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon i {
            color: #fff;
        }

        .service-title {
            font-weight: 600;
            color: #1e293b;
            text-align: center;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .service-desc {
            font-size: 0.85rem;
            color: #64748b;
            text-align: center;
        }

        .search-container {
            position: relative;
            max-width: 500px;
            margin: 0 auto 40px;
        }

        .search-input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border-radius: 50px;
            border: 1px solid #cbd5e1;
            font-size: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.2rem;
        }

        .empty-state {
            display: none;
            text-align: center;
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><i class="bi bi-house-heart-fill me-2"></i>Portal Warga</h3>
                <strong>PW</strong>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('warga.dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-person-circle"></i>
                        Profil Saya
                    </a>
                </li>
                <li class="{{ request()->routeIs('warga.surat.index') ? 'active' : '' }}">
                    <a href="{{ route('warga.surat.index') }}">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        Pengajuan Surat
                    </a>
                </li>
                <li>
                    <a href="{{ route('warga.layanan.index') }}">
                        <i class="bi bi-clock-history"></i>
                        Riwayat Pengajuan
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-megaphone-fill"></i>
                        Informasi Desa
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-calendar-event"></i>
                        Agenda Kegiatan
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-cash-coin"></i>
                        Iuran Warga
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-question-circle-fill"></i>
                        Bantuan
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li>
                    <form action="{{ route('logout') }}" method="POST" id="logoutFormSidebar">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logoutFormSidebar').submit();" class="logout">
                            <i class="bi bi-box-arrow-right"></i>
                            Keluar
                        </a>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="ms-auto d-flex align-items-center">
                        <span class="navbar-text me-3 d-none d-md-inline">
                            Selamat Datang, <strong>{{ Auth::user()->penduduk->nama_lengkap ?? 'Warga' }}</strong>
                        </span>
                        <div class="dropdown d-inline-block">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->penduduk->nama_lengkap ?? 'Warga') }}&background=2563eb&color=fff&size=35" alt="Avatar" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i>Profil Saya</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" id="logoutFormNav">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-dark mb-2">Layanan Surat Online</h2>
                    <p class="text-muted">Pilih jenis surat yang ingin Anda ajukan</p>
                </div>

                <!-- Search Filter -->
                <div class="search-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" id="searchInput" class="search-input" placeholder="Cari layanan surat... (contoh: Usaha, Domisili)">
                </div>

                <!-- Service Grid -->
                <div class="row g-4" id="serviceGrid">
                    @forelse($jenisSurat as $surat)
                        <div class="col-md-4 col-lg-3 service-item">
                            <a href="{{ route('warga.surat.create', ['id' => $surat->id]) }}" class="service-card">
                                @php
                                    $bgColor = $surat->warna_bg ?: '#eff6ff';
                                    $iconColor = $surat->warna_bg ? '#fff' : 'var(--primary-color)';
                                    $iconClass = $surat->icon ?: 'fa-solid fa-file-lines';
                                @endphp
                                <div class="service-icon" style="--svc-bg: {{ $bgColor }}; --svc-icon-color: {{ $iconColor }};">
                                    <i class="{{ $iconClass }}"></i>
                                </div>
                                <h5 class="service-title">{{ $surat->nama_surat }}</h5>
                                <p class="service-desc text-muted mb-0">Klik untuk mengajukan</p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486754.png" alt="Empty" style="width: 100px; opacity: 0.5;">
                            <p class="mt-3 text-muted">Belum ada jenis surat yang tersedia.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Empty State for Search -->
                <div id="noResults" class="empty-state">
                    <i class="bi bi-search display-4 text-muted mb-3"></i>
                    <h5 class="text-muted">Layanan tidak ditemukan</h5>
                    <p class="text-muted">Coba kata kunci lain.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });

        // Mobile Sidebar Auto-close
        if (window.innerWidth <= 768) {
            document.getElementById('content').addEventListener('click', function() {
                if (!document.getElementById('sidebar').classList.contains('active')) {
                    document.getElementById('sidebar').classList.add('active');
                }
            });
        }

        // Live Search Functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let items = document.querySelectorAll('.service-item');
            let hasVisibleItems = false;

            items.forEach(function(item) {
                let title = item.querySelector('.service-title').textContent.toLowerCase();
                if (title.includes(filter)) {
                    item.style.display = '';
                    hasVisibleItems = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/Hide Empty State
            document.getElementById('noResults').style.display = hasVisibleItems ? 'none' : 'block';
        });
    </script>
</body>
</html>
