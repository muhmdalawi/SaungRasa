@extends('layouts.admin')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Data Product</a></li>
    <li class="breadcrumb-item active">Edit Product</li>
@endsection

@section('content')

<div class="card p-4 p-md-5">
    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-md-4">
                <label class="form-label">Gambar Product</label>
                <div class="border rounded-3 p-3 text-center mb-2">
                    <img id="imagePreview" src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid rounded" style="max-height:200px;object-fit:cover;">
                </div>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept=".jpg,.jpeg,.png">
                @error('gambar')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar. Format jpg, jpeg, png, maks 2 MB.</small>
            </div>

            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="id_product" class="form-label">ID Product</label>
                        <input type="text" name="id_product" id="id_product" class="form-control @error('id_product') is-invalid @enderror" value="{{ old('id_product', $product->id_product) }}">
                        @error('id_product')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="nama_product" class="form-label">Nama Product</label>
                        <input type="text" name="nama_product" id="nama_product" class="form-control @error('nama_product') is-invalid @enderror" value="{{ old('nama_product', $product->nama_product) }}">
                        @error('nama_product')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori', $product->kategori) }}">
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="number" min="0" step="0.01" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $product->harga) }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" min="0" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $product->stok) }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-brand-primary rounded-pill px-4">
                <i class="bi bi-check-circle me-1"></i> Perbarui
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('gambar').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        document.getElementById('imagePreview').src = URL.createObjectURL(file);
    }
});
</script>
@endpush
