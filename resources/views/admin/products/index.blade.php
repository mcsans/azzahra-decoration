@php use Illuminate\Support\Carbon; @endphp

<x-admin.app title="Azzahra Decoration - Product">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
        <a href="{{ route('admin.master-data.products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>
    </div>

    {{-- Alert --}}
    <x-admin.alert />

    {{-- Table --}}
    <x-admin.datatable>
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                {{-- <th>Description</th> --}}
                <th>Pembaruan Terakhir</th>
                <th width="9%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $product->picture) }}" class="popup-image">
                            <img src="{{ asset('storage/' . $product->picture) }}" height="30" class="border border-secondary">
                        </a>
                    </td>
                    <td>{{ $product->categoryProduct->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rp. {{ number_format($product->price, 0, ',', '.') }},-</td>
                    <td>{{ number_format($product->stock, 0, ',', '.') }}</td>
                    {{-- <td>{!! Str::limit(strip_tags($product->description), 25) !!}</td> --}}
                    <td>{{ $product->updated_at->format('D, d/m/Y h:i A') }}</td>
                    <td>
                        <a href="{{ route('admin.master-data.products.show', $product->id) }}" class="btn btn-sm btn-info btn-tooltip" data-toggle="tooltip" data-placement="left" title="Detail"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.master-data.products.edit', $product->id) }}" class="btn btn-sm btn-success btn-tooltip" data-toggle="tooltip" data-placement="left" title="Ubah"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.master-data.products.destroy', $product->id) }}" method="POST" class="form-delete d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-tooltip" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-admin.datatable>

</x-admin.app>
