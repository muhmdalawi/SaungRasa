<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();

        $products = Product::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner->where('nama_product', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        $featuredProducts = Product::query()->latest()->take(4)->get();

        return view('public.home', [
            'products' => $products,
            'featuredProducts' => $featuredProducts,
            'search' => $search,
        ]);
    }

    public function show(Product $product): View
    {
        return view('public.show', [
            'product' => $product,
        ]);
    }
}
