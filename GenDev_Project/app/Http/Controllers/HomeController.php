<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryMini;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoriesMini = CategoryMini::all();
        dd($categoriesMini); // Thêm dòng này để kiểm tra dữ liệu
        return view('client.pages.home', compact('categoriesMini'));
    }
}
