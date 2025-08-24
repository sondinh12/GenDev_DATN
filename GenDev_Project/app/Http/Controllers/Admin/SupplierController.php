<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request){
        // $suppliers = Supplier::all();
        // return view('Admin.suppliers.index',compact('suppliers')); 
        $query = Supplier::query();

    // Nếu có từ khóa tìm kiếm
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', "%$keyword%");
        }

        $suppliers = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('Admin.suppliers.index', compact('suppliers'));
    }

    public function create(){
        return view('Admin.suppliers.create');
    }

    public function store(SupplierRequest $request){
        Supplier::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);
        return redirect()->route('admin.suppliers.index')->with('success','Thêm mới thành công');
    }

    public function edit(string $id){
        $supplier = Supplier::findOrFail($id);
        return view('Admin.suppliers.edit',compact('supplier'));
    }

    public function update(SupplierRequest $request,$id){
        $supplier = Supplier::findOrFail($id);

        $supplier->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);
        return redirect()->route('admin.suppliers.index')->with('success','Sửa thành công');

    }

    public function destroy($id){
        $supplier = Supplier::findOrFail($id);
        $hasImports = $supplier->imports()->exists();
        $hasPrices = $supplier->productPrices()->exists();

        if($hasImports || $hasPrices){
            return redirect()->back()->with('error','Không thể xóa vì đã có đơn hàng từ nhà cung cấp này!');
        }

        $supplier->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }   
}
