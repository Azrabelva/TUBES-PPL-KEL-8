@extends('layouts.app')

@section('content')
<h3>Tambah Kos</h3>
<form action="{{ route('kos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Kos</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
        @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('kos.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
