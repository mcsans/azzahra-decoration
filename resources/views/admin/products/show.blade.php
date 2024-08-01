<x-admin.app title="Azzahra Decoration - Product">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Product</h1>
        <a href="{{ route('admin.master-data.products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Back to Datatable
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form>
        <div class="form-group mb-4">
            <label>Picture :</label>
            <a href="{{ asset('storage/' . $product->picture) }}" class="popup-image">
                <img src="{{ asset('storage/' . $product->picture) }}" width="100" class="d-block border">
            </a>
        </div>

        <x-admin.text-detail label="Category Product" value="{{ $product->categoryProduct->name }}" />
        <x-admin.text-detail label="Name" value="{{ $product->name }}" />
        <x-admin.text-detail label="Price" value="Rp. {{ number_format($product->price, 0, ',', '.') }},-" />
        <x-admin.text-detail label="Stock" value="{{ number_format($product->stock, 0, ',', '.') }}" />
        <x-admin.text-detail label="Description" value="{!! $product->description !!}" />
    </x-admin.form>

</x-admin.app>
