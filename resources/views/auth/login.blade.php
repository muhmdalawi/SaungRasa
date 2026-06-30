@extends('layouts.guest')

@section('title', 'Login Admin')

@section('content')
    <div class="auth-wrapper px-3">
        <div class="card auth-card p-4 p-md-5 animate-fade-up">
            <div class="text-center mb-4">
                <img src="{{ asset('assets/logo.png') }}" alt="Saung Rasa" style="height:64px;">
                <h4 class="mt-3 mb-1">Login Admin</h4>
                <p class="text-muted small mb-0">Masuk untuk mengelola produk Saung Rasa</p>
            </div>

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" id="username"
                            class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                            placeholder="Masukkan Email" autofocus>
                    </div>
                    @error('username')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password">
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-brand-primary w-100 rounded-pill py-2">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>

                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="small text-muted">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke beranda
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
