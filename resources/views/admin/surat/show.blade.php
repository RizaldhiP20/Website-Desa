@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Permohonan Surat</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Nama Pemohon</th>
                                <td>{{ $surat->penduduk->nama_lengkap ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>{{ $surat->penduduk->nik ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Surat</th>
                                <td>{{ $surat->suratJenis->nama_surat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Permohonan</th>
                                <td>{{ \Carbon\Carbon::parse($surat->created_at)->format('d M Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $surat->keterangan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Status Saat Ini</th>
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
                            </tr>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        <h5>Aksi</h5>
                        <form action="{{ route('admin.surat.proses', $surat->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="selesai">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Setujui permohonan ini?')"><i class="fa fa-check"></i> Setujui & Selesai</button>
                        </form>

                        <form action="{{ route('admin.surat.proses', $surat->id) }}" method="POST" class="d-inline ml-2">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak permohonan ini?')"><i class="fa fa-times"></i> Tolak</button>
                        </form>

                        <a href="{{ route('admin.surat.index') }}" class="btn btn-secondary ml-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
