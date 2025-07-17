<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserFirstViolationNotice;
use App\Mail\UserTemporaryBanNotice;

class ReviewController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth', 'check_ban']);
    }

    public function index(){
        $reviews = ProductReview::with('user','product')->latest()->paginate(10);
        return view('admin.reviews.index',compact('reviews'));
    }

    public function show(ProductReview $review){
        $review->load('user','product');
        return view('admin.reviews.show',compact('review'));
    }

    public function handleViolation(ProductReview $review){
        $user = $review->user;

        // 1. Ẩn đánh giá
        $review->status = 'rejected';
        $review->save();

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
