<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $kategoriBreakdown = Product::query()
            ->selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->orderByDesc('total')
            ->get();

        return view('admin.dashboard', [
            'totalProducts' => Product::count(),
            'totalKategori' => $kategoriBreakdown->count(),
            'totalStok' => (int) Product::sum('stok'),
            'lowStockCount' => Product::where('stok', '<', 10)->count(),
            'kategoriBreakdown' => $kategoriBreakdown,
            'latestProducts' => Product::latest()->take(5)->get(),
        ]);
    }
}
