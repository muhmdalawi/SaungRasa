<div class="d-flex gap-1">
    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-secondary" title="Lihat">
        <i class="bi bi-eye"></i>
    </a>
    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-brand" title="Edit">
        <i class="bi bi-pencil"></i>
    </a>
    <button type="button" class="btn btn-sm btn-outline-danger btn-delete" data-url="{{ route('admin.products.destroy', $product) }}" title="Hapus">
        <i class="bi bi-trash"></i>
    </button>
</div>
