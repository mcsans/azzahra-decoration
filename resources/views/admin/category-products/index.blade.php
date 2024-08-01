<x-admin.app title="Azzahra Decoration - Category Product">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category Products</h1>
        <a href="{{ route('admin.master-data.category-products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Add Data
        </a>
    </div>

    {{-- Alert --}}
    <x-admin.alert />

    {{-- Table --}}
    <x-admin.datatable>
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Name</th>
                <th>Last Update</th>
                <th width="9%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoryProducts as $categoryProduct)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $categoryProduct->name }}</td>
                    <td>{{ $categoryProduct->updated_at->format('D, d/m/Y h:i A') }}</td>
                    <td>
                        <a href="{{ route('admin.master-data.category-products.show', $categoryProduct->id) }}" class="btn btn-sm btn-info btn-tooltip" data-toggle="tooltip" data-placement="left" title="Detail"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.master-data.category-products.edit', $categoryProduct->id) }}" class="btn btn-sm btn-success btn-tooltip" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.master-data.category-products.destroy', $categoryProduct->id) }}" method="POST" class="form-delete d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-tooltip" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-admin.datatable>

</x-admin.app>
