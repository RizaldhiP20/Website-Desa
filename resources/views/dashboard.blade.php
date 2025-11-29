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
    
</head>
<body id="page-top">
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('dokumen/logo-lamongan.png') }}" alt="Loading..." class="logo">
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#page-top">
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
                    <li class="nav-item"><a class="nav-link active" href="#page-top">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#profil">Profil Desa</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.statistik') }}">Statistik</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lokasi">Lokasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
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
                    <a class="btn btn-warning btn-xl fw-bold px-5 py-3" href="#layanan" style="border-radius:50px"><i class="bi-file-earmark-text me-2"></i>Ajukan Surat Sekarang</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Profil Desa -->
    <section class="page-section" id="profil">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <div class="col-lg-5">
                    <h2 class="section-heading-gambar mb-2">Profil Desa Rejosari</h2>
                    <p>Desa yang menjunjung tinggi nilai-nilai gotong royong, transparansi, dan inovasi untuk kesejahteraan bersama.</p>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3 g-lg-4">
                        <div class="col-6">
                            <div class="profile-card">
                                <img src="https://images.unsplash.com/photo-1505489832446-38a3b5337b6a?w=400" alt="Visi & Misi">
                                <h5>Visi & Misi</h5>
                                <p>Mewujudkan desa yang maju, mandiri, dan sejahtera.</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="profile-card">
                                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=400" alt="Struktur Organisasi">
                                <h5>Struktur Organisasi</h5>
                                <p>Pemerintahan desa yang solid dan profesional.</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="profile-card">
                                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=400" alt="Sejarah Desa">
                                <h5>Sejarah Desa</h5>
                                <p>Jejak langkah dan perkembangan Desa Rejosari.</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="profile-card">
                                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?w=400" alt="Potensi Desa">
                                <h5>Potensi Desa</h5>
                                <p>Kekayaan alam dan sumber daya manusia unggul.</p>
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
                            <span class="badge bg-success">Pembangunan</span>
                            <h4 class="mt-3 mb-2">Pembangunan Saluran Irigasi</h4>
                            <p class="text-muted small mb-2"><i class="bi-calendar3 me-1"></i>15 Oktober 2024</p>
                            <p>Kegiatan pembangunan saluran irigasi sepanjang 500 meter untuk meningkatkan produktivitas pertanian di Dusun Gajah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="kegiatan-card">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&h=400&fit=crop" alt="Pemerintahan">
                        <div class="card-body">
                            <span class="badge bg-primary">Pemerintahan</span>
                            <h4 class="mt-3 mb-2">Musyawarah Desa</h4>
                            <p class="text-muted small mb-2"><i class="bi-calendar3 me-1"></i>01 November 2024</p>
                            <p>Musyawarah membahas rencana kerja tahunan dan anggaran desa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="kegiatan-card">
                        <img src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?w=600&h=400&fit=crop" alt="Pembinaan">
                        <div class="card-body">
                            <span class="badge bg-warning">Pembinaan</span>
                            <h4 class="mt-3 mb-2">Pembinaan Kewirausahaan</h4>
                            <p class="text-muted small mb-2"><i class="bi-calendar3 me-1"></i>20 September 2024</p>
                            <p>Pelatihan kewirausahaan untuk ibu-ibu PKK dan pelaku usaha mikro desa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Penduduk -->
    <section class="page-section bg-light" id="statistik">
        <div class="container px-4 px-lg-5">
            <h2 class="section-heading text-center">Statistik Penduduk</h2>
            <hr class="divider" />
            
            <div class="row g-4 mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="bi-people-fill fs-1" style="color:var(--primary-green)"></i>
                        <div class="stat-number">3.247</div>
                        <div class="stat-label">Total Penduduk</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="bi-house-door-fill fs-1" style="color:var(--primary-green)"></i>
                        <div class="stat-number">892</div>
                        <div class="stat-label">Jumlah KK</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="bi-gender-male fs-1" style="color:#0d6efd"></i>
                        <div class="stat-number">1.634</div>
                        <div class="stat-label">Laki-laki</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <i class="bi-gender-female fs-1" style="color:#d63384"></i>
                        <div class="stat-number">1.613</div>
                        <div class="stat-label">Perempuan</div>
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
            <p class="text-center text-muted mb-5">Ajukan surat administrasi secara online tanpa perlu datang ke kantor desa</p>
            
            <div class="layanan-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-top:3rem">
                <div class="layanan-item">
                    <i class="bi-person-vcard" style="font-size:3rem;color:var(--primary-green)"></i>
                    <h4>Surat Pengantar KTP</h4>
                    <p class="small text-muted">Pengajuan pembuatan KTP baru</p>
                </div>
                <div class="layanan-item">
                    <i class="bi-people" style="font-size:3rem;color:var(--primary-green)"></i>
                    <h4>Surat Pengantar KK</h4>
                    <p class="small text-muted">Pengajuan Kartu Keluarga</p>
                </div>
                <div class="layanan-item">
                    <i class="bi-house-check" style="font-size:3rem;color:var(--primary-green)"></i>
                    <h4>Surat Keterangan Domisili</h4>
                    <p class="small text-muted">Surat keterangan tempat tinggal</p>
                </div>
                <div class="layanan-item">
                    <i class="bi-file-text" style="font-size:3rem;color:var(--primary-green)"></i>
                    <h4>Surat Keterangan Usaha</h4>
                    <p class="small text-muted">Untuk keperluan perizinan usaha</p>
                </div>
                <div class="layanan-item">
                    <i class="bi-file-earmark-medical" style="font-size:3rem;color:var(--primary-green)"></i>
                    <h4>Surat Keterangan Tidak Mampu</h4>
                    <p class="small text-muted">Untuk keperluan bantuan sosial</p>
                </div>
                <div class="layanan-item">
                    <i class="bi-file-earmark-plus" style="font-size:3rem;color:var(--primary-green)"></i>
                    <h4>Surat Keterangan Lainnya</h4>
                    <p class="small text-muted">Jenis surat administrasi lainnya</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Lokasi Desa - FIXED -->
    <section class="page-section bg-light" id="lokasi">
        <div class="container px-4 px-lg-5">
            <h2 class="section-heading text-center">Peta Desa Rejosari</h2>
            <p class="text-center text-muted mb-5">Menampilkan Peta Desa Dengan Interest Point Desa Rejosari</p>
            
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.874314557635!2d112.41786027483266!3d-7.119881292917803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7775e5c8c5b8c9%3A0x5f7a7b4b4b4b4b4b!2sDesa%20Rejosari%2C%20Kec.%20Deket%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1698765432107!5m2!1sid!2sid" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
                <div class="map-overlay">
                    <h4>Kantor Desa Rejosari</h4>
                    <div class="info-item">
                        <i class="bi-geo-alt-fill"></i>
                        <div class="info-content">
                            <strong>Alamat</strong>
                            <span>Jl. Raya Rejosari No. 1, Kec. Deket, Kab. Lamongan</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi-telephone-fill"></i>
                        <div class="info-content">
                            <strong>Telepon</strong>
                            <span>(0322) 123456</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi-clock-fill"></i>
                        <div class="info-content">
                            <strong>Jam Operasional</strong>
                            <span>Senin - Jumat: 08:00 - 16:00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="interest-points mt-5">
                <h3 class="text-center mb-4" style="color: var(--primary-green);">Titik Penting Desa</h3>
                <div class="interest-grid">
                    <div class="interest-item">
                        <i class="bi-building"></i>
                        <h5>Kantor Desa</h5>
                        <p>Pusat pemerintahan desa</p>
                    </div>
                    <div class="interest-item">
                        <i class="bi-hospital"></i>
                        <h5>Puskesmas</h5>
                        <p>Pelayanan kesehatan</p>
                    </div>
                    <div class="interest-item">
                        <i class="bi-book"></i>
                        <h5>Perpustakaan</h5>
                        <p>Taman baca masyarakat</p>
                    </div>
                    <div class="interest-item">
                        <i class="bi-shop"></i>
                        <h5>Pasar Desa</h5>
                        <p>Pusat ekonomi warga</p>
                    </div>
                    <div class="interest-item">
                        <i class="bi-mortarboard"></i>
                        <h5>SD Rejosari</h5>
                        <p>Sekolah dasar negeri</p>
                    </div>
                    <div class="interest-item">
                        <i class="bi-house-heart"></i>
                        <h5>Balai Desa</h5>
                        <p>Tempat musyawarah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container px-4 px-lg-5">
            <div class="footer-content" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-bottom:2rem">
                <div class="footer-section">
                    <h5 style="color:var(--secondary-yellow)">Tentang Desa Rejosari</h5>
                    <p style="color:#e0e0e0;line-height:1.8">Desa Rejosari adalah desa di Kecamatan Deket, Kabupaten Lamongan yang berkomitmen memberikan pelayanan terbaik kepada masyarakat melalui sistem digital.</p>
                </div>
                <div class="footer-section">
                    <h5 style="color:var(--secondary-yellow)">Link Cepat</h5>
                    <ul style="list-style:none;padding:0">
                        <li><a href="#page-top">Beranda</a></li>
                        <li><a href="#profil">Profil Desa</a></li>
                        <li><a href="#kegiatan">Kegiatan Desa</a></li>
                        <li><a href="#layanan">Layanan Online</a></li>
                        <li><a href="#lokasi">Lokasi Desa</a></li>
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
    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
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

        // Update active nav link on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>