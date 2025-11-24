@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Kartu Keluarga</h4>
                    <div class="basic-form">
                        <form action="{{ route('admin.kk.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nomor KK</label>
                                <input type="text" class="form-control" name="nomor_kk" placeholder="Nomor KK" required>
                            </div>
                            <div class="form-group">
                                <label>Kepala Keluarga</label>
                                <select class="form-control select2" name="kepala_keluarga_id" required>
                                    <option value="">Pilih Kepala Keluarga</option>
                                    @foreach($penduduks as $penduduk)
                                        <option value="{{ $penduduk->id }}">{{ $penduduk->nama_lengkap }} ({{ $penduduk->nik }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rumah / Asoma</label>
                                <select class="form-control select2" name="rumah_id">
                                    <option value="">Pilih Rumah</option>
                                    @foreach($rumahs as $rumah)
                                        <option value="{{ $rumah->id }}">{{ $rumah->alamat }} ({{ $rumah->dusun->nama_dusun ?? '' }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.kk.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
