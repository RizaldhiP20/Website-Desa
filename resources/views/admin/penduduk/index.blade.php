@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title">Data Penduduk</h4>
                        <a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary">Tambah Penduduk</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Dusun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penduduks as $key => $penduduk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $penduduk->nik }}</td>
                                    <td>{{ $penduduk->nama_lengkap }}</td>
                                    <td>{{ $penduduk->dusun->nama_dusun ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.penduduk.edit', $penduduk->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('admin.penduduk.destroy', $penduduk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></button>
                                        </form>
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
