@extends('layouts.public')

@section('title', $product->nama_product)

@section('content')
<section class="container py-5">
    <a href="{{ route('home') }}" class="text-muted small d-inline-block mb-4">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke katalog
    </a>

    <div class="card border-0 shadow-sm overflow-hidden animate-fade-up">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $product->gambar) }}" class="w-100 h-100" style="object-fit:cover;min-height:320px;" alt="{{ $product->nama_product }}">
            </div>
            <div class="col-md-7">
                <div class="card-body p-4 p-md-5">
                    <span class="badge-kategori">{{ $product->kategori }}</span>
                    <h2 class="mt-3 mb-2">{{ $product->nama_product }}</h2>
                    <p class="price-tag fs-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                    <div class="d-flex align-items-center gap-2 mb-4">
                        <i class="bi bi-box-seam" style="color:var(--sr-primary)"></i>
                        <span class="text-muted">Stok tersedia: <strong>{{ $product->stok }}</strong></span>
                    </div>

                    <h6 class="mb-2">Deskripsi</h6>
                    <p class="text-muted mb-0">{{ $product->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
