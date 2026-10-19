<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // READ ALL dengan Pencarian, Penyaringan, dan Paginasi
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Fitur Pencarian Nama / Deskripsi
        if ($request->has('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Fitur Penyaringan Berdasarkan Kategori
        if ($request->has('category_id')) {
            $query->where('category_id', $request->query('category_id'));
        }

        // Fitur Penyaringan Rentang Harga (Opsional)
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->query('min_price'));
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->query('max_price'));
        }

        $products = $query->latest()->paginate(10);

        return ProductResource::collection($products);
    }

    // CREATE (Tambah Produk + Upload Gambar)
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product = Product::create($validated);

        return new ProductResource($product->load('category'));
    }

    // READ DETAIL
    public function show(Product $product)
    {
        return new ProductResource($product->load('category'));
    }

    // UPDATE Produk (+ Handle Penggantian Gambar)
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);

        return new ProductResource($product->load('category'));
    }

    // DELETE Produk
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus'
        ], 200);
    }
}