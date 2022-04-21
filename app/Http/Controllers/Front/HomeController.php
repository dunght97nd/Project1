<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Blog;
use App\Models\ProductCategory;



class HomeController extends Controller
{
    //
    public function index(){
        //lọc sản phẩm men có featured = true và product_category_id = 1
        $shirtProducts = Product::where('featured', true)->where('product_category_id', 1)->get();
        $pantProducts = Product::where('featured', true)->where('product_category_id', 2)->get();
        

        //lọc sản phẩm blog có id sắp xếp dưới lên và max = 3
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();

        
        $categories = ProductCategory::all();

        // dd($menProducts);

        return view('front.index', compact('shirtProducts', 'pantProducts', 'blogs','categories'));
   
    }

}
