<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Warga - Desa Rejosari</title>
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
                <li class="{{ request()->routeIs('warga.dashboard') ? 'active' : '' }}">
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
                <li class="{{ request()->routeIs('warga.layanan.index') ? 'active' : '' }}">
                    <a href="{{ route('warga.layanan.index') }}">
                        <i class="bi bi-clock-history"></i>
                        Riwayat Pengajuan
                    </a>
                </li>
                <li class="{{ request()->routeIs('landing') ? 'active' : '' }}">
                    <a href="{{ route('landing') }}">
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
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
                        <i class="bi bi-box-arrow-right"></i>
                        Keluar
                    </a>
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
                            Selamat Datang, <strong>{{ $penduduk->nama_lengkap ?? 'Warga' }}</strong>
                        </span>
                        <div class="dropdown d-inline-block">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($penduduk->nama_lengkap ?? 'Warga') }}&background=2563eb&color=fff&size=35" alt="Avatar" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i>Profil Saya</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <!-- Header -->
                <div class="mb-4">
                    <h2 class="mb-2">Dashboard Warga</h2>
                    <p class="text-muted">Desa Rejosari, Kecamatan Wonogiri | <i class="bi bi-calendar-check"></i> {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>
                </div>

                <!-- Statistik Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="stat-card primary">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-label">Total Pengajuan</div>
                                    <div class="stat-number">{{ $totalPermohonan ?? 0 }}</div>
                                    <small class="text-muted">Surat diajukan</small>
                                </div>
                                <div class="stat-icon primary">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card success">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-label">Surat Selesai</div>
                                    <div class="stat-number">{{ $permohonanSelesai ?? 0 }}</div>
                                    <small class="text-success">Sudah disetujui</small>
                                </div>
                                <div class="stat-icon success">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card warning">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-label">Dalam Proses</div>
                                    <div class="stat-number">{{ $permohonanDiproses ?? 0 }}</div>
                                    <small class="text-warning">Sedang diverifikasi</small>
                                </div>
                                <div class="stat-icon warning">
                                    <i class="bi bi-hourglass-split"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card danger">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-label">Perlu Perbaikan</div>
                                    <div class="stat-number">0</div>
                                    <small class="text-danger">Perlu dilengkapi</small>
                                </div>
                                <div class="stat-icon danger">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="mb-3"><i class="bi bi-lightning-fill text-warning me-2"></i>Aksi Cepat</h5>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <a href="{{ route('warga.surat.index') }}" class="action-btn">
                            <i class="bi bi-file-earmark-plus"></i>
                            <div class="mt-2 fw-semibold">Ajukan Surat</div>
                            <small class="text-muted">Buat pengajuan baru</small>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <a href="{{ route('warga.layanan.index') }}" class="action-btn">
                            <i class="bi bi-receipt"></i>
                            <div class="mt-2 fw-semibold">Cetak Surat</div>
                            <small class="text-muted">Download surat selesai</small>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <a href="#" class="action-btn">
                            <i class="bi bi-cash-stack"></i>
                            <div class="mt-2 fw-semibold">Bayar Iuran</div>
                            <small class="text-muted">Pembayaran online</small>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <a href="https://wa.me/6281234567890" target="_blank" class="action-btn">
                            <i class="bi bi-headset"></i>
                            <div class="mt-2 fw-semibold">Hubungi Admin</div>
                            <small class="text-muted">Layanan bantuan</small>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <!-- Pengajuan Terbaru -->
                    <div class="col-lg-8 mb-4">
                        <div class="info-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Riwayat Pengajuan Terbaru</h5>
                                <a href="#" class="text-primary text-decoration-none">Lihat Semua <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="table-responsive table-custom">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Jenis Surat</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($permohonans as $surat)
                                        <tr>
                                            <td><i class="bi bi-file-text me-2"></i>{{ $surat->suratJenis->nama_surat }}</td>
                                            <td>{{ \Carbon\Carbon::parse($surat->tanggal_permohonan)->format('d M Y') }}</td>
                                            <td>
                                                @if($surat->status == 'selesai')
                                                    <span class="badge badge-custom bg-success">Selesai</span>
                                                @elseif($surat->status == 'diproses')
                                                    <span class="badge badge-custom bg-warning">Proses</span>
                                                @elseif($surat->status == 'ditolak')
                                                    <span class="badge badge-custom bg-danger">Ditolak</span>
                                                @else
                                                    <span class="badge badge-custom bg-secondary">{{ ucfirst($surat->status) }}</span>
                                                @endif
                                            </td>
                                            <td><a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada pengajuan surat.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi & Pengumuman -->
                    <div class="col-lg-4 mb-4">
                        <div class="info-card">
                            <h5><i class="bi bi-megaphone me-2"></i>Pengumuman Terbaru</h5>
                            <div class="news-item">
                                <h6><i class="bi bi-pin-angle-fill text-danger me-1"></i>Jadwal Posyandu Bulan Desember</h6>
                                <p class="mb-2">Posyandu akan dilaksanakan pada tanggal 5 Desember 2025 di Balai Desa.</p>
                                <small class="text-muted"><i class="bi bi-calendar3"></i> 22 Nov 2025</small>
                            </div>
                            <div class="news-item">
                                <h6><i class="bi bi-pin-angle-fill text-primary me-1"></i>Pembayaran Iuran RT</h6>
                                <p class="mb-2">Iuran RT bulan November dapat dibayarkan melalui portal online ini.</p>
                                <small class="text-muted"><i class="bi bi-calendar3"></i> 20 Nov 2025</small>
                            </div>
                            <a href="#" class="btn btn-outline-primary w-100 mt-3">Lihat Semua Pengumuman</a>
                        </div>

                        <!-- Kontak Darurat -->
                        <div class="info-card mt-3">
                            <h5><i class="bi bi-telephone-fill me-2"></i>Kontak Penting</h5>
                            <div class="d-flex align-items-center mb-3 p-2 bg-light rounded">
                                <i class="bi bi-person-badge text-primary fs-3 me-3"></i>
                                <div>
                                    <small class="text-muted">Kepala Desa</small>
                                    <div class="fw-semibold">0812-3456-7890</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 p-2 bg-light rounded">
                                <i class="bi bi-building text-success fs-3 me-3"></i>
                                <div>
                                    <small class="text-muted">Kantor Desa</small>
                                    <div class="fw-semibold">0274-123456</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });

        // Auto close sidebar on mobile when clicking outside
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