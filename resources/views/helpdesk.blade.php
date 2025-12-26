@extends('layouts.app') {{-- Pastikan ini mengacu pada layout utama Anda --}}

@section('styles')
<style>
    /* Category image */
    .helpdesk-cat-img{
        width: 100% !important;
        height: 260px !important;
        object-fit: cover !important;
        object-position: center !important;
        display: block !important;
    }

    /* Optional: efek hover halus */
    .hover-lift{
        transition: transform .15s ease, box-shadow .15s ease;
    }
    .hover-lift:hover{
        transform: translateY(-2px);
        box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.08) !important;
    }
</style>
@endsection

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
                    <a href="#" class="card text-decoration-none text-dark shadow-sm hover-lift h-100">
                        <img src="{{ asset('images/anak_kos.jpg') }}"
                             class="helpdesk-cat-img rounded-top-3"
                             alt="Penyewa Kos">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold mb-0">Penyewa Kos</h5>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="#" class="card text-decoration-none text-dark shadow-sm hover-lift h-100">
                        <img src="{{ asset('images/pemilik_kos.jpg') }}"
                             class="helpdesk-cat-img rounded-top-3"
                             alt="Pemilik Kos">
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('searchHelp');
    const btn = document.getElementById('button-addon2');

    function filterFaq(){
        let value = (input.value || '').toLowerCase();
        let helpItems = document.querySelectorAll('.faq-item');

        helpItems.forEach(item => {
            let itemText = item.textContent.toLowerCase();
            item.style.display = itemText.includes(value) ? '' : 'none';
        });
    }

    input.addEventListener('keyup', filterFaq);
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        filterFaq();
    });
});
</script>
@endsection
