<x-admin.app title="Azzahra Decoration - Promotions">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Promotion</h1>
        <a href="{{ route('admin.master-data.promotions.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Back to Datatable
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form>
        <x-admin.text-detail label="code" value="{{ $promotion->code }}" />
        <x-admin.text-detail label="Name" value="{{ $promotion->name }}" />
        <x-admin.text-detail label="type" value="{{ $promotion->type }} {{ $promotion->type == 'FIXED' ? '(Rp)' : '(%)' }}" />
        @if ($promotion->type == 'FIXED')
            <x-admin.text-detail label="value" value="Rp. {{ number_format($promotion->discount, 0, ',', '.') }},-" />
        @else
            <x-admin.text-detail label="value" value="{{ $promotion->discount }}%" />
        @endif
    </x-admin.form>

</x-admin.app>
