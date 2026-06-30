@extends('layouts.public')

@section('title', 'Beranda')

@section('content')

<section class="hero-section text-center">
    <div class="container animate-fade-up">
        <h1 class="display-5 mb-3">Cita Rasa Sunda yang Autentik & Modern</h1>
        <p class="lead mb-4 mx-auto" style="max-width:640px;">
            Saung Rasa menghadirkan beragam hidangan dan minuman khas Sunda dengan kualitas premium,
            disiapkan dengan resep turun-temurun dan sentuhan presentasi modern.
        </p>
        <a href="#produk" class="btn btn-brand-secondary rounded-pill px-4 py-2">
            <i class="bi bi-egg-fried me-1"></i> Lihat Produk Kami
        </a>
    </div>
</section>

<section class="container py-5">
    <div class="row align-items-center g-4">
        <div class="col-lg-6">
            <h2 class="section-title">Tentang Saung Rasa</h2>
            <p class="text-muted">
                Berawal dari kecintaan terhadap kuliner tradisional Sunda, Saung Rasa hadir sebagai UMKM yang
                mengelola dan menyajikan produk makanan & minuman khas dengan standar kebersihan dan kualitas
                yang konsisten. Setiap produk dipilih dan diolah dengan penuh perhatian agar cita rasa otentik
                tetap terjaga, dikemas dalam pengalaman yang modern dan profesional.
            </p>
        </div>
        <div class="col-lg-6">
            <div class="row g-3">
                <div class="col-6">
                    <div class="card text-center p-4 h-100">
                        <i class="bi bi-award fs-1 mb-2" style="color:var(--sr-primary)"></i>
                        <h6 class="mb-0">Kualitas Terjaga</h6>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card text-center p-4 h-100">
                        <i class="bi bi-heart fs-1 mb-2" style="color:var(--sr-secondary)"></i>
                        <h6 class="mb-0">Resep Autentik</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($featuredProducts->isNotEmpty())
<section class="container py-4">
    <h2 class="section-title">Produk Unggulan</h2>
    <div class="row g-4">
        @foreach ($featuredProducts as $product)
            <div class="col-6 col-md-3">
                <div class="card product-card h-100">
                    <img src="{{ asset('storage/' . $product->gambar) }}" class="product-card-img w-100" alt="{{ $product->nama_product }}">
                    <div class="card-body">
                        <span class="badge-kategori small">{{ $product->kategori }}</span>
                        <h6 class="mt-2 mb-1">{{ $product->nama_product }}</h6>
                        <p class="price-tag mb-0">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

<section class="container py-5" id="produk">
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
        <h2 class="section-title mb-0">Katalog Produk</h2>
        <form method="GET" action="{{ route('home') }}#produk" class="search-bar">
            <div class="input-group">
                <input type="text" name="search" value="{{ $search }}" class="form-control"
                    placeholder="Cari nama atau kategori produk...">
                <button type="submit" class="btn btn-brand-primary"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>

    @if ($products->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-emoji-frown display-4 text-muted"></i>
            <p class="text-muted mt-3 mb-0">
                @if ($search !== '')
                    Tidak ada produk yang cocok dengan pencarian "{{ $search }}".
                @else
                    Belum ada produk yang tersedia saat ini.
                @endif
            </p>
        </div>
    @else
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <img src="{{ asset('storage/' . $product->gambar) }}" class="product-card-img w-100" alt="{{ $product->nama_product }}">
                        <div class="card-body d-flex flex-column">
                            <span class="badge-kategori small align-self-start">{{ $product->kategori }}</span>
                            <h6 class="mt-2 mb-1">{{ $product->nama_product }}</h6>
                            <p class="price-tag mb-3">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('product.show', $product) }}" class="btn btn-outline-brand rounded-pill mt-auto">
                                Detail <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>

@endsection
