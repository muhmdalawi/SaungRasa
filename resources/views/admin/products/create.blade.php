@extends('layouts.admin')

@section('title', 'Tambah Product')
@section('page-title', 'Tambah Product')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Data Product</a></li>
    <li class="breadcrumb-item active">Tambah Product</li>
@endsection

@section('content')

<div class="card p-4 p-md-5">
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            <div class="col-md-4">
                <label class="form-label">Gambar Product</label>
                <div class="border rounded-3 p-3 text-center mb-2 d-flex align-items-center justify-content-center" style="min-height:160px;background:#f4f1ea;">
                    <img id="imagePreview" src="" class="img-fluid rounded d-none" style="max-height:200px;object-fit:cover;">
                    <span id="imagePreviewPlaceholder" class="text-muted small">
                        <i class="bi bi-image fs-1 d-block mb-1"></i> Belum ada gambar dipilih
                    </span>
                </div>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept=".jpg,.jpeg,.png">
                @error('gambar')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <small class="text-muted">Format jpg, jpeg, png. Maksimal 2 MB.</small>
            </div>

            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_product" class="form-label">Nama Product</label>
                        <input type="text" name="nama_product" id="nama_product" class="form-control @error('nama_product') is-invalid @enderror" value="{{ old('nama_product') }}">
                        @error('nama_product')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}" placeholder="Contoh: Makanan Berat">
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="number" min="0" step="0.01" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" min="0" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-brand-primary rounded-pill px-4">
                <i class="bi bi-check-circle me-1"></i> Simpan
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
        const preview = document.getElementById('imagePreview');
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
        document.getElementById('imagePreviewPlaceholder').classList.add('d-none');
    }
});
</script>
@endpush
