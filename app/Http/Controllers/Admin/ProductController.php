<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = Product::with('categoryProduct')->latest()->get();

        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categoryProducts'] = CategoryProduct::orderBy('name')->get();

        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_product_id' => 'required|exists:category_products,id',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        try {
            $validated['picture'] = $request->file('picture') ? $request->file('picture')->store('img/products', 'public') : null;

            DB::transaction(function () use ($validated) {
                Product::create($validated);
            });

            return redirect()->route('admin.master-data.products.index')->with('success', 'Data created successfully.');
        } catch (\Exception $e) {

            Log::error('Failed to create data: ' . $e->getMessage());

            return redirect()->route('admin.master-data.products.index')->with('error', 'Failed to create data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data['product'] = $product;

        return view('admin.products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data['product'] = $product;
        $data['categoryProducts'] = CategoryProduct::orderBy('name')->get();

        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_product_id' => 'required|exists:category_products,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        try {
            $validated['picture'] = $request->file('picture') ? $request->file('picture')->store('img/products', 'public') : $product->picture;

            if ($request->file('picture') && $product->picture) {
                Storage::disk('public')->delete($product->picture);
            }

            DB::transaction(function () use ($validated, $product) {
                Product::where('id', $product->id)->update($validated);
            });

            return redirect()->route('admin.master-data.products.index')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {

            Log::error('Failed to update data: ' . $e->getMessage());

            return redirect()->route('admin.master-data.products.index')->with('error', 'Failed to update data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.master-data.products.index')->with('success', 'Data deleted successfully.');
    }
}
