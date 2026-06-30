@extends('layouts.admin')

@section('title', 'Data Product')
@section('page-title', 'Data Product')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Product</li>
@endsection

@section('content')

<div class="card p-4">
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-2">
        <h5 class="mb-0">Daftar Product</h5>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.products.export.pdf') }}" class="btn btn-outline-brand rounded-pill" target="_blank" rel="noopener">
                <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
            </a>
            <a href="{{ route('admin.products.create') }}" class="btn btn-brand-primary rounded-pill">
                <i class="bi bi-plus-circle me-1"></i> Tambah Product
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table id="products-table" class="table table-bordered align-middle w-100">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Product</th>
                    <th>Gambar</th>
                    <th>Nama Product</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<form id="delete-form" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

@endsection

@push('scripts')
<script>
$(function () {
    $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.products.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'id_product', name: 'id_product' },
            { data: 'gambar', name: 'gambar', orderable: false, searchable: false },
            { data: 'nama_product', name: 'nama_product' },
            { data: 'kategori', name: 'kategori' },
            { data: 'harga', name: 'harga' },
            { data: 'stok', name: 'stok' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
        ],
        language: {
            search: '',
            searchPlaceholder: 'Cari product...',
            zeroRecords: 'Tidak ada data yang cocok',
            emptyTable: 'Belum ada data product',
            paginate: { previous: 'Sebelumnya', next: 'Berikutnya' },
        },
    });

    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        const url = $(this).data('url');

        Swal.fire({
            title: 'Hapus product ini?',
            text: 'Data yang sudah dihapus tidak dapat dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2F5D3A',
            cancelButtonColor: '#C9A66B',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form').attr('action', url).submit();
            }
        });
    });
});
</script>
@endpush
