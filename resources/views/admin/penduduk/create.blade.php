@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Penduduk</h1>

    <form action="{{ route('admin.penduduk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="no_identitas">NIK</label>
            <input type="text" name="no_identitas" id="no_identitas" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="no_kk">No. KK</label>
            <input type="text" name="no_kk" id="no_kk" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
