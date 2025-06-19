<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Ship;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        $ships = Ship::all();
        return view('client.checkout.checkout',compact('ships'));
    }

    public function store(CheckoutRequest $request ){
        
        return redirect('/home');
    }
}
