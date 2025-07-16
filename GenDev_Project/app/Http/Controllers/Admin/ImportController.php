<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Import;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index(){
        $imports = Import::with('supplier')->orderBy('created_at','desc')->paginate(10);
        return view('Admin.imports.index',compact('imports')); 
    }

    public function create(){
        return view('Admin.imports.create');
    }

    public function store(Request $request){

    }

    public function show(string $id){
        $dtImport = Import::with([
            'supplier',
            'details',
            'details.product',
            'supplier.productPrices'
        ])->where('id',$id)->first();
        return view('Admin.imports.show',compact('dtImport'));
    }

    public function edit(string $id){
        return view('Admin.imports.edit');
    }

    public function update(Request $request){

    }

    public function destroy(){

    }
}
