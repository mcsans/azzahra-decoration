<x-admin.app title="Azzahra Decoration - Product">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
        <a href="{{ route('admin.master-data.products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Back to Datatable
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form action="{{ route('admin.master-data.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-admin.input label="Picture" type="file" name="picture" :required="false" />
        <x-admin.select label="Category Product" name="category_product_id" value="{{ old('category_product_id', $product->category_product_id) }}">
            @foreach ($categoryProducts as $categoryProduct)
                <option value="{{ $categoryProduct->id }}" {{ old('category_product_id', $product->category_product_id) == $categoryProduct->id ? 'selected' : '' }}>
                    {{ $categoryProduct->name }}
                </option>
            @endforeach
        </x-admin.select>
        <x-admin.input label="Name" type="string" name="name" value="{{ old('name', $product->name) }}" />
        <x-admin.input label="Price" type="number" name="price" value="{{ old('price', $product->price) }}" />
        <x-admin.input label="Stock" type="number" name="stock" value="{{ old('stock', $product->stock) }}" />
        <x-admin.summernote label="Description" name="description" value="{!! old('description', $product->description) !!}" />
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </x-admin.form>

</x-admin.app>
