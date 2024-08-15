<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['categoryProducts'] = CategoryProduct::latest()->get();

        return view('admin.category-products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category-products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('category_products')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
        ]);

        try {

            DB::transaction(function () use ($validated) {
                CategoryProduct::create($validated);
            });

            return redirect()->route('admin.master-data.category-products.index')->with('success', 'Kategori produk berhasil dibuat.');
        } catch (\Exception $e) {

            Log::error('Failed to create data: ' . $e->getMessage());

            return redirect()->route('admin.master-data.category-products.index')->with('error', 'Gagal membuat kategori produk.');
        }

        return view('admin.category-products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProduct $categoryProduct)
    {
        $data['categoryProduct'] = $categoryProduct;

        return view('admin.category-products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        $data['categoryProduct'] = $categoryProduct;

        return view('admin.category-products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryProduct $categoryProduct)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('category_products')->where(function ($query) use ($categoryProduct) {
                    return $query->whereNull('deleted_at')->where('id', '!=', $categoryProduct->id);
                }),
            ],
        ]);

        try {

            DB::transaction(function () use ($validated, $categoryProduct) {
                CategoryProduct::where('id', $categoryProduct->id)->update($validated);
            });

            return redirect()->route('admin.master-data.category-products.index')->with('success', 'Kategori produk berhasil diperbarui.');
        } catch (\Exception $e) {

            Log::error('Failed to update data: ' . $e->getMessage());

            return redirect()->route('admin.master-data.category-products.index')->with('error', 'Gagal memperbarui kategori produk.');
        }

        return view('admin.category-products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProduct $categoryProduct)
    {
        $categoryProduct->delete();

        return redirect()->route('admin.master-data.category-products.index')->with('success', 'Kategori produk berhasil dihapus.');
    }
}
