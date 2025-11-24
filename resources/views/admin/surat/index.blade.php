@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Permohonan Surat</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pemohon</th>
                                    <th>Jenis Surat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surats as $key => $surat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($surat->created_at)->format('d M Y') }}</td>
                                    <td>{{ $surat->penduduk->nama_lengkap ?? '-' }}</td>
                                    <td>{{ $surat->suratJenis->nama_surat ?? '-' }}</td>
                                    <td>
                                        @if($surat->status == 'diajukan')
                                            <span class="badge badge-warning">Diajukan</span>
                                        @elseif($surat->status == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @elseif($surat->status == 'ditolak')
                                            <span class="badge badge-danger">Ditolak</span>
                                        @else
                                            <span class="badge badge-secondary">{{ ucfirst($surat->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.surat.show', $surat->id) }}" class="btn btn-sm btn-primary">Proses</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
