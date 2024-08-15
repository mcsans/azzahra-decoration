<x-admin.app title="Azzahra Decoration - Promotions">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Promosi</h1>
        <a href="{{ route('admin.master-data.promotions.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Kembali ke Tabel
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form>
        <x-admin.text-detail label="Kode" value="{{ $promotion->code }}" />
        <x-admin.text-detail label="Nama" value="{{ $promotion->name }}" />
        <x-admin.text-detail label="Tipe" value="{{ $promotion->type }} {{ $promotion->type == 'FIXED' ? '(Rp)' : '(%)' }}" />
        @if ($promotion->type == 'FIXED')
            <x-admin.text-detail label="Diskon" value="Rp. {{ number_format($promotion->discount, 0, ',', '.') }},-" />
        @else
            <x-admin.text-detail label="Diskon" value="{{ $promotion->discount }}%" />
        @endif
    </x-admin.form>

</x-admin.app>
