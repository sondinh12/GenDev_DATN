<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Check if the user has purchased the product in a completed or shipped order
        $canReview = OrderDetail::whereHas('order', function ($q) {
            $q->where('user_id', Auth::id())
              ->whereIn('status', ['completed', 'shipped']);
        })->where('product_id', $productId)->exists();

        if (!$canReview) {
            return redirect()->back()->with('error', 'Bạn chỉ có thể đánh giá sản phẩm từ đơn hàng đã giao hoặc hoàn thành.');
        }

        // Check if the user has already reviewed this product
        $existingReview = ProductReview::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->exists();

        if ($existingReview) {
            return redirect()->back()->with('error', 'Bạn đã đánh giá sản phẩm này rồi.');
        }

        ProductReview::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'rating' => $request->rating ?? null, // Allow null rating for product show page
            'comment' => $request->comment,
            // 'status' => 'approved',
        ]);

        return redirect()->back()->with('success', 'Bình luận của bạn đã được ghi nhận!');
    }
}