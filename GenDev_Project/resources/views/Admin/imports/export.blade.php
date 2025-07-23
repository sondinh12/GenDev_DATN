<table>
    <tr>
        <td colspan="5"><strong>THÔNG TIN PHIẾU NHẬP</strong></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Mã phiếu:</strong></td>
        <td colspan="3">#{{ $import->id }}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Ngày nhập:</strong></td>
        <td colspan="3">{{ \Carbon\Carbon::parse($import->import_date)->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Ghi chú:</strong></td>
        <td colspan="3">{{ $import->note ?? '---' }}</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <td colspan="5"><strong>THÔNG TIN NHÀ CUNG CẤP</strong></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Tên:</strong></td>
        <td colspan="3">{{ $import->supplier->name }}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Số điện thoại:</strong></td>
        <td colspan="3">{{ $import->supplier->phone }}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Email:</strong></td>
        <td colspan="3">{{ $import->supplier->email }}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Địa chỉ:</strong></td>
        <td colspan="3">{{ $import->supplier->address }}</td>
    </tr>
</table>

<br><br>

<table>
    <thead>
        <tr>
            <th><strong>Sản phẩm</strong></th>
            <th><strong>Biến thể</strong></th>
            <th><strong>Số lượng</strong></th>
            <th><strong>Giá nhập (ghi nhận)</strong></th>
            <th><strong>Tổng phụ</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach($import->details as $detail)
            @php
                $variantData = $detail->variant_data;
            @endphp
            <tr>
                {{-- Tên sản phẩm --}}
                <td>{{ $detail->product->name ?? $detail->product_temp_name }}</td>

                {{-- Biến thể --}}
                <td>
                    @if($detail->variant && $detail->variant->variantAttributes->count())
                        @foreach($detail->variant->variantAttributes as $attribute)
                            {{ $attribute->attribute->name ?? '' }}: {{ $attribute->value->value ?? '' }}@if (!$loop->last), @endif
                        @endforeach
                    @elseif (is_array($variantData) && count($variantData))
                        @foreach ($variantData as $item)
                            {{ $item['attribute'] ?? '' }}: {{ $item['value'] ?? '' }}@if (!$loop->last), @endif
                        @endforeach
                    @else
                        Không có
                    @endif
                </td>

                {{-- Số lượng, Giá, Tổng phụ --}}
                <td>{{ $detail->quantity }}</td>
                <td>{{ number_format($detail->import_price, 0, ',', '.') }} VNĐ</td>
                <td>{{ number_format($detail->subtotal, 0, ',', '.') }} VNĐ</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"><strong>Tổng cộng:</strong></td>
            <td><strong>{{ number_format($import->total_cost, 0, ',', '.') }} VNĐ</strong></td>
        </tr>
    </tfoot>
</table>
