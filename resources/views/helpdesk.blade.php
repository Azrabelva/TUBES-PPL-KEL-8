@extends('layouts.app') {{-- Pastikan ini mengacu pada layout utama Anda --}}

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="text-center mb-5 fw-bold">Hai, ada yang bisa dibantu?</h1>

            {{-- Search Box --}}
            <div class="input-group input-group-lg mb-5 shadow-sm rounded-pill overflow-hidden border">
                <span class="input-group-text bg-white border-0 ps-4 pe-2">
                    <i class="bi bi-search text-muted fs-4"></i>
                </span>
                <input type="text" class="form-control border-0 py-3" id="searchHelp"
                       placeholder="Masukkan kata pencarian di sini">
                <button class="btn btn-primary px-4" type="button" id="button-addon2">Cari</button>
            </div>

            <p class="text-center text-muted mb-4">Anda bisa telusuri kategori informasi sesuai tipe akun berikut ini:</p>

            {{-- Categories Section --}}
            <div class="row g-4 mb-5">
                <div class="col-md-6">
<<<<<<< HEAD
                    <a href="#" class="card text-decoration-none text-dark shadow-sm hover-lift">
                        <img src="{{ asset('images/kos.jpg') }}" class="card-img-top rounded-top-3" alt="Penyewa Kos">
=======
                    <a href="#" class="card text-decoration-none text-dark shadow-sm hover-lift h-100">
                        <div class="ratio ratio-1x1">
                            <img src="{{ asset('images/anak_kos.jpg') }}"
                                 class="w-100 h-100 rounded-top-3"
                                 style="object-fit: cover;"
                                 alt="Penyewa Kos">
                        </div>
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold mb-0">Penyewa Kos</h5>
                        </div>
                    </a>
                </div>
<<<<<<< HEAD
                <div class="col-md-6">
                    <a href="#" class="card text-decoration-none text-dark shadow-sm hover-lift">
                        <img src="{{ asset('images/kos2.jpg') }}" class="card-img-top rounded-top-3" alt="pemilik kos">
=======

                <div class="col-md-6">
                    <a href="#" class="card text-decoration-none text-dark shadow-sm hover-lift h-100">
                        <div class="ratio ratio-1x1">
                            <img src="{{ asset('images/pemilik_kos.jpg') }}"
                                 class="w-100 h-100 rounded-top-3"
                                 style="object-fit: cover;"
                                 alt="Pemilik Kos">
                        </div>
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold mb-0">Pemilik Kos</h5>
                        </div>
                    </a>
                </div>
            </div>

            {{-- "Paling Sering Dicari" Section --}}
            <h2 class="mb-4 fw-bold text-dark">Paling Sering Dicari</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

                {{-- FAQ ITEM 1 --}}
                <div class="col faq-item">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-laptop fs-4 me-2 text-primary"></i>Produk dan Fitur untuk Penyewa
                            </h5>
                            <p class="card-text">Mengapa percakapan saya dengan pemilik kos di chat hilang?</p>
<<<<<<< HEAD
                            <a href="#" class="text-decoration-none text-primary fw-semibold">Selengkapnya</a>
=======

>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
                        </div>
                    </div>
                </div>

                {{-- FAQ ITEM 2 --}}
                <div class="col faq-item">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-file-earmark-text fs-4 me-2 text-primary"></i>Kebijakan dan Panduan
                            </h5>
                            <p class="card-text">Kebijakan Privasi KosNyaman</p>
<<<<<<< HEAD
                            <a href="#" class="text-decoration-none text-primary fw-semibold">Selengkapnya</a>
=======
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
                        </div>
                    </div>
                </div>

                {{-- FAQ ITEM 3 --}}
                <div class="col faq-item">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-person-circle fs-4 me-2 text-primary"></i>Akun Penyewa
                            </h5>
                            <p class="card-text">Saya lupa password akun penyewa, apa yang harus saya lakukan?</p>
<<<<<<< HEAD
                            <a href="#" class="text-decoration-none text-primary fw-semibold">Selengkapnya</a>
=======
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
                        </div>
                    </div>
                </div>

                {{-- FAQ ITEM 4 --}}
                <div class="col faq-item">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-house-door fs-4 me-2 text-primary"></i>Akun Pemilik
                            </h5>
                            <p class="card-text">Bagaimana cara mengubah profil kos saya?</p>
<<<<<<< HEAD
                            <a href="#" class="text-decoration-none text-primary fw-semibold">Selengkapnya</a>
=======
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
                        </div>
                    </div>
                </div>

                {{-- FAQ ITEM 5 --}}
                <div class="col faq-item">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-shield-check fs-4 me-2 text-primary"></i>Panduan Keamanan
                            </h5>
                            <p class="card-text">Bagaimana menjaga keamanan transaksi sewa kos?</p>
<<<<<<< HEAD
                            <a href="#" class="text-decoration-none text-primary fw-semibold">Selengkapnya</a>
=======
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
                        </div>
                    </div>
                </div>

                {{-- FAQ ITEM 6 --}}
                <div class="col faq-item">
                    <div class="card h-100 border-0 shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-journal-text fs-4 me-2 text-primary"></i>Syarat dan Ketentuan
                            </h5>
                            <p class="card-text">Syarat dan Ketentuan Umum penggunaan layanan KosNyaman.</p>
<<<<<<< HEAD
                            <a href="#" class="text-decoration-none text-primary fw-semibold">Selengkapnya</a>
=======
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- FOOTER DIHAPUS — Footer sudah dipanggil otomatis lewat layouts.app --}}
@endsection

{{-- Style & Script tetap dipakai --}}
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchHelp').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let helpItems = document.querySelectorAll('.faq-item');

        helpItems.forEach(item => {
            let itemText = item.textContent.toLowerCase();
            item.style.display = itemText.includes(value) ? 'block' : 'none';
        });
    });

    document.getElementById('button-addon2').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('searchHelp').dispatchEvent(new Event('keyup'));
    });
});
</script>
@endsection
<<<<<<< HEAD
=======


@section('styles')
<style>
    .helpdesk-cat-img{
        width: 100% !important;
        height: 260px !important;         /* silakan naik/turunkan sesuai selera */
        object-fit: cover !important;     /* kunci: gambar akan ter-crop rapi */
        object-position: center !important;
        display: block !important;
    }
</style>
@endsection
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
