@php use Illuminate\Support\Carbon; @endphp

<x-admin.app title="Depublic - Transactions">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaction</h1>
        <a href="{{ route('admin.transactions.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-{{ config('app.bg_color') }} shadow-sm">
            <i class="fas fa-fw fa-arrow-left fa-sm text-white-50"></i> Back to Transactions
        </a>
    </div>

    {{-- Form --}}
    <x-admin.form>
        <x-admin.text-detail label="Date" value="{{ $transaction->created_at->format('l, d/m/Y h:i A') }}" />
        <x-admin.text-detail label="Transaction Code" value="{{ $transaction->transaction_code }}" />
        <x-admin.text-detail label="User" value="{{ $transaction->user->name }}" />
        <x-admin.text-detail label="Promotion Code" value="{{ $transaction->promotion->code ?? 'Not Using Voucher' }}" />
        <x-admin.text-detail label="Date" value="{{ Carbon::parse($transaction->date)->format('l, d/m/Y') }}" />
        <x-admin.text-detail label="Contact First Name" value="{{ $transaction->contact_first_name }}" />
        <x-admin.text-detail label="Contact Last Name" value="{{ $transaction->contact_last_name }}" />
        <x-admin.text-detail label="Contact Email" value="{{ $transaction->contact_email }}" />
        <x-admin.text-detail label="Contact Phone" value="{{ $transaction->contact_phone }}" />
        <x-admin.text-detail label="Delivery Address" value="{{ $transaction->delivery_address }}" />
        <x-admin.text-detail label="Delivery Date" value="{{ Carbon::parse($transaction->delivery_date)->format('l, d/m/Y') }}" />
        <x-admin.text-detail label="Delivery Time" value="{{ $transaction->delivery_time }}" />
        <x-admin.text-detail label="Subtotal" value="Rp. {{ number_format($transaction->subtotal, 0, ',', '.') }},-" />
        <x-admin.text-detail label="Discount" value="Rp. {{ number_format($transaction->discount, 0, ',', '.') }},-" />
        <x-admin.text-detail label="Total" value="Rp. {{ number_format($transaction->total, 0, ',', '.') }},-" />
        <x-admin.text-detail label="Payment Status" value="{{ $transaction->payment_status }}" />
    </x-admin.form>

</x-admin.app>
