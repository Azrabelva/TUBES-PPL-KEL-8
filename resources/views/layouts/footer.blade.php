<footer class="bg-white text-dark py-4 mt-auto">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-4">
        <div class="d-flex align-items-center mb-2">
          <img
            src="{{ asset('images/logokos.png') }}"
            width="40"
            height="40"
            class="rounded-circle me-2"
            alt="logo"
            onerror="this.onerror=null;this.src='{{ asset('images/kos.png') }}';"
          >
          <strong>KosNyaman</strong>
        </div>
        <p class="small text-muted">Dapatkan info kos terbaik hanya di KosNyaman.</p>
      </div>

      <div class="col-md-4">
        <h6 class="small fw-bold">Kebijakan</h6>
        <ul class="list-unstyled small">
          <li><a href="#" class="text-muted text-decoration-none">Kebijakan Privasi</a></li>
          <li><a href="#" class="text-muted text-decoration-none">Syarat &amp; Ketentuan</a></li>
        </ul>
      </div>

      <div class="col-md-4">
        <h6 class="small fw-bold">Hubungi Kami</h6>
        <p class="small text-muted mb-0">support@kosnyaman.com</p>
        <p class="small text-muted">+62 812 3456 7890</p>
      </div>
    </div>

    <hr class="mt-3">
    <p class="small text-center text-muted mb-0">
      © {{ date('Y') }} KosNyaman.com. Semua Hak Cipta Dilindungi.
    </p>
  </div>
</footer>
