<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Support\Str;


class ProductImageController extends Controller
{
    public function getList(){
        $productImages = ProductImage::orderBy('id','DESC')->get();
        // dd($productCategory);
        return view('dashboard.productImage.list', compact('productImages'));
    }

    public function getAdd(){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        // $brands = Brand::all();
        // $productCategories = ProductCategory::all();
        $products = Product::all();
        $productImages = ProductImage::all();
        
        return view('dashboard.productImage.add', compact('products','productImages'));
    }
    public function postAdd(Request $request){
        // $tenkodau = Str::slug($request->txtName,'-');
        // echo $tenkodau;
        $this->validate($request,
            [
                'product' => 'required',
            ],
            [
                'product.required' => 'You have not entered data',
            ]);
        $productImage = new ProductImage;
        $productImage->product_id = $request->product;

        if ($request->hasFile('fImages')){
            $file = $request->file('fImages');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' &&  $duoi !='PNG'){
                return redirect('dashboard/productImage/add')->with('message', 'Add Product Image Error !');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_". $name;
            // echo($hinh);
            while (file_exists("front/img/products".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("front/img/products",$hinh);
            $productImage->path = $hinh;
        }
        else{
            $productImage->path = "";
        }

        // dd($request->all());
        $productImage->save();

        return redirect('dashboard/productImage/add')->with('message', 'Add Product Image Success !');
    }

    public function getEdit($id){
        $products = Product::all();
        $productImage = ProductImage::find($id);

        // dd($productImage);
        return view('dashboard.productImage.edit', compact('productImage','products'));
    }

    public function postEdit(Request $request, $id){
        // $tenkodau = Str::slug($request->txtName,'-');
        // echo $tenkodau;
        $productImage = ProductImage::find($id);
        $this->validate($request,
            [
                'product' => 'required',
            ],
            [
                'product.required' => 'You have not entered data',
            ]);

        $productImage->product_id = $request->product;

        if ($request->hasFile('fImages')){
            $file = $request->file('fImages');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' &&  $duoi !='PNG'){
                return redirect('dashboard/productImage/add')->with('message', 'Edit Product Image Error !');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_". $name;
            // echo($hinh);
            while (file_exists("front/img/products".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("front/img/products",$hinh);
            $productImage->path = $hinh;
        }
        else{
            $productImage->path = "";
        }

        // dd($request->all());
        $productImage->save();

        return redirect('dashboard/productImage/edit/'.$id)->with('message', 'Edit Product Image Success !');
    }
}
