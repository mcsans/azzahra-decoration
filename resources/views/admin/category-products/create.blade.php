<x-admin.app title="Azzahra Decoration - Category Product">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kategori Produk</h1>
        <a href="{{ route('admin.master-data.category-products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Kembali ke Tabel
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form action="{{ route('admin.master-data.category-products.store') }}" method="POST">
        @csrf

        <x-admin.input label="Nama" type="text" name="name" value="{{ old('name') }}" />
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
    </x-admin.form>

</x-admin.app>
