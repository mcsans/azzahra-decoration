<x-admin.app title="Azzahra Decoration - Dashboard">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    {{-- Alert --}}
    <x-admin.alert />

    <!-- Content Row -->
    <div class="row">

        <x-admin.dashboard-card title="User" value="{{ $totalUsers }}" icon="fas fa-users" />
        <x-admin.dashboard-card title="Produk" value="{{ $totalEvents }}" icon="fas fa-calendar" />
        <x-admin.dashboard-card title="Kode Promosi" value="{{ $totalPromotions }}" icon="fas fa-tags" />
        <x-admin.dashboard-card title="Transaksi" value="{{ $totalTransactions }}" icon="fas fa-exchange-alt" />

        <x-admin.dashboard-card title="Penjualan Bruto" value="Rp. {{ number_format($grossSales, 0, ',', '.') }},-" icon="fas fa-dollar-sign" />
        <x-admin.dashboard-card title="Diskon" value="Rp. {{ number_format($discounts, 0, ',', '.') }},-" icon="fas fa-dollar-sign" />
        <x-admin.dashboard-card title="Penjualan Neto" value="Rp. {{ number_format($netSales, 0, ',', '.') }},-" icon="fas fa-dollar-sign" />
        <x-admin.dashboard-card title="Rata-Rata" value="Rp. {{ number_format($average, 0, ',', '.') }},-" icon="fas fa-dollar-sign" />


        <x-admin.dashboard-chart />

    </div>

    <script>
        window.chartData = {
            labels: @json($weeklyLabels),
            data: @json($weeklyRevenue)
        };
    </script>

</x-admin.app>
