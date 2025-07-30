@extends('Admin.layouts.master-without-page-title')

@section('title')
    Dashboard
@endsection

@section('css')
@endsection

@section('content')
    <div class="container py-4">
        <h1 class="mb-4 fw-bold">📊 Thống kê hệ thống</h1>

        {{-- Bộ lọc --}}
        <form method="GET" action="{{ route('admin.dashboard') }}" class="row g-3 mb-4">
            <div class="col-md-3">
                <label class="form-label">Từ ngày</label>
                <input type="date" name="from" class="form-control" value="{{ request('from') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Đến ngày</label>
                <input type="date" name="to" class="form-control" value="{{ request('to') }}">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-success w-100">Lọc dữ liệu</button>
            </div>
        </form>

        {{-- Tổng quan --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6>💰 Doanh thu</h6>
                            <h4>{{ number_format($revenueByMonth->sum()) }} đ</h4>
                        </div>
                        <small class="invisible">Placeholder</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6>📦 Nhập hàng</h6>
                            <h4>{{ number_format($importByMonth->sum()) }} đ</h4>
                        </div>
                        <small class="invisible">Placeholder</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6>🧮 Lợi nhuận gộp</h6>
                            <h4>{{ number_format($revenueByMonth->sum() - $importByMonth->sum()) }} đ</h4>
                        </div>
                        <small class="invisible">Placeholder</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6>👥 Khách hàng</h6>
                            <h4>{{ $totalCustomers }}</h4>
                        </div>
                        <small class="text-white-50 mt-2 d-block">
                            @if(request()->filled('from') && request()->filled('to'))
                                Trong khoảng thời gian đã lọc
                            @else
                                Tổng số khách hàng toàn hệ thống
                            @endif
                        </small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tăng trưởng doanh thu --}}
        @if($growth !== null)
            <div class="alert alert-info">
                📈 Tăng trưởng doanh thu tháng này so với tháng trước:
                <strong class="{{ $growth >= 0 ? 'text-success' : 'text-danger' }}">{{ $growth }}%</strong>
            </div>
        @endif

        {{-- Biểu đồ --}}
        <div class="card mb-4">
            <div class="card-header bg-info text-white fw-semibold">📈 Doanh thu và nhập hàng</div>
            <div class="card-body"><canvas id="revenueChart" height="100"></canvas></div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white fw-semibold">💵 Lợi nhuận gộp theo tháng</div>
            <div class="card-body"><canvas id="profitChart" height="100"></canvas></div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-warning text-white fw-semibold">🏆 Top 10 khách hàng</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Đơn hàng</th>
                                        <th>Chi tiêu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topUsers as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->order_count }}</td>
                                            <td>{{ number_format($user->total_spent) }} đ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-secondary text-white fw-semibold">🧩 Doanh thu theo khách hàng</div>
                    <div class="card-body"><canvas id="barCustomerChart" height="100"></canvas></div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-info text-white fw-semibold">🔥 Sản phẩm bán chạy nhất</div>
                    <div class="card-body">
                        @if($bestSellingProducts->isEmpty())
                            <p class="text-muted mb-0">Không có dữ liệu bán hàng trong khoảng thời gian này.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach($bestSellingProducts as $index => $product)
                                    <li
                                        class="list-group-item position-relative d-flex align-items-center justify-content-between list-hover-item">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('storage/'.$product->image)}}"
                                                class="rounded border me-3" alt="{{ $product->name }}"
                                                style="width: 48px; height: 48px; object-fit: cover;">

                                            <div>
                                                <div class="fw-semibold mb-1">
                                                    @if($index === 0)
                                                        🥇
                                                    @elseif($index === 1)
                                                        🥈
                                                    @elseif($index === 2)
                                                        🥉
                                                    @endif
                                                    {{ $product->name }}    
                                                </div>
                                                <small class="text-muted">
                                                    Giá:
                                                    @if($product->variants->isNotEmpty())
                                                        {{ number_format($product->variants->first()->price) }} đ
                                                    @else
                                                        {{ number_format($product->price) }} đ
                                                    @endif
                                                </small>
                                            </div>
                                        </div>

                                        <span class="badge bg-primary fs-6">{{ $product->total_sold }} đã bán</span>

                                        {{-- <a href="{{ route('products.show', $product->id) }}" class="stretched-link"></a> --}}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const formatCurrency = value => value.toLocaleString('vi-VN') + ' đ';

        new Chart(document.getElementById('revenueChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($revenueByMonth->toArray())) !!},
                datasets: [
                    {
                        label: 'Doanh thu',
                        data: {!! json_encode(array_values($revenueByMonth->toArray())) !!},
                        borderColor: '#4e73df',
                        backgroundColor: 'rgba(78, 115, 223, 0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Nhập hàng',
                        data: {!! json_encode(array_values($importByMonth->toArray())) !!},
                        borderColor: '#1cc88a',
                        backgroundColor: 'rgba(28, 200, 138, 0.1)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                scales: {
                    y: { beginAtZero: true, ticks: { callback: formatCurrency } }
                }
            }
        });

        new Chart(document.getElementById('profitChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($profitByMonth->toArray())) !!},
                datasets: [{
                    label: 'Lợi nhuận',
                    data: {!! json_encode(array_values($profitByMonth->toArray())) !!},
                    borderColor: '#f6c23e',
                    backgroundColor: 'rgba(246, 194, 62, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true, ticks: { callback: formatCurrency } }
                }
            }
        });

        new Chart(document.getElementById('barCustomerChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($topUsers->pluck('name')) !!},
                datasets: [{
                    label: 'Doanh thu',
                    data: {!! json_encode($topUsers->pluck('total_spent')) !!},
                    backgroundColor: '#36b9cc'
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true, ticks: { callback: formatCurrency } }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection