<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\productImage;


use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\ProductComment;


class ProductController extends Controller
{
    public function getList(){
        $products = Product::orderBy('id','DESC')->get();
        // dd($productCategory);
        return view('dashboard.product.list', compact('products'));
    }

    public function getAdd(){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $brands = Brand::all();
        $productCategories = ProductCategory::all();

        return view('dashboard.product.add', compact('brands','productCategories'));
    }

    public function postAdd(Request $request){
        // $tenkodau = Str::slug($request->txtName,'-');
        // echo $tenkodau;
        $this->validate($request,
            [
                'brand' => 'required',
                'productCategory' => 'required',
                'txtName' => 'required|unique:products,name|min:3|max:100',
                'txtDescription' => 'required',
                'txtContent' => 'required',
                'txtPrice' => 'required',
                
                'txtWeight' => 'required',
                'txtSku' => 'required',
                'txtTag' => 'required',
            ],
            [
                'brand.required' => 'You have not entered data',
                'productCategory.required' => 'You have not entered data',
                'txtName.required' => 'You have not entered data',
                'txtName.unique' => 'Product Category is have',
                'txtName.min' =>'Min: 3',
                'txtName.max' =>'Max: 100',
                'txtDescription.required' => 'You have not entered data',
                'txtContent.required' => 'You have not entered data',
                'txtPrice.required' => 'You have not entered data',
                
                'txtWeight.required' => 'You have not entered data',
                'txtSku.required' => 'You have not entered data',
                'txtTag.required' => 'You have not entered data',

            ]);
        $product = new Product;
        $product->brand_id = $request->brand;
        $product->product_category_id = $request->productCategory;
        $product->name = $request->txtName;
        $product->description = $request->txtDescription;
        $product->content = $request->txtContent;
        $product->price = $request->txtPrice;
        $product->discount = $request->txtDiscount;
        $product->weight = $request->txtWeight;
        $product->sku = $request->txtSku;
        $product->featured = (int)$request->rdoFeatured;
        $product->tag = $request->txtTag;

        // dd($request->all());
        $product->save();

        return redirect('dashboard/product/add')->with('message', 'Add Product Category Success !');

    }

    public function getEdit($id){
        $brands = Brand::all();
        $productCategories = ProductCategory::all();
        // $productCategory = ProductCategory::all();
        // dd($brand);
        $product = Product::find($id);
        $productComments = ProductComment::where('product_id', $id)->first();
        // dd($productComments->user->name);
        // dd($productCategory);
        return view('dashboard.product.edit', compact('product','brands','productCategories','productComments'));
    }

    public function postEdit(Request $request,$id){
        $product = Product::find($id);


        $this->validate($request,
            [
                'brand' => 'required',
                'productCategory' => 'required',
                'txtName' => 'required|min:3|max:100',
                'txtDescription' => 'required',
                'txtContent' => 'required',
                'txtPrice' => 'required',
                
                'txtWeight' => 'required',
                'txtSku' => 'required',
                'txtTag' => 'required',
            ],
            [
                'brand.required' => 'You have not entered data',
                'productCategory.required' => 'You have not entered data',
                'txtName.required' => 'You have not entered data',
                'txtName.min' =>'Min: 3',
                'txtName.max' =>'Max: 100',
                'txtDescription.required' => 'You have not entered data',
                'txtContent.required' => 'You have not entered data',
                'txtPrice.required' => 'You have not entered data',
                
                'txtWeight.required' => 'You have not entered data',
                'txtSku.required' => 'You have not entered data',
                'txtTag.required' => 'You have not entered data',

            ]);
        
        $product->brand_id = $request->brand;
        $product->product_category_id = $request->productCategory;
        $product->name = $request->txtName;
        $product->description = $request->txtDescription;
        $product->content = $request->txtContent;
        $product->price = $request->txtPrice;
        $product->discount = $request->txtDiscount;
        $product->weight = $request->txtWeight;
        $product->sku = $request->txtSku;
        $product->featured = (int)$request->rdoFeatured;
        $product->tag = $request->txtTag;

        // dd($request->all());
        $product->save();

        return redirect('dashboard/product/edit/'.$id)->with('message', 'Add Product Category Success !');
    }

    public function getDelete($id){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $product = Product::find($id);
        $productDetail = productDetail::where('product_id',$id);
        $productImage = productImage::where('product_id',$id);

        $product->delete();
        $productDetail->delete();
        $productImage->delete();
        // dd($productCategory);
        return redirect('dashboard/product/list')->with('message', 'Delete Product Category Success !');
    }
}
