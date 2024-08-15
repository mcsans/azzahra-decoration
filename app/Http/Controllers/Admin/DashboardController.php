<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Data Umum
        $transaction = Transaction::where('payment_status', 'PAID')->count();
        $subtotal = Transaction::where('payment_status', 'PAID')->sum('subtotal');
        $discount = Transaction::where('payment_status', 'PAID')->sum('discount');
        $total = Transaction::where('payment_status', 'PAID')->sum('total');

        $data['totalUsers'] = User::whereNotIn('role_id', [1])->count();
        $data['totalPromotions'] = Promotion::count();
        $data['totalEvents'] = Product::count();
        $data['totalTransactions'] = $transaction;

        $data['grossSales'] = $subtotal;
        $data['discounts'] = $discount;
        $data['netSales'] = $total;

        if ($total > 0 && $transaction > 0) {
            $data['average'] = $total / $transaction;
        } else {
            $data['average'] = 0;
        }

        // Data pendapatan mingguan
        $today = Carbon::today();
        $lastWeek = $today->copy()->subDays(6);

        $transactionsLastWeek = Transaction::where('payment_status', 'PAID')
            ->whereBetween('date', [$lastWeek, $today])
            ->get();

        $weeklyRevenue = [];
        $labels = [];

        for ($date = $lastWeek; $date->lte($today); $date->addDay()) {
            $labels[] = $date->formatLocalized('%A, %d %B %Y');
            $dailyTotal = $transactionsLastWeek->where('date', $date->format('Y-m-d'))->sum('total');
            $weeklyRevenue[] = $dailyTotal;
        }

        $data['weeklyLabels'] = $labels;
        $data['weeklyRevenue'] = $weeklyRevenue;

        return view('admin.dashboard.index', $data);
    }
}
