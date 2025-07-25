<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Models\Order;
use App\Models\User;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $from = request('from') ? Carbon::parse(request('from'))->startOfDay() : now()->subMonths(3)->startOfMonth();
        $to = request('to') ? Carbon::parse(request('to'))->endOfDay() : now()->endOfDay();

        // Danh sách tháng để gộp dữ liệu
        $period = CarbonPeriod::create($from->copy()->startOfMonth(), '1 month', $to->copy()->startOfMonth());
        $months = collect();
        foreach ($period as $month) {
            $months->put($month->format('Y-m'), 0);
        }

        // Doanh thu theo tháng
        $revenueByMonthRaw = Order::whereBetween('created_at', [$from, $to])
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(total) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');
        $revenueByMonth = $months->merge($revenueByMonthRaw);

        // Nhập hàng theo tháng
        $importByMonthRaw = Import::whereBetween('created_at', [$from, $to])
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(total_cost) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');
        $importByMonth = $months->merge($importByMonthRaw);

        // Lợi nhuận gộp theo tháng
        $profitByMonth = $revenueByMonth->map(function ($value, $key) use ($importByMonth) {
            return $value - ($importByMonth[$key] ?? 0);
        });

        // Tính tăng trưởng doanh thu tháng này so với tháng trước
        $revenueValues = array_values($revenueByMonth->toArray());
        $last = end($revenueValues);
        $prev = count($revenueValues) >= 2 ? $revenueValues[count($revenueValues) - 2] : null;
        $growth = ($prev && $last) ? round((($last - $prev) / $prev) * 100, 2) : null;

        // Top khách hàng
        $topUsers = User::select('users.name')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->whereBetween('orders.created_at', [$from, $to])
            ->selectRaw('SUM(orders.total) as total_spent')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_spent')
            ->limit(10)
            ->get();

            if (request()->filled('from') && request()->filled('to')) {
    $totalCustomers = User::whereBetween('created_at', [$from, $to])->count();
} else {
    // Không chọn gì → hiển thị toàn bộ user
    $totalCustomers = User::count();
}

        return view('Admin.index', compact(
            'from', 'to',
            'revenueByMonth',
            'importByMonth',
            'profitByMonth',
            'topUsers',
            'growth',
            'totalCustomers'
        ));
    }
}
