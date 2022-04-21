<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use Illuminate\Support\Str;




class BrandController extends Controller
{
    public function getList(){
        $brands = Brand::all();
        // dd($brand);
        return view('dashboard.brand.list', compact('brands'));
    }


    public function getAdd(){
        // $brands = Brand::all();
        // dd($brand);
        return view('dashboard.brand.add');
    }

    public function postAdd(Request $request){
        // $tenkodau = Str::slug($request->txtName,'-');
        // echo $tenkodau;
        $this->validate($request,
            [
                'txtName' => 'required|min:3|max:100'
            ],
            [
                'txtName.required' => 'You have not entered data',
                'txtName.min' =>'Min: 3',
                'txtName.max' =>'Max: 100',
            ]);
        $brand = new Brand;
        $brand->name = $request->txtName;
        $brand->save();

        return redirect('dashboard/brand/add')->with('message', 'Add Brand Success !');

    }

    public function getEdit($id){
        // $brands = Brand::all();
        // dd($brand);
        $brand = Brand::find($id);

        // dd($brand);
        return view('dashboard.brand.edit', compact('brand'));
    }


    public function postEdit(Request $request,$id){
        // $brands = Brand::all();
        // dd($brand);
        $brand = Brand::find($id);
        $this->validate($request,
            [
                'txtName' => 'required|unique:brands,name|min:3|max:100'
            ],
            [
                'txtName.required' => 'You have not entered data',
                'txtName.unique' => 'Brand is have',
                'txtName.min' =>'Min: 3',
                'txtName.max' =>'Max: 100',
            ]);

        $brand->name = $request->txtName;
        $brand->save();
        return redirect('dashboard/brand/edit/'.$id)->with('message', 'Edit Brand Success !');

    }

    public function getDelete($id){
        // $brands = Brand::all();
        // dd($brand);
        $brand = Brand::find($id);
        $brand->delete();
        // dd($brand);
        return redirect('dashboard/brand/list')->with('message', 'Delete Brand Success !');
    }
}
