@extends('layouts.admin')

@section('content')

<style>
    .modal-backdrop.show {
        backdrop-filter: blur(6px);
        background: rgba(0, 0, 0, .35);
    }
    .modal-content { border-radius: 12px; }

    .rules-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 12px;
    }

    .rule-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        cursor: pointer;
        background: #fff;
    }

    .rule-item input { display: none; }

    .rule-item input:checked + .icon + span {
        color: var(--theme-color);
        font-weight: 600;
    }

    .icon { font-size: 20px; }
</style>

<div class="container mt-4">
    <h4 class="fw-bold mb-4">Dashboard Admin</h4>

    {{-- HEADER --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between">
            <h5 class="fw-bold mb-0">Manajemen Kos</h5>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahKos">
                + Tambah Kos
            </button>
        </div>
    </div>

    {{-- LIST KOS --}}
    <div class="card shadow-sm">
        <div class="card-body">
            @forelse($kosList as $kos)
                <div class="border rounded p-3 mb-3 d-flex justify-content-between">
                    <div>
                        <h6 class="fw-bold mb-1">{{ $kos->nama }}</h6>
                        <p class="text-muted mb-1">📍 {{ $kos->alamat }}</p>
                        <small>
                            Harga: <strong>Rp{{ number_format($kos->harga,0,',','.') }}</strong><br>
                            Kamar tersedia: <strong>{{ $kos->jumlah_kamar_tersedia }}</strong><br>
                            WA: <strong>{{ $kos->nomor_wa ?? '-' }}</strong>
                        </small>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#edit{{ $kos->id }}">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#delete{{ $kos->id }}">
                            Hapus
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada data kos.</p>
            @endforelse
        </div>
    </div>
</div>

{{-- ================= TAMBAH KOS ================= --}}
<div class="modal fade" id="modalTambahKos" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.dashboard.kos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="fw-bold">Tambah Kos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nama Kos</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Nomor WhatsApp</label>
                        <input type="text" name="nomor_wa" class="form-control"
                               placeholder="contoh: 628123456789">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Harga / bulan</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jumlah Kamar Tersedia</label>
                            <input type="number" name="jumlah_kamar_tersedia" class="form-control" min="0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Foto Kos</label>
                        <input type="file" name="foto_kos" class="form-control">
                    </div>

                    {{-- PERATURAN --}}
                    <h6 class="fw-bold mt-3">Peraturan Kos</h6>
                    <div class="rules-grid">
                        @foreach([
                            'Ada jam malam'=>'⏰',
                            'Denda kerusakan barang'=>'💰',
                            'Maks. 2 orang / kamar'=>'🛏️',
                            'Dilarang merokok di kamar'=>'🚭',
                            'Dilarang membawa hewan'=>'🐾'
                        ] as $text=>$icon)
                            <label class="rule-item">
                                <input type="checkbox" class="rule" value="{{ $text }}">
                                <span class="icon">{{ $icon }}</span>
                                <span>{{ $text }}</span>
                            </label>
                        @endforeach
                    </div>
                    <textarea name="peraturan" id="peraturan" class="form-control mt-2" readonly></textarea>

                    {{-- FASILITAS --}}
                    <h6 class="fw-bold mt-3">Fasilitas</h6>
                    <div class="rules-grid">
                        @foreach([
                            'Wi-Fi'=>'🌐','Kamar Mandi Dalam'=>'🚿','Kasur'=>'🛏️',
                            'Kipas Angin'=>'🌀','TV'=>'📺'
                        ] as $text=>$icon)
                            <label class="rule-item">
                                <input type="checkbox" class="facility" value="{{ $text }}">
                                <span class="icon">{{ $icon }}</span>
                                <span>{{ $text }}</span>
                            </label>
                        @endforeach
                    </div>
                    <textarea name="fasilitas" id="fasilitas" class="form-control mt-2" readonly></textarea>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ================= EDIT & DELETE ================= --}}
@foreach($kosList as $kos)

{{-- EDIT --}}
<div class="modal fade" id="edit{{ $kos->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.dashboard.kos.update', $kos->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="fw-bold">Edit Kos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nama Kos</label>
                        <input type="text" name="nama" class="form-control" value="{{ $kos->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required>{{ $kos->alamat }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Nomor WhatsApp</label>
                        <input type="text" name="nomor_wa" class="form-control"
                               value="{{ $kos->nomor_wa }}">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ $kos->deskripsi }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ $kos->harga }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jumlah Kamar</label>
                            <input type="number" name="jumlah_kamar_tersedia"
                                   class="form-control" value="{{ $kos->jumlah_kamar_tersedia }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto_kos" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Peraturan</label>
                        <textarea name="peraturan" class="form-control">{{ $kos->peraturan }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Fasilitas</label>
                        <textarea name="fasilitas" class="form-control">{{ $kos->fasilitas }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary btn-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- DELETE --}}
<div class="modal fade" id="delete{{ $kos->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.dashboard.kos.delete',$kos->id) }}" method="POST">
                @csrf @method('DELETE')
                <div class="modal-body text-center">
                    <p>Hapus kos <strong>{{ $kos->nama }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script>
    function sync(selector, output) {
        document.querySelectorAll(selector).forEach(cb => {
            cb.addEventListener('change', () => {
                document.getElementById(output).value =
                    [...document.querySelectorAll(selector)]
                    .filter(x => x.checked)
                    .map(x => x.value).join(', ');
            });
        });
    }
    sync('.rule', 'peraturan');
    sync('.facility', 'fasilitas');
</script>

@endsection
