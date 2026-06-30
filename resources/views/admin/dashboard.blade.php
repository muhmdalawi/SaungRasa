@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')

<div class="welcome-banner animate-fade-up mb-4">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div>
            <h4 class="mb-1">Selamat datang, {{ Auth::user()->name }} 👋</h4>
            <p class="mb-0 small" style="opacity:.85">{{ now()->translatedFormat('l, d F Y') }} &middot; Kelola produk Saung Rasa dengan mudah dari sini.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-light rounded-pill px-4">
            <i class="bi bi-plus-circle me-1"></i> Tambah Product
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card bg-primary-brand animate-fade-up">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-1 small" style="opacity:.85">Total Product</p>
                    <div class="stat-value">{{ $totalProducts }}</div>
                </div>
                <i class="bi bi-box-seam stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card bg-secondary-brand animate-fade-up">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-1 small" style="opacity:.85">Total Kategori</p>
                    <div class="stat-value">{{ $totalKategori }}</div>
                </div>
                <i class="bi bi-tags stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card bg-dark-brand animate-fade-up">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-1 small" style="opacity:.85">Total Stok</p>
                    <div class="stat-value">{{ $totalStok }}</div>
                </div>
                <i class="bi bi-stack stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card bg-warning-brand animate-fade-up">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-1 small" style="opacity:.85">Stok Menipis</p>
                    <div class="stat-value">{{ $lowStockCount }}</div>
                </div>
                <i class="bi bi-exclamation-triangle stat-icon"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-5">
        <div class="card p-4 h-100">
            <h5 class="mb-3">Produk per Kategori</h5>

            @if ($kategoriBreakdown->isEmpty())
                <p class="text-muted mb-0">Belum ada data kategori.</p>
            @else
                @php $maxTotal = $kategoriBreakdown->max('total'); @endphp
                <div class="d-flex flex-column gap-3">
                    @foreach ($kategoriBreakdown as $item)
                        <div>
                            <div class="d-flex justify-content-between mb-1">
                                <span class="small fw-medium">{{ $item->kategori }}</span>
                                <span class="small text-muted">{{ $item->total }} produk</span>
                            </div>
                            <div class="kategori-bar">
                                <div class="kategori-bar-fill" style="width: {{ $maxTotal > 0 ? round($item->total / $maxTotal * 100) : 0 }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="mb-0">Produk Terbaru</h5>
                <a href="{{ route('admin.products.index') }}" class="small">Lihat semua <i class="bi bi-arrow-right"></i></a>
            </div>

            @if ($latestProducts->isEmpty())
                <p class="text-muted mb-0">Belum ada data product.</p>
            @else
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestProducts as $product)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ asset('storage/' . $product->gambar) }}" width="42" height="42" class="rounded-circle shadow-sm" style="object-fit:cover;" alt="{{ $product->nama_product }}">
                                            <div>
                                                <div class="fw-medium">{{ $product->nama_product }}</div>
                                                <div class="small text-muted">{{ $product->id_product }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge-kategori small">{{ $product->kategori }}</span></td>
                                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($product->stok < 10)
                                            <span class="badge-stok badge-stok-low">{{ $product->stok }}</span>
                                        @else
                                            <span class="badge-stok badge-stok-ok">{{ $product->stok }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
