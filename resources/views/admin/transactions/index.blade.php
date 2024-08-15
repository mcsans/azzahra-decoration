@php use Illuminate\Support\Carbon; @endphp

<x-admin.app title="Azzahra Decoration - Transactions">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    </div>

    {{-- Alert --}}
    <x-admin.alert />

    {{-- Table --}}
    <x-admin.datatable>
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Kode Transaksi</th>
                <th>User</th>
                <th>Subtotal</th>
                <th>Diskon</th>
                <th>Total</th>
                <th>Status</th>
                {{-- <th>Created At</th> --}}
                <th width="9%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->transaction_code }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td align="right">Rp. {{ number_format($transaction->subtotal, 0, ',', '.') }},-</td>
                    <td align="right">Rp. {{ number_format($transaction->discount, 0, ',', '.') }},-</td>
                    <td align="right">Rp. {{ number_format($transaction->total, 0, ',', '.') }},-</td>
                    <td>{{ $transaction->payment_status }}</td>
                    {{-- <td>{{ Carbon::parse($transaction->created_at)->format('l, d/m/Y h:i A') }}</td> --}}
                    <td align="center">
                        <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="btn btn-sm btn-info btn-tooltip" data-toggle="tooltip" data-placement="left" title="Detail"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-admin.datatable>

</x-admin.app>
