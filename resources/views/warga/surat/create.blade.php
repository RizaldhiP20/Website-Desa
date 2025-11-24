<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pengajuan Surat - Desa Rejosari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
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
                <li class="active">
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
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Formulir Pengajuan: {{ $suratJenis->nama_surat }}</h5>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('warga.surat.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="surat_jenis_id" value="{{ $suratJenis->id }}">

                                    <!-- Informasi Pemohon -->
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-muted mb-3">Data Pemohon</h6>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Nama Pemohon</label>
                                                <input type="text" class="form-control bg-light" value="{{ $penduduk->nama_lengkap }}" readonly disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">NIK</label>
                                                <input type="text" class="form-control bg-light" value="{{ $penduduk->nik }}" readonly disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Detail Surat -->
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-muted mb-3">Detail Permohonan</h6>
                                        
                                        <div class="mb-3">
                                            <label for="keterangan_permohonan" class="form-label">Keterangan Permohonan <span class="text-danger">*</span></label>
                                            <textarea name="keterangan_permohonan" id="keterangan_permohonan" rows="4" class="form-control @error('keterangan_permohonan') is-invalid @enderror" placeholder="Jelaskan keperluan surat ini..." required>{{ old('keterangan_permohonan') }}</textarea>
                                            @error('keterangan_permohonan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="file_pendukung" class="form-label">Upload Scan KTP/KK/Pengantar RT <span class="text-danger">*</span></label>
                                            <input type="file" name="file_pendukung" id="file_pendukung" class="form-control @error('file_pendukung') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf" required>
                                            <div class="form-text">Format: JPG, PNG, PDF. Maksimal 2MB.</div>
                                            @error('file_pendukung')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <a href="{{ route('warga.surat.index') }}" class="btn btn-outline-secondary px-4">
                                            <i class="bi bi-arrow-left me-2"></i>Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-send-fill me-2"></i>Kirim Permohonan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    </script>
</body>
</html>
