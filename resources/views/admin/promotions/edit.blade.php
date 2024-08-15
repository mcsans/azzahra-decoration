<x-admin.app title="Azzahra Decoration - Promotions">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Promosi</h1>
        <a href="{{ route('admin.master-data.promotions.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Kembali ke Tabel
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form action="{{ route('admin.master-data.promotions.update', $promotion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <x-admin.input label="Kode" type="text" name="code" value="{{ old('code', $promotion->code) }}" />
        <x-admin.input label="Nama" type="text" name="name" value="{{ old('name', $promotion->name) }}" />
        <x-admin.select label="Tipe" name="type" value="{{ old('type', $promotion->type) }}">
            <option value="FIXED" {{ old('type', $promotion->type) == 'FIXED' ? 'selected' : '' }}>FIXED (Rp)</option>
            <option value="PERCENT" {{ old('type', $promotion->type) == 'PERCENT' ? 'selected' : '' }}>PERCENT (%)</option>
        </x-admin.select>
        <x-admin.input label="Diskon" type="number" name="discount" value="{{ old('discount', $promotion->discount) }}" step="0.01" />
        <button type="submit" class="btn btn-primary btn-block">Ubah</button>
    </x-admin.form>

</x-admin.app>
