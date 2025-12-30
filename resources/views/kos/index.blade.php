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

  /* Badge warna per kategori */
  .badge-kos-putra {
    background: var(--theme-color);
    color: #fff;
  }
  .badge-kos-putri {
    background: var(--theme-color);
    color: #fff;
  }
  .badge-kos-campur {
    background: var(--theme-color);
    color: #fff;
  }

  /* Card warna kuning muda khusus halaman KOS */
  .page-kos .card {
    background: #f1e1c4; /* cream */
    border-color: rgba(0,0,0,0.04);
    box-shadow: 0 6px 20px rgba(0,0,0,0.04);
  }
  .page-kos .card .card-body { background: transparent; }

  /* Simple pagination styling: make previous/next links larger */
  .page-kos .simple-pagination a,
  .page-kos .simple-pagination span {
    font-size: 1.4rem; /* about twice the normal size */
    font-weight: 600;
  }
  .page-kos .simple-pagination a {
    color: var(--soft-purple) !important;
    text-decoration: none;
  }
  .page-kos .simple-pagination a:hover {
    text-decoration: underline;
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
                    <select class="form-select" name="kategori" onchange="this.form.submit()" aria-label="Pilih kategori kos">
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

    @if(request()->filled('kategori'))
        @php
            $sel = request('kategori');
            $filterClass = $sel == 'Kos Putra' ? 'badge-kos-putra' : ($sel == 'Kos Putri' ? 'badge-kos-putri' : ($sel == 'Kos Campur' ? 'badge-kos-campur' : 'bg-secondary'));
        @endphp
        <div class="mb-3">
            <span class="badge {{ $filterClass }}">Filter: {{ $sel }}</span>
            <a href="{{ route('kos.index') }}" class="ms-2 text-decoration-none">Reset</a>
        </div>
    @endif

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
                        @php
                            $cat = $k->kategori_kos ?? 'Kos';
                            $catClass = $cat == 'Kos Putra' ? 'badge-kos-putra' : ($cat == 'Kos Putri' ? 'badge-kos-putri' : ($cat == 'Kos Campur' ? 'badge-kos-campur' : 'bg-secondary'));
                        @endphp
                        <span class="badge {{ $catClass }}">{{ $cat }}</span>

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

    {{-- SIMPLE PAGINATION (dengan ikon) --}}
    <div class="d-flex justify-content-between align-items-center mt-4 simple-pagination">
        <div>
            @if($data->onFirstPage())
                <span class="text-muted">&lsaquo; Sebelumnya</span>
            @else
                <a href="{{ $data->previousPageUrl() }}" class="text-decoration-none">&lsaquo; Sebelumnya</a>
            @endif
        </div>

        <div>
            @if($data->hasMorePages())
                <a href="{{ $data->nextPageUrl() }}" class="text-decoration-none">Berikutnya &rsaquo;</a>
            @else
                <span class="text-muted">Berikutnya &rsaquo;</span>
            @endif
        </div>
    </div>
</div>

@endsection
