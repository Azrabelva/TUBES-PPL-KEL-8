@extends('layouts.app')

@section('body_class', 'page-home')

@section('styles')
<style>
  /* Home page card colors to match Kos */
  .page-home .card {
    background: #f1e1c4; /* cream */
    border-color: rgba(0,0,0,0.04);
    box-shadow: 0 6px 20px rgba(0,0,0,0.04);
  }
  .page-home .card .card-body { background: transparent; }

  /* Make diskon badge match theme purple */
  .page-home .badge.bg-danger {
    background: var(--theme-color) !important;
    color: #fff !important;
  }
  .page-home .card.border.border-danger {
    border-color: var(--soft-purple-dark) !important;
  }

  /* Brand on hero */
  .brand-hero {
    font-size: 2rem;
    color: var(--soft-purple-dark);
    display: inline-block;
    letter-spacing: 0.2px;
  }

  /* Ensure the hero heading matches the brand size */
  .hero-title {
    font-size: 2.3rem;
    line-height: 1.05;
    margin-bottom: 0.25rem;
  }
</style>
@endsection

@section('content')
<div class="container">

    {{-- HERO / JUDUL --}}
    <div class="mb-5 text-center">
        <h3 class="fw-bold hero-title">Selamat Datang di <span class="brand-hero">KosNyaman</span></h3>
        <p class="text-muted">Temukan kos terbaik sesuai kebutuhanmu</p>
    </div>

    {{-- SEARCH BAR BERANDA --}}
    <div class="container mb-5">
        <div class="card shadow-sm p-3">
            <form method="GET" action="{{ route('kos.index') }}">
                <div class="row g-3 align-items-center">

                    <div class="col-md-6">
                        <input type="text"
                               name="keyword"
                               class="form-control"
                               placeholder="Cari lokasi atau nama kos..."
                               value="{{ request('keyword') }}">
                    </div>

                    <div class="col-md-4">
                        <select class="form-select" name="kategori">
                            <option value="">Semua tipe</option>
                            <option value="Kos Putra"  {{ request('kategori')=='Kos Putra' ? 'selected' : '' }}>Kos Putra</option>
                            <option value="Kos Putri"  {{ request('kategori')=='Kos Putri' ? 'selected' : '' }}>Kos Putri</option>
                            <option value="Kos Campur" {{ request('kategori')=='Kos Campur' ? 'selected' : '' }}>Kos Campur</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            Cari
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- SECTION: REKOMENDASI KOS --}}
    <h4 class="mb-3 fw-bold">Rekomendasi Kos</h4>
    <div class="row">
        @forelse($rekomendasi as $k)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ $k->foto_kos ? asset(ltrim($k->foto_kos, '/')) : asset('images/default-kos.jpg') }}"
                         class="card-img-top"
                         style="height: 200px; object-fit: cover;"
                         alt="Foto Kos"
                         onerror="this.onerror=null;this.src='{{ asset('images/default-kos.jpg') }}';">

                    <div class="card-body">
                        <h5 class="mt-2">{{ $k->nama }}</h5>
                        <p class="text-muted mb-2">{{ $k->alamat }}</p>

                        <a href="{{ route('kos.show', $k->id) }}"
                           class="btn btn-outline-primary w-100">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Belum ada data kos.</p>
            </div>
        @endforelse
    </div>

    {{-- SECTION: KOS DISKON --}}
    <h4 class="mb-3 fw-bold mt-5">Kos Harga Diskon</h4>
    <div class="row">
        @forelse($diskon as $k)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 border border-danger">
                    <img src="{{ $k->foto_kos ? asset(ltrim($k->foto_kos, '/')) : asset('images/default-kos.jpg') }}"
                         class="card-img-top"
                         style="height: 200px; object-fit: cover;"
                         alt="Foto Kos"
                         onerror="this.onerror=null;this.src='{{ asset('images/default-kos.jpg') }}';">

                    <div class="card-body">
                        <span class="badge bg-danger mb-2">Diskon</span>

                        <h5 class="mt-2">{{ $k->nama }}</h5>
                        <p class="text-muted mb-2">{{ $k->alamat }}</p>

                        @php
                            $hargaAsli  = $k->kamars()->min('harga') ?? 0;
                            $hargaPromo = $k->kamars()
                                            ->whereNotNull('harga_diskon')
                                            ->min('harga_diskon');
                        @endphp

                        @if($hargaPromo && $hargaPromo < $hargaAsli)
                            <div class="mb-3">
                                <span class="text-muted text-decoration-line-through">
                                    Rp{{ number_format($hargaAsli, 0, ',', '.') }}
                                </span><br>
                                <span class="text-danger fw-bold fs-5">
                                    Rp{{ number_format($hargaPromo, 0, ',', '.') }} / bulan
                                </span>
                            </div>
                        @else
                            <h6 class="text-danger fw-bold mb-3">
                                Rp{{ number_format($hargaAsli, 0, ',', '.') }} / bulan
                            </h6>
                        @endif

                        <a href="{{ route('kos.show', $k->id) }}"
                           class="btn btn-danger w-100">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Belum ada kos diskon.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
