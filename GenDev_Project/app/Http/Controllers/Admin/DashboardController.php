<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
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

        // Doanh thu theo tháng (chỉ lấy orders hoàn thành)
        $revenueByMonthRaw = Order::whereBetween('created_at', [$from, $to])
            ->where('status', 'completed')
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(total) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');
        $revenueByMonth = $months->merge($revenueByMonthRaw);

        // Nhập hàng theo tháng (chỉ lấy imports đã duyệt)
        $importByMonthRaw = Import::whereBetween('created_at', [$from, $to])
            ->where('status', 1)
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
        $topUsers = User::withCount([
            'orders' => function ($q) use ($from, $to) {
                $q->where('status', 'completed')->whereBetween('created_at', [$from, $to]);
            }
        ])
            ->withSum([
                'orders' => function ($q) use ($from, $to) {
                    $q->where('status', 'completed')->whereBetween('created_at', [$from, $to]);
                }
            ], 'total')
            ->orderByDesc('orders_sum_total')
            ->limit(10)
            ->get()
            ->map(function ($user) {
                return (object) [
                    'name' => $user->name,
                    'email' => $user->email,
                    'total_spent' => $user->orders_sum_total,
                    'order_count' => $user->orders_count
                ];
            });

        // Tổng khách hàng (có điều kiện lọc theo thời gian nếu có)
        if (request()->filled('from') && request()->filled('to')) {
            $totalCustomers = User::whereBetween('created_at', [$from, $to])->count();
        } else {
            $totalCustomers = User::count();
        }

        // Sản phẩm bán chạy nhất
        $bestSellingProducts = Product::with('variants') // lấy dữ liệu variant
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->whereBetween('orders.created_at', [$from, $to])
            ->where('orders.status', 'completed')
            ->select('products.id', 'products.name')
            ->selectRaw('SUM(order_details.quantity) as total_sold')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->limit(10)
            ->get();

        return view('Admin.index', compact(
            'from',
            'to',
            'revenueByMonth',
            'importByMonth',
            'profitByMonth',
            'topUsers',
            'growth',
            'totalCustomers',
            'bestSellingProducts'
        ));
    }
}
