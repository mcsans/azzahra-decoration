<x-admin.app title="Azzahra Decoration - Product">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Produk</h1>
        <a href="{{ route('admin.master-data.products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Kembali ke Tabel
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form action="{{ route('admin.master-data.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-admin.input label="Gambar" type="file" name="picture" />
        <x-admin.select label="Kategori Produk" name="category_product_id" value="{{ old('category_product_id') }}">
            @foreach ($categoryProducts as $categoryProduct)
                <option value="{{ $categoryProduct->id }}" {{ old('category_product_id') == $categoryProduct->id ? 'selected' : '' }}>
                    {{ $categoryProduct->name }}
                </option>
            @endforeach
        </x-admin.select>
        <x-admin.input label="Nama" type="text" name="name" value="{{ old('name') }}" />
        <x-admin.input label="Harga" type="number" name="price" value="{{ old('price') }}" />
        <x-admin.input label="Stok" type="number" name="stock" value="{{ old('stock') }}" />
        <x-admin.summernote label="Deskripsi" name="description" value="{!! old('description') !!}" />
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
    </x-admin.form>

</x-admin.app>
