<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

use Mail;
use Session;



class CheckOutController extends Controller
{
    //
    public function index(){
        $carts = Cart::content();
        $total = Cart::total(0,',','');
        $total = (float)$total;
        // dd($total);

        $subtotal = Cart::subtotal(0,',','');
        $subtotal = (float)$subtotal;

        // $categories = ProductCategory::all();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request){
        // dd($request->all());
        // $total = (double)$request->total;
        // dd($total);
        
        if ($request->payment_type == 'pay_later'){
            //Them don hang
            $order = Order::create([
                'user_id'=> $request->user_id,
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name,
                'company_name'=> $request->company_name,
                'country'=> $request->country,
                'street_address'=> $request->street_address,
                'postcode_zip'=> $request->postcode_zip,
                'town_city'=> $request->town_city,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'coupon_code'=> $request->coupon_code ?? '',
                'total'=> (double)$request->total,
                'payment_type'=> $request->payment_type,
                'status'=> 1,
            ]);

            //Them chi tiet don hang
            $carts = Cart::content();

            // dd($carts);
            foreach ($carts as $cart) {
                $data = [
                    'order_id' => $order->id,
                    // 'product_id' => $cart->id,
                    'productDetail_id' => $cart->id, //
                    'color' => $cart->options->color,
                    'size' => $cart->options->size,
                    'qty'=> $cart->qty,
                    'amount' => $cart->price,
                ];
                OrderDetail::create($data);
            }

            // Gui email
            $total = Cart::total(0,',','');
            $total = (float)$total;
            // dd($total);

            $subtotal = Cart::subtotal(0,',','');
            $subtotal = (float)$subtotal;
            $this->sendEmail($order, $total, $subtotal);

            //Xoa gio hang
            Cart::destroy();
            Session::forget('coupon');

            //Tra ve ket qua
            return redirect('checkout/result')->with('notification','Your order has been sent to your email, please check again, You will pay on delivery, thank you very much !');
        } else {
            return redirect('checkout/result')->with('notification','Online payment method is not supported !');
        }
    }

    private function sendEmail($order, $total, $subtotal){
        $email_to =  $order->email;
        Mail::send('front.checkout.email', compact('order','total','subtotal'), function($message) use ($email_to){
            $message->from('dunght97nd@gmail.com','Shop4Men');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }
    

    public function result(){
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));

    }
}
