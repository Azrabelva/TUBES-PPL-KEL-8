@extends('layouts.app')

@section('content')

<style>
    .header-image {
        width: 100%;
        height: 320px;
        object-fit: cover;
        border-radius: 10px;
        display: block;
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
        margin-bottom: 8px;
        font-size: 14px;
        display: inline-block;
    }

    .rule-item {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 6px;
        font-size: 15px;
    }
</style>

@php
    // Hitung kamar dari relasi kamars()
    $totalKamar    = method_exists($kos, 'kamars') ? $kos->kamars()->count() : null;
    $kamarTersedia = method_exists($kos, 'kamars') ? $kos->kamars()->where('status', 'tersedia')->count() : null;
    $hargaMin      = method_exists($kos, 'kamars') ? ($kos->kamars()->min('harga') ?? 0) : ($kos->harga ?? 0);

    // Foto kos (lebih aman)
    $fotoKos = $kos->foto_kos ? asset(ltrim($kos->foto_kos, '/')) : null;
@endphp

<div class="container mt-4">

    {{-- FOTO UTAMA --}}
    <div class="mb-4">
        @if($fotoKos)
            <img src="{{ $fotoKos }}"
                 class="header-image"
                 alt="Foto Kos"
                 onerror="this.onerror=null;this.src='{{ asset('images/default-kos.jpg') }}';">
        @else
            <div class="bg-light p-5 text-center rounded">
                <p class="text-muted mb-0">Tidak ada foto kos.</p>
            </div>
        @endif
    </div>

    <div class="row">

        {{-- KOLOM KIRI --}}
        <div class="col-md-8">

            {{-- NAMA + ALAMAT --}}
            <h2 class="fw-bold">{{ $kos->nama }}</h2>
            <p class="text-muted mb-2">{{ $kos->alamat }}</p>

            {{-- INFO KAMAR --}}
            @if(!is_null($totalKamar))
                <div class="mb-3">
                    <p class="mb-1"><strong>Total Seluruh Kamar:</strong> {{ $totalKamar }}</p>
                    <p class="mb-0"><strong>Kamar Tersedia:</strong> {{ $kamarTersedia }}</p>
                </div>
            @elseif(isset($kos->jumlah_kamar_tersedia))
                <div class="mb-3">
                    <p class="mb-0"><strong>Kamar Tersedia:</strong> {{ $kos->jumlah_kamar_tersedia }}</p>
                </div>
            @endif

            {{-- HARGA --}}
            <h4 class="text-danger fw-bold">
                Rp{{ number_format($hargaMin ?? 0, 0, ',', '.') }} / bulan
            </h4>

            <hr>

            {{-- DESKRIPSI --}}
            <h5 class="fw-bold">Deskripsi</h5>
            <p style="line-height:1.7;">
                {{ $kos->deskripsi ?? 'Belum ada deskripsi.' }}
            </p>

            <hr>

            {{-- FASILITAS --}}
            <h5 class="fw-bold mb-3">Fasilitas</h5>

            @if(!empty($kos->fasilitas))
                <div class="d-flex flex-wrap">
                    @foreach(explode(',', $kos->fasilitas) as $fasilitas)
                        <span class="facility-icon">✔ {{ trim($fasilitas) }}</span>
                    @endforeach
                </div>
            @else
                <p class="text-muted">Belum ada fasilitas.</p>
            @endif

            <hr>

            {{-- PERATURAN --}}
            <h5 class="fw-bold mb-3">Peraturan Kos</h5>

            @if(!empty($kos->peraturan))
                @foreach(explode(',', $kos->peraturan) as $rule)
                    <div class="rule-item">
                        <span>✔</span>
                        <span>{{ trim($rule) }}</span>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Belum ada peraturan kos.</p>
            @endif

            <hr>

            {{-- MAPS --}}
            <h6 class="fw-bold mb-2">Lokasi Kos</h6>
            <div class="rounded shadow-sm overflow-hidden" style="max-width: 900px; height: 280px;">
                <iframe
                    src="https://www.google.com/maps?q={{ urlencode($kos->alamat) }}&output=embed"
                    style="border:0; width:100%; height:100%;"
                    loading="lazy"
                    allowfullscreen>
                </iframe>
            </div>

        </div>

        {{-- KOLOM KANAN --}}
        <div class="col-md-4">
            <div class="info-box shadow-sm">
                <h5 class="fw-bold mb-3">Kontak Kos</h5>

                <p class="mb-1"><strong>Pemilik:</strong> {{ $kos->pemilik ?? 'Belum diisi' }}</p>
                <p class="mb-1"><strong>No. HP:</strong> {{ $kos->kontak ?? 'Belum diisi' }}</p>

                {{-- TOMBOL WA --}}
                @if(!empty($kos->nomor_wa))
                    <a href="https://wa.me/62{{ ltrim(preg_replace('/\D/', '', $kos->nomor_wa), '0') }}"
                       target="_blank"
                       class="btn btn-success w-100 mt-3">
                        Tanya / Sewa via WhatsApp
                    </a>
                @endif

                <a href="{{ route('kos.index') }}" class="btn btn-secondary w-100 mt-2">
                    Kembali
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
