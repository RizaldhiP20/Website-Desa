<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Desa Rejosari - Kecamatan Deket, Kabupaten Lamongan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/preloader.css', 'resources/css/dashboard.css', 'resources/js/app.js'])
    
    <style>
        /* Navbar adjustment for sub-pages */
        #mainNav {
            background-color: #212529; /* Always dark on sub-pages */
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        body {
            padding-top: 70px; /* Space for fixed navbar */
        }
    </style>
</head>
<body id="page-top">
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('dokumen/logo-lamongan.png') }}" alt="Loading..." class="logo">
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('landing') }}">
                <img src="{{ asset('dokumen/logo-lamongan.png') }}" alt="Logo Desa Rejosari">
                <div class="brand-text">
                    <div class="brand-name">Desa Rejosari</div>
                    <div class="brand-sub">Kecamatan Deket, Kabupaten Lamongan</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#profil">Profil Desa</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#kegiatan">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::routeIs('public.statistik') ? 'active' : '' }}" href="{{ route('public.statistik') }}">Statistik</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#lokasi">Lokasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container px-4 px-lg-5">
            <div class="footer-content" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-bottom:2rem">
                <div class="footer-section">
                    <h5 style="color:var(--secondary-yellow)">Tentang Desa Rejosari</h5>
                    <p style="color:#e0e0e0;line-height:1.8">Desa Rejosari adalah desa di Kecamatan Deket, Kabupaten Lamongan yang berkomitmen memberikan pelayanan terbaik kepada masyarakat melalui sistem digital.</p>
                </div>
                <div class="footer-section">
                    <h5 style="color:var(--secondary-yellow)">Link Cepat</h5>
                    <ul style="list-style:none;padding:0">
                        <li><a href="{{ route('landing') }}" class="text-white text-decoration-none">Beranda</a></li>
                        <li><a href="{{ route('landing') }}#profil" class="text-white text-decoration-none">Profil Desa</a></li>
                        <li><a href="{{ route('landing') }}#kegiatan" class="text-white text-decoration-none">Kegiatan Desa</a></li>
                        <li><a href="{{ route('landing') }}#layanan" class="text-white text-decoration-none">Layanan Online</a></li>
                        <li><a href="{{ route('landing') }}#lokasi" class="text-white text-decoration-none">Lokasi Desa</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h5 style="color:var(--secondary-yellow)">Kontak Kami</h5>
                    <ul style="list-style:none;padding:0;color:#e0e0e0">
                        <li><i class="bi-geo-alt me-2"></i> Jl. Raya Rejosari No.1</li>
                        <li><i class="bi-telephone me-2"></i> (0322) 123456</li>
                        <li><i class="bi-envelope me-2"></i> desarejosari@lamongankab.go.id</li>
                    </ul>
                </div>
            </div>
            <hr style="border-color:rgba(255,255,255,0.1);">
            <div class="text-center">
                <p class="mb-0" style="color:#e0e0e0">&copy; 2024 Desa Rejosari - Kecamatan Deket, Kabupaten Lamongan. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
