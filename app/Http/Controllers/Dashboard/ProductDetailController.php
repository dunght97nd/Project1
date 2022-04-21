<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductDetail;


class ProductDetailController extends Controller
{
    public function getList(){
        $productDetails = ProductDetail::orderBy('id','DESC')->get();
        // dd($productCategory);
        return view('dashboard.productDetail.list', compact('productDetails'));
    }

    public function getAdd(){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        // $brands = Brand::all();
        // $productCategories = ProductCategory::all();
        $products = Product::all();
        $productDetails = ProductDetail::all();
        
        return view('dashboard.productDetail.add', compact('products','productDetails'));
    }

    public function postAdd(Request $request){
        // $tenkodau = Str::slug($request->txtName,'-');
        // echo $tenkodau;
        // dd($request->all());
        $productDetails = ProductDetail::all();
        // dd($productDetails);
        $productDetailNew = $request->product.$request->color.$request->size;
        // dd($productDetailNew);
        // echo $productDetailNew ."<br>";
        foreach($productDetails as $productDetail){
            $productDetailOld = $productDetail->product_id.$productDetail->color.$productDetail->size;
            
            // echo $productDetailOld."<br>";
            if($productDetailNew !== $productDetailOld){
                $this->validate($request,
                [
                    
                    'product' => 'required',
                    'color' => 'required',
                    'size' => 'required',
                    'txtQty' => 'required',
                ],
                [ 
                    'product.required' => 'You have not entered data',
                    'txtWeight.required' => 'You have not entered data',
                    'txtSku.required' => 'You have not entered data',
                    'txtTag.required' => 'You have not entered data',

                ]);
                $productDetail = new ProductDetail;
                $productDetail->product_id = $request->product;
                $productDetail->color = $request->color;
                $productDetail->size = $request->size;
                $productDetail->qty = (int)$request->txtQty;

                $productDetail->save();

                return redirect('dashboard/productDetail/add')->with('success', 'Add Product Details Success !');
            }
            else{
                return redirect('dashboard/productDetail/add')->with('error', 'Add Product Details Error , Product Details is have !');
            }
        }
    }
    public function getEdit($id){
        $products = Product::all();
        // $productCategory = ProductCategory::all();
        // dd($brand);
        $productDetail = ProductDetail::find($id);

        // dd($productCategory);
        return view('dashboard.productDetail.edit', compact('products','productDetail'));
    }
    public function postEdit(Request $request,$id){
        // dd($request->all());
        $productDetail = ProductDetail::find($id);
        // dd($productDetails);
        $productDetailNew = $request->product.$request->color.$request->size;
        // dd($productDetailNew);
        // foreach($productDetails as $productDetail){
        //     if($productDetailNew == $productDetail){
                $this->validate($request,
                [
                    
                    'product' => 'required',
                    'color' => 'required',
                    'size' => 'required',
                    'txtQty' => 'required',
                ],
                [ 
                    'product.required' => 'You have not entered data',
                    'txtWeight.required' => 'You have not entered data',
                    'txtSku.required' => 'You have not entered data',
                    'txtTag.required' => 'You have not entered data',

                ]);
                $productDetail->product_id = $request->product;
                $productDetail->color = $request->color;
                $productDetail->size = $request->size;
                $productDetail->qty = (int)$request->txtQty;

                $productDetail->save();

                return redirect('dashboard/productDetail/edit/'.$id)->with('success', 'Edit Product Details Success !');
            // }
            // else{
            //     return redirect('dashboard/productDetail/Edit/'.$id)->with('error', 'Edit/ .$idProduct Details Error , Product Details is have !');
            // }
        // }
    }

    public function getDelete($id){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $productDetail = ProductDetail::find($id);
        $productDetail->delete();
        // dd($productCategory);
        return redirect('dashboard/productDetail/list')->with('success', 'Delete Product Category Success !');
    }
}
