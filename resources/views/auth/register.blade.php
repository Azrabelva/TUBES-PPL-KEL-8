@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow-sm p-4">

            <h4 class="text-center mb-3 fw-bold">Daftar Akun Baru</h4>

            {{-- ERROR HANDLING --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- REGISTER FORM --}}
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        placeholder="Nama sesuai KTP"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="email@example.com"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control" 
                        placeholder="Minimal 6 karakter"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        class="form-control"
                        placeholder="Ulangi password"
                        required
                    >
                </div>

                <button class="btn btn-primary w-100">Daftar</button>

            </form>

            <div class="text-center mt-3">
                <small class="text-muted">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                </small>
            </div>

        </div>

    </div>
</div>

@endsection
