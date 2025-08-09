<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();

        // Lấy banner đang sử dụng, nếu không có thì lấy banner mới nhất
        $banner = Banner::where('status', 'using')->first();
        if (!$banner) {
            $banner = Banner::latest()->first();
        }

        return view('client.pages.home', compact('categories', 'banner'));
    }
}
