@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">

        <div class="card shadow-sm p-4">

            <h4 class="text-center mb-3 fw-bold">Masuk ke KosNyaman</h4>

            {{-- ERROR MESSAGE --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- FORM LOGIN --}}
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf

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
                        placeholder="••••••••" 
                        required
                    >
                </div>

                <button class="btn btn-primary w-100">Masuk</button>

            </form>

            <div class="text-center mt-3">
                <small class="text-muted">
                    Belum punya akun? <a href="#">Daftar</a>
                </small>
            </div>

        </div>

    </div>
</div>

@endsection
