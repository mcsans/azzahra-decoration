<x-admin.app title="Azzahra Decoration - Category Product">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Category Product</h1>
        <a href="{{ route('admin.master-data.category-products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Back to Datatable
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form>
        <x-admin.text-detail label="Name" value="{{ $categoryProduct->name }}" />
    </x-admin.form>

</x-admin.app>
