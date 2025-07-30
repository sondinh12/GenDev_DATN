@extends('Admin.layouts.master-without-page-title')

@section('title', 'Xem chi tiết nguồn nhập hàng')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap">
                <h4 class="mb-0">Chi tiết đơn nhập #{{ $dtImport->id }}</h4>

                <div class="d-flex gap-2">
                    <form action="{{ route('admin.imports.updateStatus', $dtImport->id) }}" method="post"
                        class="d-flex align-items-center">
                        @csrf
                        @foreach ($dtImport->details as $i => $detail)
                            <input type="hidden" name="details[{{ $i }}][id]" value="{{ $detail->id }}">
                            <input type="hidden" name="details[{{ $i }}][product_id]" value="{{ $detail->product_id }}">
                            <input type="hidden" name="details[{{ $i }}][variant_id]" value="{{ $detail->variant_id }}">
                            <input type="hidden" name="details[{{ $i }}][quantity]" value="{{ $detail->quantity }}">
                            <input type="hidden" name="details[{{ $i }}][import_price]" value="{{ $detail->import_price }}">
                            <input type="hidden" name="details[{{ $i }}][product_temp_name]"
                                value="{{ $detail->product_temp_name }}">
                            <input type="hidden" name="details[{{ $i }}][variant_data]"
                                value="{{ json_encode($detail->variant_data) }}">
                        @endforeach

                        <select name="status" class="form-select me-2">
                            <option value="0" {{ $dtImport->status == 0 ? 'selected' : '' }}>Chưa xác nhận</option>
                            <option value="1" {{ $dtImport->status == 1 ? 'selected' : '' }}>Đã xác nhận</option>
                        </select>

                        @if($dtImport->status == 0)
                            <button type="submit" class="btn btn-info">Cập nhật</button>
                        @endif
                    </form>

                    <a href="{{ route('admin.imports.export', $dtImport->id) }}" class="btn btn-success">
                        📥 Xuất Excel
                    </a>
                </div>
            </div>

            <div class="card-body">

                {{-- Thông tin nhà cung cấp --}}
                <h5 class="mb-3">Thông tin đối tác</h5>
                <ul class="list-group mb-4">
                    <li class="list-group-item"><strong>Tên:</strong> {{ $dtImport->supplier->name }}</li>
                    <li class="list-group-item"><strong>Số điện thoại:</strong> {{ $dtImport->supplier->phone }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $dtImport->supplier->email }}</li>
                    <li class="list-group-item"><strong>Địa chỉ:</strong> {{ $dtImport->supplier->address }}</li>
                </ul>

                {{-- Tổng quan đơn nhập --}}
                <h5 class="mb-3">Tổng quan</h5>
                <div class="row mb-4">
                    <div class="col-md-6"><strong>Tổng hóa đơn:</strong> {{ number_format($dtImport->total_cost) }} VNĐ
                    </div>
                    <div class="col-md-6"><strong>Ngày nhập:</strong>
                        {{ \Carbon\Carbon::parse($dtImport->import_date)->format('d/m/Y') }}</div>
                    <div class="col-md-6"><strong>Ghi chú:</strong> {{ $dtImport->note ?? '---' }}</div>
                    <div class="col-md-6"><strong>Ngày tạo:</strong> {{ $dtImport->created_at->format('d/m/Y H:i') }}</div>
                    <div class="col-md-6"><strong>Ngày cập nhật:</strong> {{ $dtImport->updated_at->format('d/m/Y H:i') }}
                    </div>
                </div>

                {{-- Thông tin chi tiết sản phẩm --}}
                <h5 class="mb-3">Chi tiết sản phẩm đã nhập</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Biến thể</th>
                                <th>Số lượng</th>
                                <th>Giá nhập (ghi nhận)</th>
                                <th>Tổng phụ</th>
                                <th>Giá theo lịch sử nhà cung cấp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dtImport->details as $detail)
                                @php
                                    $productId = $detail->product_id;
                                    $importDate = $dtImport->import_date;
                                    // $variantData = json_decode($detail->variant_data, true);
                                    $variantData = $detail->variant_data;
                                    // dd($variantData);
                                    $matchedPrice = $dtImport->supplier->productPrices
                                        ->where('product_id', $productId)
                                        ->filter(function ($price) use ($importDate) {
                                            return $price->start_date <= $importDate &&
                                                (is_null($price->end_date) || $price->end_date >= $importDate);
                                        })
                                        ->sortByDesc('start_date')
                                        ->first();
                                @endphp
                                {{-- @if ($detail->product || $detail->variant) --}}
                                <tr>
                                    <td>{{ $detail->product->name ?? $detail->product_temp_name }}</td>
                                    <td>
                                        {{-- lấy biến thể từ bảng biến thể --}}
                                        @if($detail->variant && $detail->variant->variantAttributes->count())
                                            @foreach($detail->variant->variantAttributes as $attribute)
                                                <div>{{ $attribute->attribute->name ?? '' }}: {{ $attribute->value->value ?? '' }}</div>
                                            @endforeach
                                            {{-- lấy biến thể từ bảng import details --}}
                                        @elseif (is_array($variantData) && count($variantData))
                                            @foreach ($variantData as $item)
                                                <div>{{ $item['attribute'] ?? '' }}: {{ $item['value'] ?? '' }}</div>
                                            @endforeach
                                        @else
                                            <em class="text-muted">Không có</em>
                                        @endif
                                    </td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ number_format($detail->import_price) }} VNĐ</td>
                                    <td>{{ number_format($detail->subtotal) }} VNĐ</td>
                                    <td>
                                        @if ($matchedPrice)
                                            {{ number_format($matchedPrice->import_price) }} VNĐ <br>
                                            <small class="text-muted">Từ ngày
                                                {{ \Carbon\Carbon::parse($matchedPrice->start_date)->format('d/m/Y') }}</small>
                                        @else
                                            <em class="text-muted">Không có dữ liệu</em>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Tổng cộng</td>
                                <td colspan="3" class="fw-bold text-danger">{{ number_format($dtImport->total_cost) }} VNĐ
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <hr>
    <h4>Lịch sử cập nhật</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Thời gian</th>
                <th>Người cập nhật</th>
                <th>Thay đổi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
                @php
                    $changes = json_decode($log->changes, true);
                @endphp
                <tr>
                    <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $log->user->name ?? 'N/A' }}</td>
                    <td>
                        @if(isset($changes['import']))
                            <strong>Phiếu nhập:</strong>
                            <ul>
                                @foreach($changes['import'] as $change)
                                    <li>
                                        <strong>{{ ucfirst($change['field']) }}:</strong>
                                        từ <span class="text-danger">{{ $change['old'] ?? 'null' }}</span>
                                        thành <span class="text-success">{{ $change['new'] ?? 'null' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if(isset($changes['details']))
                            <strong>Chi tiết sản phẩm:</strong>
                            @foreach($changes['details'] as $detail)
                                <div class="mb-2">
                                    <em>ID chi tiết: {{ $detail['id'] }}</em>
                                    <ul>
                                        <li>
                                            @foreach(['field', 'old', 'new'] as $key)
                                                @continue(!isset($detail[$key]))
                                            @endforeach

                                            <strong>{{ ucfirst($detail['field']) }}:</strong>
                                            từ <span class="text-danger">{{ $detail['old'] ?? 'null' }}</span>
                                            thành <span class="text-success">{{ $detail['new'] ?? 'null' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Chưa có thay đổi nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('admin.imports.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection