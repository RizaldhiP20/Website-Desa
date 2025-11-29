@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- Wilayah Dusun -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $total_dusun }}</h3>
                    <p>Wilayah Dusun</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <a href="{{ route('admin.dusun.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Penduduk -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_penduduk }}</h3>
                    <p>Penduduk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.penduduk.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Keluarga (KK) -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_kk }}</h3>
                    <p>Keluarga (KK)</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <a href="{{ route('admin.kk.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Surat Tercetak -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $surat_selesai }}</h3>
                    <p>Surat Tercetak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <a href="{{ route('admin.surat.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Kelompok (Static) -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>0</h3>
                    <p>Kelompok</p>
                </div>
                <div class="icon">
                    <i class="fas fa-sitemap"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Rumah Tangga -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $total_rumah }}</h3>
                    <p>Rumah Tangga</p>
                </div>
                <div class="icon">
                    <i class="fas fa-home"></i>
                </div>
                <a href="{{ route('admin.rumah.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Bantuan (Static) -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>0</h3>
                    <p>Bantuan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Verifikasi Layanan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $surat_pending }}</h3>
                    <p>Verifikasi Layanan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <a href="{{ route('admin.surat.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-envelope mr-1"></i>
                        Permohonan Surat Terbaru
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama Pemohon</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_surat as $surat)
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/gleek/assets/images/avatar/1.jpg') }}" class="img-circle elevation-2" alt="User Image" style="width: 30px; height: 30px;">
                                    </td>
                                    <td>{{ $surat->penduduk->nama_lengkap ?? 'N/A' }}</td>
                                    <td>{{ $surat->suratJenis->nama_surat ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($surat->created_at)->format('d M Y') }}</td>
                                    <td>
                                        @if($surat->status == 'diajukan')
                                            <span class="badge badge-warning">Diajukan</span>
                                        @elseif($surat->status == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @else
                                            <span class="badge badge-secondary">{{ ucfirst($surat->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.surat.show', $surat->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Detail</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data permohonan surat terbaru.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection
