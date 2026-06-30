@extends('layouts.admin')

@section('title', 'Detail Product')
@section('page-title', 'Detail Product')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Data Product</a></li>
    <li class="breadcrumb-item active">Detail Product</li>
@endsection

@section('content')

<div class="card p-4 p-md-5">
    <div class="row g-4">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid rounded-3 w-100" style="object-fit:cover;max-height:260px;" alt="{{ $product->nama_product }}">
        </div>
        <div class="col-md-8">
            <span class="badge-kategori">{{ $product->kategori }}</span>
            <h3 class="mt-3 mb-1">{{ $product->nama_product }}</h3>
            <p class="text-muted mb-3">ID Product: <strong>{{ $product->id_product }}</strong></p>

            <div class="row g-3 mb-3">
                <div class="col-6">
                    <p class="small text-muted mb-1">Harga</p>
                    <p class="price-tag fs-5">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                </div>
                <div class="col-6">
                    <p class="small text-muted mb-1">Stok</p>
                    <p class="fs-5 fw-semibold">{{ $product->stok }}</p>
                </div>
            </div>

            <p class="small text-muted mb-1">Deskripsi</p>
            <p>{{ $product->deskripsi }}</p>

            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-brand-primary rounded-pill px-4">
                    <i class="bi bi-pencil me-1"></i> Edit
                </a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
