@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Penduduk</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $total_penduduk }}</h2>
                        <p class="text-white mb-0">Jiwa</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Kepala Keluarga</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $total_kk }}</h2>
                        <p class="text-white mb-0">KK</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-id-card"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Permohonan Surat Baru</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $surat_pending }}</h2>
                        <p class="text-white mb-0">Pending</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-envelope"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Kelahiran Bulan Ini</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $kelahiran_bulan_ini }}</h2>
                        <p class="text-white mb-0">Bayi</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-child"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Permohonan Surat Terbaru</h4>
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
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
                                            <img src="{{ asset('assets/gleek/assets/images/avatar/1.jpg') }}" class="rounded-circle mr-3" alt="">
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
                                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Detail</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
