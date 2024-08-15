<x-admin.app title="Azzahra Decoration - Product">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Produk</h1>
        <a href="{{ route('admin.master-data.products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Kembali ke Tabel
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form>
        <div class="form-group mb-4">
            <label>Gambar :</label>
            <a href="{{ asset('storage/' . $product->picture) }}" class="popup-image">
                <img src="{{ asset('storage/' . $product->picture) }}" width="100" class="d-block border">
            </a>
        </div>

        <x-admin.text-detail label="Kategori Produk" value="{{ $product->categoryProduct->name }}" />
        <x-admin.text-detail label="Nama" value="{{ $product->name }}" />
        <x-admin.text-detail label="Harga" value="Rp. {{ number_format($product->price, 0, ',', '.') }},-" />
        <x-admin.text-detail label="Stok" value="{{ number_format($product->stock, 0, ',', '.') }}" />
        <x-admin.text-detail label="Deskripsi" value="{!! $product->description !!}" />
    </x-admin.form>

</x-admin.app>
