@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Penduduk</h4>
                    <div class="basic-form">
                        <form action="{{ route('admin.penduduk.update', $penduduk->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="nik" value="{{ $penduduk->nik }}" placeholder="NIK" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="{{ $penduduk->nama_lengkap }}" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="{{ $penduduk->tempat_lahir }}" placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $penduduk->tanggal_lahir }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="Laki-laki" {{ $penduduk->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $penduduk->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama">
                                        <option value="Islam" {{ $penduduk->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ $penduduk->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ $penduduk->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ $penduduk->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ $penduduk->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ $penduduk->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan" value="{{ $penduduk->pekerjaan }}" placeholder="Pekerjaan">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status Perkawinan</label>
                                    <select class="form-control" name="status_perkawinan">
                                        <option value="Belum Kawin" {{ $penduduk->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ $penduduk->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ $penduduk->status_perkawinan == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ $penduduk->status_perkawinan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label>Dusun</label>
                                <select class="form-control" name="dusun_id">
                                    <option value="">Pilih Dusun</option>
                                    @foreach($dusuns as $dusun)
                                        <option value="{{ $dusun->id }}" {{ $penduduk->dusun_id == $dusun->id ? 'selected' : '' }}>{{ $dusun->nama_dusun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
