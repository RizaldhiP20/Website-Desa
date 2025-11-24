@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title">Data Kartu Keluarga</h4>
                        <a href="{{ route('admin.kk.create') }}" class="btn btn-primary">Tambah KK</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Alamat (Rumah/Asoma)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kks as $key => $kk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $kk->nomor_kk }}</td>
                                    <td>{{ $kk->kepalaKeluarga->nama_lengkap ?? '-' }}</td>
                                    <td>{{ $kk->rumah->alamat ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.kk.edit', $kk->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('admin.kk.destroy', $kk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
