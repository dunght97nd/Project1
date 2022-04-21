<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

use App\Models\Product;
use App\Models\productDetail;

use App\Models\ProductCategory;
use App\Models\Coupon;



class CartController extends Controller
{
    //
    // public function add($id){
    //     //Tim product co id
    //     // $product = Product::findOrFail($id);


    //     // Cart::add([
    //     //     'id' => $id,
    //     //     'name' => $product->name,
    //     //     'qty' => 1,
    //     //     'price' => $product->discount ?? $product->price,
    //     //     'weight' => $product->weight ?? 0,
    //     //     'options' => [
    //     //         'images' => $product->productImages,
    //     //         'size' => $productSize ?? null,
    //     //         'color' => $productColor ?? null,
    //     //     ],
    //     // ]);

    //     // //Tro lai trang 
    //     // return back(); 
    // }

    public function addProduct(Request $request){
        // dd($request->all());
        $this->validate($request,
            [
                'color' => 'required',
                'size' => 'required',
            ],
            [  
                'color.required' => 'You Have Not Selected Color',
                'size.required' => 'You Have Not Selected Size',
            ]);
        //Tim product co id
        // $this
        $id = $request->product_id;
        $product = Product::where('id', $id)->first();
        // dd($product);
        // 
        // $productDetail = ProductDetail::where('product_id', $id)->where('color', $request->color)->where('size', $request->size)->get();
        // 
        $productColor = $request->color;
        $productSize = $request->size;
        $productQty = $request->qty;
        $productDetail = ProductDetail::where('product_id',$id)->where('color', $productColor)->where('size', $productSize)->where('qty','>=',$productQty)->first();
        // dd($productDetail);

        if($productDetail){
            // Cart::add([
            //     'id' => $id,
            //     'name' => $product->name,
            //     'qty' => $productQty ?? 1,
            //     'price' => $product->discount ?? $product->price,
            //     'weight' => $product->weight ?? 0,
            //     'options' => [
            //         'images' => $product->productImages,
            //         'size' => $productSize,
            //         'color' => $productColor,
            //     ],
            // ]);

            Cart::add([
            //  'id' => $id,
                'id' => $productDetail->id,
                'name' => $product->name,
                'qty' => $productQty ?? 1,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                    'size' => $productSize,
                    'color' => $productColor,
                ],
            ]);
            return back()->with('success','The product has been added to cart');
        }else{
            return back()->with('error','The product has an excess quantity allowed!');
        }



        // dd(Cart::content());
        
    }

    

    public function index(){
        $carts = Cart::content();
        $total = Cart::total(0,',','');
        $total = (float)$total;
        // dd($total);

        $subtotal = Cart::subtotal(0,',','');
        $subtotal = (float)$subtotal;
        $categories = ProductCategory::all();
        
        return view('front.shop.cart', compact('carts', 'total', 'subtotal','categories'));
    }

    public function delete($rowId){
        Cart::remove($rowId);

        return back();
    }

    public function destroy(){
        Cart::destroy();
        Session::forget('coupon');
        
        return back();
    }

    public function update(Request $request){
        if($request->ajax()){
            Cart::update($request->rowId, $request->qty);
        }
        
        return back();
    }

    public function checkCoupon(Request $request){
        $data = $request->all();

        $coupon = Coupon::where('code', $data['coupon'])->first();

        if ($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon->code,
                            'coupon_condition' => $coupon->condition,
                            'coupon_number' => $coupon->number,
                        );
                        Session::put('coupon', $cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->code,
                        'coupon_condition' => $coupon->condition,
                        'coupon_number' => $coupon->number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('success','Your code is applied');
            }
        }else{
            return redirect()->back()->with('error','Your code does not apply');
        }
    }

    public function uncheckCoupon(){
        $coupon = Session::get('coupon');
        if ($coupon == true){
            Session::forget('coupon');
            return redirect()->back()->with('message','Your code has been removed');
        }
    }
}
