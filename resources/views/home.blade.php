@extends('layouts.app')

<<<<<<< HEAD
@section('content')
    <h3>Selamat datang di KosNyaman</h3>
=======
@section('body_class', 'page-home')

@section('content')
<div class="container">

    {{-- HERO / JUDUL --}}
    <div class="mb-5 text-center">
        <h3 class="fw-bold">Selamat datang di KosNyaman</h3>
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
                           placeholder="Cari lokasi atau nama kos...">
                </div>

                <div class="col-md-4">
                    <select class="form-select" name="kategori">
                        <option value="">Semua tipe</option>
                        <option value="Kos Putra">Kos Putra</option>
                        <option value="Kos Putri">Kos Putri</option>
                        <option value="Kos Campur">Kos Campur</option>
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
                    <img src="{{ asset(ltrim($k->foto_kos, '/')) }}"
                         class="card-img-top"
                         style="height: 200px; object-fit: cover;"
                         alt="Foto Kos">

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
            <p class="text-muted">Belum ada data kos.</p>
        @endforelse
    </div>

    {{-- SECTION: KOS DISKON --}}
    <h4 class="mb-3 fw-bold mt-5">Kos Harga Diskon</h4>
    <div class="row">
        @forelse($diskon as $k)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 border border-danger">
                    <img src="{{ asset(ltrim($k->foto_kos, '/')) }}"
                         class="card-img-top"
                         style="height: 200px; object-fit: cover;"
                         alt="Foto Kos">

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
            <p class="text-muted">Belum ada kos diskon.</p>
        @endforelse
    </div>

</div>
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
@endsection
