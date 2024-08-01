<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['promotions'] = Promotion::latest()->get();

        return view('admin.promotions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:promotions,code',
            'name' => 'required|string|max:255',
            'type' => 'required|in:FIXED,PERCENT',
            'discount' => 'required|numeric|min:0',
        ]);

        try {

            DB::transaction(function () use ($validated) {
                Promotion::create($validated);
            });

            return redirect()->route('admin.master-data.promotions.index')->with('success', 'Data created successfully.');
        } catch (\Exception $e) {

            Log::error('Failed to create data: ' . $e->getMessage());

            return redirect()->route('admin.master-data.promotions.index')->with('error', 'Failed to create data.');
        }

        return view('admin.promotions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        $data['promotion'] = $promotion;

        return view('admin.promotions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        $data['promotion'] = $promotion;

        return view('admin.promotions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:promotions,code,' . $promotion->id,
            'name' => 'required|string|max:255',
            'type' => 'required|in:FIXED,PERCENT',
            'discount' => 'required|numeric|min:0',
        ]);

        try {

            DB::transaction(function () use ($validated, $promotion) {
                Promotion::where('id', $promotion->id)->update($validated);
            });

            return redirect()->route('admin.master-data.promotions.index')->with('success', 'Data created successfully.');
        } catch (\Exception $e) {

            Log::error('Failed to create data: ' . $e->getMessage());

            return redirect()->route('admin.master-data.promotions.index')->with('error', 'Failed to create data.');
        }

        return view('admin.promotions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();

        return redirect()->route('admin.master-data.promotions.index')->with('success', 'Data deleted successfully.');
    }
}
