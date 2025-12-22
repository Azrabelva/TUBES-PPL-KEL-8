@extends('layouts.app')

@section('body_class', 'page-kos')

@section('styles')
<style>
  /* CSS hanya aktif di halaman KOS */
  .page-kos .card-img-top{
    height: 220px;
    width: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
  }
</style>
@endsection

@section('content')

{{-- SEARCH BAR --}}
<div class="container mb-4">
    <div class="card shadow-sm p-3">
<<<<<<< HEAD
        <div class="row g-3 align-items-center">

            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Cari lokasi kos...">
            </div>

            <div class="col-md-3">
                <select class="form-select">
                    <option selected>Semua tipe</option>
                    <option>Kos Putra</option>
                    <option>Kos Putri</option>
                    <option>Kos Campur</option>
                </select>
            </div>

            <div class="col-md-3">
                <input type="date" class="form-control">
            </div>

            <div class="col-md-1">
                <button class="btn btn-primary w-100">Cari</button>
            </div>

        </div>
=======
        <form method="GET" action="{{ route('kos.index') }}">
            <div class="row g-3 align-items-center">

                {{-- KEYWORD --}}
                <div class="col-md-5">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Cari lokasi atau nama kos..."
                           value="{{ request('keyword') }}">
                </div>

                {{-- KATEGORI --}}
                <div class="col-md-3">
                    <select class="form-select" name="kategori">
                        <option value="">Semua tipe</option>
                        <option value="Kos Putra"  {{ request('kategori')=='Kos Putra' ? 'selected' : '' }}>Kos Putra</option>
                        <option value="Kos Putri"  {{ request('kategori')=='Kos Putri' ? 'selected' : '' }}>Kos Putri</option>
                        <option value="Kos Campur" {{ request('kategori')=='Kos Campur' ? 'selected' : '' }}>Kos Campur</option>
                    </select>
                </div>

                {{-- TANGGAL (opsional, belum difilter di controller) --}}
                <div class="col-md-3">
                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ request('tanggal') }}">
                </div>

                {{-- BUTTON --}}
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary w-100">
                        Cari
                    </button>
                </div>

            </div>
        </form>
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
    </div>
</div>

{{-- LIST KOS --}}
<div class="container">
    <h4 class="mb-3">Rekomendasi Hunian</h4>

    <div class="row">

        {{-- LOOP DATA KOS --}}
<<<<<<< HEAD
        @foreach($data as $k)
        <div class="col-md-4 mb-4">

            <div class="card shadow-sm">
                <img src="{{ $k->foto_kos }}"
                     class="card-img-top mt-1"
                     alt="Foto Kos">
=======
        @forelse($data as $k)
        <div class="col-md-4 mb-4">

            <div class="card shadow-sm h-100">
                <img src="{{ asset(ltrim($k->foto_kos, '/')) }}"
                     class="card-img-top mt-1"
                     alt="Foto Kos"
                     onerror="this.onerror=null;this.src='{{ asset('images/default-kos.jpg') }}';">
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3

                <div class="card-body">
                    <span class="badge bg-secondary">Kos</span>

                    <h5 class="mt-2">{{ $k->nama }}</h5>

                    <p class="text-muted mb-1">{{ $k->alamat }}</p>

                    <h6 class="text-danger fw-bold">
                        Rp{{ number_format($k->kamars()->min('harga') ?? 0, 0, ',', '.') }} / bulan
                    </h6>

                    {{-- Tombol Lihat Detail --}}
                    <a href="{{ route('kos.show', $k->id) }}"
                       class="btn btn-outline-primary w-100 mt-2">
                       Lihat Detail
                    </a>
                </div>
            </div>

        </div>
<<<<<<< HEAD
        @endforeach

    </div>
</div>

@endsection

=======
        @empty
            <p class="text-muted">Data kos tidak ditemukan.</p>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $data->links() }}
    </div>
</div>

@endsection
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
