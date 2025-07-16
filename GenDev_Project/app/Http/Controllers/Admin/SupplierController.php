<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view('Admin.suppliers.index',compact('suppliers')); 
    }

    public function create(){
        return view('Admin.suppliers.create');
    }

    public function store(Request $request){

    }

    public function edit(string $id){
        return view('Admin.suppliers.edit');
    }

    public function update(Request $request){

    }

    public function destroy(){

    }
}
