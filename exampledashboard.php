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
    <style>
        :root {
            --primary-green: #013220;
            --secondary-yellow: #ffc107;
            --light-gray: #f8f9fa;
        }
        
        body {
            font-family: 'Merriweather Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        /* Navigation */
        #mainNav {
            background-color: var(--primary-green) !important;
            padding: 1rem 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }
        
        #mainNav.navbar-scrolled {
            padding: 0.5rem 0;
        }
        
        .navbar-brand-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo-desa {
            height: 70px;
            width: auto;
        }
        
        .desa-info h1 {
            font-weight: 700;
            font-size: 1.4rem;
            color: white;
            margin: 0;
            line-height: 1.2;
        }
        
        .desa-info p {
            font-size: 0.9rem;
            color: #e0e0e0;
            margin: 0;
        }
        
        .navbar-nav {
            gap: 0.5rem;
        }
        
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 600;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--secondary-yellow) !important;
            transform: translateY(-2px);
        }
        
        .btn-login {
            background-color: var(--secondary-yellow);
            color: var(--primary-green) !important;
            font-weight: 700;
            border-radius: 25px;
            padding: 0.6rem 1.8rem !important;
            margin-left: 1rem;
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background-color: #ffb300;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
        }
        
        /* Masthead */
        .masthead {
            padding-top: 10rem;
            padding-bottom: 8rem;
            background: linear-gradient(to bottom, rgba(1, 50, 32, 0.7), rgba(1, 50, 32, 0.5)), 
                        url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920&q=80') center center;
            background-size: cover;
            background-attachment: fixed;
        }
        
        .masthead h1 {
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .masthead p {
            font-size: 1.2rem;
            line-height: 1.6;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        
        .divider {
            height: 0.25rem;
            max-width: 3.25rem;
            margin: 1.5rem auto;
            background-color: var(--secondary-yellow);
            opacity: 1;
            border: none;
        }
        
        /* Sections */
        .page-section {
            padding: 6rem 0;
        }
        
        .section-heading {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        /* Profil Desa */
        #profil {
            background: linear-gradient(135deg, var(--primary-green) 0%, #025c3a 100%);
        }
        
        .sambutan-box {
            background: rgba(255,255,255,0.1);
            padding: 2rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        /* Kegiatan Desa */
        .kegiatan-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .kegiatan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .kegiatan-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .kegiatan-card .card-body {
            padding: 1.5rem;
        }
        
        .badge-kategori {
            font-size: 0.75rem;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
        }
        
        /* Statistik */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-left: 4px solid var(--secondary-yellow);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-green);
            margin: 0.5rem 0;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #6c757d;
            font-weight: 600;
        }
        
        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-top: 2rem;
        }
        
        /* Layanan */
        #layanan {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .layanan-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .layanan-item {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .layanan-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(1, 50, 32, 0.2);
            background: var(--primary-green);
            color: white;
        }
        
        .layanan-item i {
            font-size: 3rem;
            color: var(--primary-green);
            margin-bottom: 1rem;
        }
        
        .layanan-item:hover i {
            color: var(--secondary-yellow);
        }
        
        .layanan-item h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        /* Lokasi */
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            height: 400px;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .info-box {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            height: 100%;
        }
        
        .info-item {
            display: flex;
            align-items: start;
            margin-bottom: 1.5rem;
        }
        
        .info-item i {
            font-size: 1.5rem;
            color: var(--primary-green);
            margin-right: 1rem;
            margin-top: 0.25rem;
        }
        
        /* Footer */
        footer {
            background-color: var(--primary-green);
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h5 {
            color: var(--secondary-yellow);
            margin-bottom: 1rem;
        }
        
        .footer-section ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-section ul li {
            margin-bottom: 0.5rem;
        }
        
        .footer-section a {
            color: #e0e0e0;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-section a:hover {
            color: var(--secondary-yellow);
        }
        
        /* Responsive */
        @media (max-width: 991.98px) {
            .navbar-brand-section {
                margin-bottom: 1rem;
            }
            
            .navbar-nav {
                gap: 0;
                margin-top: 1rem;
            }
            
            .navbar-nav .nav-link {
                padding: 0.75rem 0 !important;
            }
            
            .btn-login {
                margin-left: 0;
                margin-top: 1rem;
                display: block;
                width: 100%;
            }
            
            .masthead {
                padding-top: 8rem;
                padding-bottom: 6rem;
            }
            
            .masthead h1 {
                font-size: 2rem;
            }
            
            .masthead p {
                font-size: 1rem;
            }
            
            .section-heading {
                font-size: 2rem;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
            
            .layanan-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <div class="navbar-brand-section">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Coat_of_arms_of_Lamongan_Regency.svg/200px-Coat_of_arms_of_Lamongan_Regency.svg.png" 
                     alt="Logo Lamongan" class="logo-desa">
                <div class="desa-info">
                    <h1>Desa Rejosari</h1>
                    <p>Kecamatan Deket, Kabupaten Lamongan</p>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="#page-top">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#profil">Profil Desa</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan Desa</a></li>
                    <li class="nav-item"><a class="nav-link" href="#statistik">Statistik Penduduk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan Online</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lokasi">Lokasi Desa</a></li>
                    <li class="nav-item">
                        <a class="btn btn-login" href="#login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-white">Selamat Datang di Website Resmi Desa Rejosari</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white mb-5">Media informasi, transparansi, dan pelayanan administrasi digital untuk masyarakat Desa Rejosari, Kecamatan Deket, Kabupaten Lamongan.</p>
                    <a class="btn btn-warning btn-xl fw-bold px-5 py-3" href="#layanan" style="border-radius: 50px;">
                        <i class="bi-file-earmark-text me-2"></i>Ajukan Surat Sekarang
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Profil Desa -->
    <section class="page-section text-white" id="profil">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <h2 class="section-heading text-center mb-4">Profil Desa Rejosari</h2>
                    <hr class="divider mx-auto" style="background-color: white;" />
                    
                    <div class="sambutan-box mt-5">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center mb-3 mb-md-0">
                                <img src="{{ asset('dokumen/logo-lamongan.png') }}" alt="Kepala Desa" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid white;">
                            </div>
                            <div class="col-md-9">
                                <h4 class="mb-3">Sambutan Kepala Desa</h4>
                                <p class="mb-2"><strong>Suparto</strong></p>
                                <p style="line-height: 1.8;">Assalamu'alaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi Desa Rejosari. Kami berkomitmen untuk memberikan pelayanan terbaik kepada seluruh masyarakat melalui transparansi informasi dan kemudahan akses layanan administrasi secara digital. Mari bersama-sama membangun desa yang lebih maju dan sejahtera.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-5 text-center">
                        <div class="col-md-6 mb-4">
                            <div class="sambutan-box">
                                <h4 class="mb-3"><i class="bi-eye me-2"></i>Visi</h4>
                                <p>"Mewujudkan Desa Rejosari yang Maju, Mandiri, dan Sejahtera Berlandaskan Nilai-Nilai Keagamaan dan Kearifan Lokal"</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="sambutan-box">
                                <h4 class="mb-3"><i class="bi-bullseye me-2"></i>Misi</h4>
                                <ul class="text-start" style="line-height: 2;">
                                    <li>Meningkatkan kualitas pelayanan publik</li>
                                    <li>Mengembangkan potensi ekonomi lokal</li>
                                    <li>Meningkatkan kesejahteraan masyarakat</li>
                                    <li>Memperkuat nilai gotong royong</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kegiatan Desa -->
    <section class="page-section" id="kegiatan">
        <div class="container px-4 px-lg-5">
            <h2 class="section-heading text-center">Kegiatan Desa Terbaru</h2>
            <hr class="divider" />
            <p class="text-center text-muted mb-5">Transparansi kegiatan dan program pembangunan desa</p>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="kegiatan-card">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=600&h=400&fit=crop" alt="Pembangunan">
                        <div class="card-body">
                            <span class="badge bg-success badge-kategori">Pembangunan</span>
                            <h4 class="mt-3 mb-2">Pembangunan Saluran Irigasi</h4>
                            <p class="text-muted small mb-2"><i class="bi-calendar3 me-1"></i>15 Oktober 2024</p>
                            <p>Kegiatan pembangunan saluran irigasi sepanjang 500 meter untuk meningkatkan produktivitas pertanian di Dusun Gajah.</p>
                            <a href="#" class="btn btn-sm btn-outline-success">Selengkapnya <i class="bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="kegiatan-card">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&h=400&fit=crop" alt="Pemerintahan">
                        <div class="card-body">
                            <span class="badge bg-primary badge-kategori">Pemerintahan</span>
                            <h4 class="mt-3 mb-2">Musyawarah Dusun</h4>
                            <p class="text-muted small mb-2"><i class="bi-calendar3 me-1"></i>8 Oktober 2024</p>
                            <p>Pelaksanaan musyawarah dusun untuk membahas program prioritas pembangunan tahun 2025 dan aspirasi masyarakat.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Selengkapnya <i class="bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="kegiatan-card">
                        <img src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?w=600&h=400&fit=crop" alt="Pembinaan">
                        <div class="card-body">
                            <span class="badge bg-warning badge-kategori text-dark">Pembinaan</span>
                            <h4 class="mt-3 mb-2">Pelatihan PKK</h4>
                            <p class="text-muted small mb-2"><i class="bi-calendar3 me-1"></i>1 Oktober 2024</p>
                            <p>Kegiatan pelatihan pembuatan kerajinan tangan dan pengolahan hasil pertanian bagi ibu-ibu PKK Desa Rejosari.</p>
                            <a href="#" class="btn btn-sm btn-outline-warning">Selengkapnya <i class="bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary btn-lg">Lihat Semua Kegiatan <i class="bi-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>

    <!-- Statistik Penduduk -->
    <section class="page-section bg-light" id="statistik">
        <div class="container px-4 px-lg-5">
            <h2 class="section-heading text-center">Statistik Penduduk</h2>
            <hr class="divider" />
            <p class="text-center text-muted mb-5">Data kependudukan Desa Rejosari</p>
            
            <div class="row g-4 mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="bi-people-fill fs-1" style="color: var(--primary-green);"></i>
                        <div class="stat-number">3.247</div>
                        <div class="stat-label">Total Penduduk</div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="bi-house-door-fill fs-1" style="color: var(--primary-green);"></i>
                        <div class="stat-number">892</div>
                        <div class="stat-label">Jumlah KK</div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="bi-gender-male fs-1" style="color: #0d6efd;"></i>
                        <div class="stat-number">1.634</div>
                        <div class="stat-label">Laki-laki</div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="bi-gender-female fs-1" style="color: #d63384;"></i>
                        <div class="stat-number">1.613</div>
                        <div class="stat-label">Perempuan</div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="chart-container">
                        <h5 class="mb-4 text-center">Jumlah Penduduk per Dusun</h5>
                        <canvas id="chartDusun" style="max-height: 300px;"></canvas>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="chart-container">
                        <h5 class="mb-4 text-center">Perbandingan Jenis Kelamin</h5>
                        <canvas id="chartGender" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Online -->
    <section class="page-section" id="layanan">
        <div class="container px-4 px-lg-5">
            <h2 class="section-heading text-center">Layanan Administrasi Online</h2>
            <hr class="divider" />
            <p class="text-center text-muted mb-3">Warga Desa Rejosari kini dapat mengajukan permohonan surat keterangan secara online tanpa harus ke balai desa.</p>
            <p class="text-center mb-5">
                <strong>Silakan login atau daftar untuk memulai menggunakan layanan kami.</strong>
            </p>
            
            <div class="layanan-grid">
                <div class="layanan-item">
                    <i class="bi-person-vcard"></i>
                    <h4>Surat Pengantar KTP</h4>
                    <p class="text-muted small">Permohonan surat pengantar untuk pembuatan KTP</p>
                </div>
                
                <div class="layanan-item">
                    <i class="bi-people"></i>
                    <h4>Surat Pengantar KK</h4>
                    <p class="text-muted small">Permohonan surat pengantar untuk Kartu Keluarga</p>
                </div>
                
                <div class="layanan-item">
                    <i class="bi-house-check"></i>
                    <h4>Surat Keterangan Domisili</h4>
                    <p class="text-muted small">Surat keterangan tempat tinggal</p>
                </div>
                
                <div class="layanan-item">
                    <i class="bi-heart-pulse"></i>
                    <h4>Surat Keterangan Kelahiran</h4>
                    <p class="text-muted small">Permohonan surat keterangan kelahiran</p>
                </div>
                
                <div class="layanan-item">
                    <i class="bi-file-earmark-medical"></i>
                    <h4>Surat Keterangan Kematian</h4>
                    <p class="text-muted small">Permohonan surat keterangan kematian</p>
                </div>
                
                <div class="layanan-item">
                    <i class="bi-briefcase"></i>
                    <h4>Surat Keterangan Usaha</h4>
                    <p class="text-muted small">Surat keterangan untuk keperluan usaha</p>
                </div>
                
                <div class="layanan-item">
                    <i class="bi-cash-coin"></i>
                    <h4>Surat Keterangan Tidak Mampu</h4>
                    <p class="text-muted small">SKTM untuk berbagai keperluan</p>
                </div>
                
                <div class="layanan-item">
                    <i class="bi-file-earmark-text"></i>
                    <h4>Surat Keterangan Lainnya</h4>
                    <p class="text-muted small">Layanan surat keterangan lainnya</p>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="#login" class="btn btn-primary btn-lg px-5 py-3" style="border-radius: 50px;">
                    <i class="bi-box-arrow-in-right me-2"></i>Login / Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Lokasi Desa -->
    <section class="page-section bg-light" id="lokasi">
        <div class="container px-4 px-lg-5">
            <h2 class="section-heading text-center">Lokasi Kantor Desa Rejosari</h2>
            <hr class="divider" />
            <p class="text-center text-muted mb-5">Temukan lokasi dan informasi kontak kami</p>
            
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.8!2d112.4!3d-7.1!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMDYnMDAuMCJTIDExMsKwMjQnMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div class="info-box">
                        <h4 class="mb-4" style="color: var(--primary-green);">Informasi Kontak</h4>
                        
                        <div class="info-item">
                            <i class="bi-geo-alt-fill"></i>
                            <div>
                                <strong>Alamat</strong>
                                <p class="mb-0">Jalan Raya Rejosari<br>Kecamatan Deket<br>Kabupaten Lamongan, Jawa Timur<br>62253</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <i class="bi-telephone-fill"></i>
                            <div>
                                <strong>Telepon</strong>
                                <p class="mb-0">+62 322 123 4567</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <i class="bi-envelope-fill"></i>
                            <div>
                                <strong>Email</strong>
                                <p class="mb-0">info@desarejosari.go.id</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <i class="bi-clock-fill"></i>
                            <div>
                                <strong>Jam Operasional</strong>
                                <p class="mb-0">Senin - Jumat: 08.00 - 15.00 WIB<br>Sabtu: 08.00 - 12.00 WIB<br>Minggu & Tanggal Merah: Tutup</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="https://wa.me/62322123456" class="btn btn-success w-100 mb-2">
                                <i class="bi-whatsapp me-2"></i>Hubungi via WhatsApp
                            </a>
                            <a href="mailto:info@desarejosari.go.id" class="btn btn-outline-primary w-100">
                                <i class="bi-envelope me-2"></i>Kirim Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container px-4 px-lg-5">
            <div class="footer-content">
                <div class="footer-section">
                    <h5>Tentang Desa Rejosari</h5>
                    <p style="color: #e0e0e0; line-height: 1.8;">Desa Rejosari adalah desa di Kecamatan Deket, Kabupaten Lamongan yang berkomitmen memberikan pelayanan terbaik kepada masyarakat melalui sistem digital.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="bi-facebook fs-4"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi-instagram fs-4"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi-youtube fs-4"></i></a>
                        <a href="#" class="text-white"><i class="bi-envelope fs-4"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h5>Link Cepat</h5>
                    <ul>
                        <li><a href="#page-top">Beranda</a></li>
                        <li><a href="#profil">Profil Desa</a></li>
                        <li><a href="#kegiatan">Kegiatan Desa</a></li>
                        <li><a href="#statistik">Statistik Penduduk</a></li>
                        <li><a href="#layanan">Layanan Online</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h5>Layanan</h5>
                    <ul>
                        <li><a href="#layanan">Pengajuan Surat Online</a></li>
                        <li><a href="#">Informasi Pengumuman</a></li>
                        <li><a href="#">Download Formulir</a></li>
                        <li><a href="#">Aduan Masyarakat</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h5>Kontak</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li style="color: #e0e0e0; margin-bottom: 0.75rem;">
                            <i class="bi-geo-alt-fill me-2"></i>Jalan Raya Rejosari, Deket, Lamongan
                        </li>
                        <li style="color: #e0e0e0; margin-bottom: 0.75rem;">
                            <i class="bi-telephone-fill me-2"></i>+62 322 123 4567
                        </li>
                        <li style="color: #e0e0e0; margin-bottom: 0.75rem;">
                            <i class="bi-envelope-fill me-2"></i>info@desarejosari.go.id
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr style="border-color: rgba(255,255,255,0.1);">
            
            <div class="text-center">
                <p class="mb-0" style="color: #e0e0e0;">&copy; 2024 Desa Rejosari - Kecamatan Deket, Kabupaten Lamongan. All Rights Reserved.</p>
                <p class="mb-0 mt-2" style="color: #a0a0a0; font-size: 0.9rem;">Dikembangkan dengan ❤️ untuk pelayanan masyarakat</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    
    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNav');
            if (window.scrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
        
        // Chart: Penduduk per Dusun
        const ctxDusun = document.getElementById('chartDusun');
        if (ctxDusun) {
            new Chart(ctxDusun, {
                type: 'bar',
                data: {
                    labels: ['Dusun Gajah', 'Dusun Gapuk'],
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: [1654, 1593],
                        backgroundColor: [
                            'rgba(1, 50, 32, 0.8)',
                            'rgba(255, 193, 7, 0.8)'
                        ],
                        borderColor: [
                            'rgba(1, 50, 32, 1)',
                            'rgba(255, 193, 7, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 500
                            }
                        }
                    }
                }
            });
        }
        
        // Chart: Gender Distribution
        const ctxGender = document.getElementById('chartGender');
        if (ctxGender) {
            new Chart(ctxGender, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-laki', 'Perempuan'],
                    datasets: [{
                        data: [1634, 1613],
                        backgroundColor: [
                            'rgba(13, 110, 253, 0.8)',
                            'rgba(214, 51, 132, 0.8)'
                        ],
                        borderColor: [
                            'rgba(13, 110, 253, 1)',
                            'rgba(214, 51, 132, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }
        
        // Layanan item click handler
        document.querySelectorAll('.layanan-item').forEach(item => {
            item.addEventListener('click', function() {
                alert('Silakan login terlebih dahulu untuk mengakses layanan ini');
                window.location.href = '#login';
            });
        });
    </script>
</body>
</html>