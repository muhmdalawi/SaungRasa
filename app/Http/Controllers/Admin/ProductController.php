<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request): View|\Illuminate\Http\JsonResponse
    {
        if ($request->ajax()) {
            return DataTables::of(Product::query())
                ->addIndexColumn()
                ->editColumn('harga', fn (Product $product) => 'Rp ' . number_format((float) $product->harga, 0, ',', '.'))
                ->addColumn('gambar', fn (Product $product) => '<img src="' . asset('storage/' . $product->gambar) . '" width="60" class="rounded shadow-sm" alt="' . e($product->nama_product) . '">')
                ->addColumn('aksi', fn (Product $product) => view('admin.products._actions', ['product' => $product])->render())
                ->rawColumns(['gambar', 'aksi'])
                ->make(true);
        }

        return view('admin.products.index');
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $path = $request->file('gambar')->store('products', 'public');

        Product::create([
            ...$request->validated(),
            'id_product' => Product::generateId(),
            'gambar' => $path,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product berhasil ditambahkan.');
    }

    public function show(Product $product): View
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
                Storage::disk('public')->delete($product->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('products', 'public');
        } else {
            unset($data['gambar']);
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product berhasil dihapus.');
    }

    public function exportPdf(): Response
    {
        $products = Product::orderBy('nama_product')->get();

        $pdf = Pdf::loadView('pdf.products', [
            'products' => $products,
            'tanggal' => now(),
        ]);

        return $pdf->download('laporan-product-saung-rasa-' . now()->format('Y-m-d') . '.pdf');
    }
}
