<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserFirstViolationNotice;
use App\Mail\UserTemporaryBanNotice;
use App\Models\ProductQuestion;

class ReviewController extends Controller
{   
    // Bỏ middleware cứng, quyền sẽ kiểm soát qua middleware permission ở routes/web.php

    public function index(Request $request){
        $questions = ProductQuestion::with(['user', 'product'])
        ->when($request->search, function ($query, $search) {
        $query->where(function ($q) use ($search) {
            $q->where('question', 'like', "%{$search}%")
              ->orWhereHas('user', fn($u) => $u->where('name', 'like', "%{$search}%"))
              ->orWhereHas('product', fn($p) => $p->where('name', 'like', "%{$search}%"));
        });
    })
    ->latest()
    ->paginate(10);
        return view('admin.reviews.index',compact('questions'));
    }

    public function show(ProductQuestion $question){
        $question->load('user','product');
        return view('admin.reviews.show',compact('question'));
    }

    public function handleViolation(ProductQuestion $question){
        $user = $question->user;

        // dd($user);
        // 1. Ẩn đánh giá
        $question->status = 'rejected';
        $question->save();


        // 2. Tăng số lần vi phạm
        $user->violation_count++;

        // 3. Cảnh báo lần 1
        if ($user->violation_count === 1) {
            Mail::to($user->email)->send(new UserFirstViolationNotice($user));
        }

        // 4. Ban tạm thời lần 2
        if ($user->violation_count === 2) {
            $user->is_banned = true;
            $user->banned_until = now()->addMinutes(3);
            Mail::to($user->email)->send(new UserTemporaryBanNotice($user));
        }

        $user->save();

        return back()->with('success', 'Đã xử lý vi phạm.');
    }
}
