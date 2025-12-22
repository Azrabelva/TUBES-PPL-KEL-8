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
    </div>
</div>

{{-- LIST KOS --}}
<div class="container">
    <h4 class="mb-3">Rekomendasi Hunian</h4>

    <div class="row">

        {{-- LOOP DATA KOS --}}
        @foreach($data as $k)
        <div class="col-md-4 mb-4">

            <div class="card shadow-sm">
                <img src="{{ $k->foto_kos }}"
                     class="card-img-top mt-1"
                     alt="Foto Kos">

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
        @endforeach

    </div>
</div>

@endsection

