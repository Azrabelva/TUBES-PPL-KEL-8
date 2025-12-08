@extends('layouts.app')

@section('content')

<style>
    .header-image {
        width: 100%;
        height: 320px;
        object-fit: cover;
        border-radius: 10px;
    }
    .info-box {
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 20px;
        background: white;
    }
    .facility-icon {
        background: #f1f3f5;
        padding: 8px 12px;
        border-radius: 8px;
        margin-right: 10px;
        font-size: 14px;
    }
</style>

<div class="container mt-4">

    {{-- FOTO UTAMA --}}
    <div class="mb-4">
        @if($kos->foto_kos)
            <img src="{{ asset($kos->foto_kos) }}" class="header-image">
        @else
            <div class="bg-light p-5 text-center rounded">
                <p class="text-muted">Tidak ada foto kos.</p>
            </div>
        @endif
    </div>

    <div class="row">

        {{-- KOLOM KIRI --}}
        <div class="col-md-8">

            {{-- Nama + Alamat --}}
            <h2 class="fw-bold">{{ $kos->nama }}</h2>
            <p class="text-muted mb-2">{{ $kos->alamat }}</p>

            {{-- INFORMASI KAMAR --}}
            @php
                $totalKamar = $kos->kamars->count();
                $kamarTersedia = $kos->kamars->where('status', 'tersedia')->count();
            @endphp

            <div class="mb-3">
                <p><strong>Total Seluruh Kamar:</strong> {{ $totalKamar }}</p>
                <p><strong>Jumlah Kamar Tersedia:</strong> {{ $kamarTersedia }}</p>
            </div>

            {{-- Harga Termurah --}}
            <h4 class="text-danger fw-bold">
                Rp{{ number_format($kos->kamars()->min('harga') ?? 0, 0, ',', '.') }} / bulan
            </h4>

            <hr>

            {{-- Deskripsi --}}
            <h5 class="fw-bold">Deskripsi</h5>
            <p style="line-height: 1.7;">
                {{ $kos->deskripsi ?? 'Belum ada deskripsi.' }}
            </p>

            <hr>

            {{-- Fasilitas --}}
            <h5 class="fw-bold mb-3">Fasilitas</h5>
            <div class="d-flex flex-wrap">
                <span class="facility-icon">🌐 Wi-Fi</span>
                <span class="facility-icon">🚿 Kamar Mandi Dalam</span>
                <span class="facility-icon">🛏 Kasur</span>
                <span class="facility-icon">🌀 Kipas Angin</span>
                <span class="facility-icon">📺 TV</span>
            </div>

            <hr>

        </div>

        {{-- KOLOM KANAN --}}
        <div class="col-md-4">

            <div class="info-box shadow-sm">

                <h5 class="fw-bold mb-3">Informasi Pemilik</h5>
                <p class="mb-1"><strong>Nama:</strong> {{ $kos->pemilik ?? 'Belum diisi' }}</p>
                <p class="mb-1"><strong>No. HP:</strong> {{ $kos->kontak ?? 'Belum diisi' }}</p>

                <a href="#" class="btn btn-success w-100 mt-3">Hubungi Pemilik</a>

                <a href="{{ route('kos.index') }}" class="btn btn-secondary w-100 mt-2">Kembali</a>
            </div>

        </div>

    </div>
</div>

@endsection