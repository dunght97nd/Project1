<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use Illuminate\Support\Str;


class ProductCategoryController extends Controller
{
    public function getList(){
        $productCategories = ProductCategory::all();
        // dd($productCategory);
        return view('dashboard.productCategory.list', compact('productCategories'));
    }


    public function getAdd(){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        return view('dashboard.productCategory.add');
    }

    public function postAdd(Request $request){
        // $tenkodau = Str::slug($request->txtName,'-');
        // echo $tenkodau;
        $this->validate($request,
            [
                'txtName' => 'required|unique:product_categories,name|min:3|max:100'
            ],
            [
                'txtName.required' => 'You have not entered data',
                'txtName.unique' => 'Product Category is have',
                'txtName.min' =>'Min: 3',
                'txtName.max' =>'Max: 100',
            ]);
        $productCategory = new ProductCategory;
        $productCategory->name = $request->txtName;
        if ($request->hasFile('fImages')){
            $file = $request->file('fImages');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' &&  $duoi !='PNG'){
                return redirect('dashboard/productCategory/add')->with('message', 'Add Product Category Error !');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_". $name;
            echo($hinh);
            while (file_exists("front/img/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("front/img/",$hinh);
            $productCategory->img = $hinh;
        }
        else{
            $productCategory->img = "";
        }

        // dd($request->all());
        $productCategory->save();

        return redirect('dashboard/productCategory/add')->with('message', 'Add Product Category Success !');

    }

    public function getEdit($id){
        // $productCategory = ProductCategory::all();
        // dd($brand);
        $productCategory = ProductCategory::find($id);

        // dd($productCategory);
        return view('dashboard.productCategory.edit', compact('productCategory'));
    }


    public function postEdit(Request $request,$id){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $productCategory = ProductCategory::find($id);
        $this->validate($request,
            [
                'txtName' => 'required|unique:product_categories,name|min:3|max:100'
            ],
            [
                'txtName.required' => 'You have not entered data',
                'txtName.unique' => 'Product Category is have',
                'txtName.min' =>'Min: 3',
                'txtName.max' =>'Max: 100',
            ]);

        $productCategory->name = $request->txtName;
        if ($request->hasFile('fImages')){
            $file = $request->file('fImages');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' &&  $duoi !='PNG' &&  $duoi !='pdf'){
                return redirect('dashboard/productCategory/add')->with('message', 'Add Product Category Error !');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_". $name;
            echo($hinh);
            while (file_exists("front/img/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("front/img/",$hinh);
            unlink("front/img/".$productCategory->img);
            $productCategory->img = $hinh;
        }

        // dd($request->all());
        $productCategory->save();

        return redirect('dashboard/productCategory/edit/'.$id)->with('message', 'Add Product Category Success !');

    }

    public function getDelete($id){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();
        // dd($productCategory);
        return redirect('dashboard/productCategory/list')->with('message', 'Delete Product Category Success !');
    }
}
