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

        <form method="GET" action="{{ route('kos.index') }}">
            <div class="row g-3 align-items-center">

                {{-- KEYWORD --}}
                <div class="col-md-6">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Cari lokasi atau nama kos..."
                           value="{{ request('keyword') }}">
                </div>

                {{-- KATEGORI --}}
                <div class="col-md-4">
                    <select class="form-select" name="kategori">
                        <option value="">Semua tipe</option>
                        <option value="Kos Putra"  {{ request('kategori')=='Kos Putra' ? 'selected' : '' }}>Kos Putra</option>
                        <option value="Kos Putri"  {{ request('kategori')=='Kos Putri' ? 'selected' : '' }}>Kos Putri</option>
                        <option value="Kos Campur" {{ request('kategori')=='Kos Campur' ? 'selected' : '' }}>Kos Campur</option>
                    </select>
                </div>

                {{-- BUTTON --}}
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        Cari
                    </button>
                </div>

            </div>
        </form>

    </div>
</div>

{{-- LIST KOS --}}
<div class="container">
    <h4 class="mb-3">Rekomendasi Hunian</h4>

    <div class="row">

        {{-- LOOP DATA KOS --}}
        @forelse($data as $k)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">

                    <img src="{{ $k->foto_kos ? asset(ltrim($k->foto_kos, '/')) : asset('images/default-kos.jpg') }}"
                         class="card-img-top mt-1"
                         alt="Foto Kos"
                         onerror="this.onerror=null;this.src='{{ asset('images/default-kos.jpg') }}';">

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
        @empty
            <div class="col-12">
                <p class="text-muted">Data kos tidak ditemukan.</p>
            </div>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $data->links() }}
    </div>
</div>

@endsection
