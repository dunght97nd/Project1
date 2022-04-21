<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Coupon;

use PDF;






class OrderController extends Controller
{
    public function getList(){
        $orders = Order::orderBy('id','DESC')->get();
        // dd($productCategory);
        return view('dashboard.order.list', compact('orders'));
    }


    public function getAdd(){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $users = User::all();

        return view('dashboard.order.add', compact('users'));
    }
    public function postAdd(Request $request){
        // $tenkodau = Str::slug($request->txtName,'-');
        // echo $tenkodau;
        // 
        // dd($request->all());
        $this->validate($request,
            [
                'first_name' => 'required|min:3|max:100',
                'last_name' => 'required|min:3|max:100',
                'company_name' => 'required|min:3|max:100',
                'country' => 'required|min:3|max:100',
                'street_address' => 'required|min:3|max:100',
                'town_city' => 'required|min:3|max:100',
                'email' => 'required|min:3|max:100',
                'phone' => 'required|min:3|max:100',
            ],
            [
                'first_name.required' => 'You have not entered data',
                'first_name.min' =>'Min: 3',
                'first_name.max' =>'Max: 100',
                'last_name.required' => 'You have not entered data',
                'last_name.min' =>'Min: 3',
                'last_name.max' =>'Max: 100',
                'company_name.required' => 'You have not entered data',
                'company_name.min' =>'Min: 3',
                'company_name.max' =>'Max: 100',
                'country.required' => 'You have not entered data',
                'country.min' =>'Min: 3',
                'country.max' =>'Max: 100',
                'street_address.required' => 'You have not entered data',
                'street_address.min' =>'Min: 3',
                'street_address.max' =>'Max: 100',
                'town_city.required' => 'You have not entered data',
                'town_city.min' =>'Min: 3',
                'town_city.max' =>'Max: 100',
                'email.required' => 'You have not entered data',
                'email.min' =>'Min: 3',
                'email.max' =>'Max: 100',
                'phone.required' => 'You have not entered data',
                'phone.min' =>'Min: 3',
                'phone.max' =>'Max: 100',
            ]);
        $order = new Order;
        if ($request->user_id != 0){
            $order->user_id = $request->user_id;
        }
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->company_name = $request->company_name;
        $order->country = $request->country;
        $order->street_address = $request->street_address;
        $order->town_city = $request->town_city;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->payment_type = 'paid';
        $order->total = 0;
        $order->status = 2;
        // dd($request->all());
        $order->save();
        return redirect('dashboard/order/add')->with('message', 'Add Order Success !');
    }

    public function getAddOrderDetail($id){
        $orderId = $id;
        $productDetails = ProductDetail::all();
        return view('dashboard.orderDetail.add', compact('orderId','productDetails'));
    }

    public function postAddOrderDetail(Request $request){
        
        // dd($request->all());
        $productDetailId = $request->productDetailId;

        

        // $this->validate($request,
        //     [
        //         'first_name' => 'required|min:3|max:100',
        //         'last_name' => 'required|min:3|max:100',
        //     ],
        //     [
        //         'first_name.required' => 'You have not entered data',
        //         'first_name.min' =>'Min: 3',
        //         'first_name.max' =>'Max: 100',
        //     ]);
        // $orderDetail = new OrderDetail;
        
        // $order->first_name = $request->first_name;
        // $order->last_name = $request->last_name;
        // $order->company_name = $request->company_name;
        // $order->country = $request->country;
        // $order->street_address = $request->street_address;
        // $order->town_city = $request->town_city;
        // $order->email = $request->email;
        // $order->phone = $request->phone;
        // $order->payment_type = 'paid';
        // $order->total = 0;
        // $order->status = 2;
        // // dd($request->all());
        // $orderDetail->save();
        // return redirect('dashboard/order/add')->with('message', 'Add Order Success !');
    }
























    public function getEdit($id){
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id', $id)->first();
        $coupon = Coupon::where('code', $order->coupon_code)->first();

        $orderDetailss = OrderDetail::where('order_id', $id)->get();
        // dd($orderDetailss);

        // dd($productComments->user->name);
        // dd($productCategory);
        return view('dashboard.order.edit', compact('order','orderDetails','coupon'));
    }

    public function postEdit(Request $request){
        $data = $request->all();
        // dd($data);
        $order = Order::find($data['order_id']);
        $order->status = $data['order_status'];
        $order->save();

        if ($order->status == 2){
            foreach($data['order_productDetail_id'] as $key => $productDetail_id){
                $productDetail = ProductDetail::find($productDetail_id);
                $productDetail_qty = $productDetail->qty;
                $productDetail_sold = $productDetail->sold;
                foreach($data['quantity'] as $key2 => $qty){
                    if ($key == $key2){
                        $productDetail->qty = $productDetail_qty - $qty;
                        $productDetail->sold = $productDetail_sold + $qty;
                        $productDetail->save();
                    }
                }
            }
        }
        else if ($order->status == 3){
            foreach($data['order_productDetail_id'] as $key => $productDetail_id){
                $productDetail = ProductDetail::find($productDetail_id);
                $productDetail_qty = $productDetail->qty;
                $productDetail_sold = $productDetail->sold;
                foreach($data['quantity'] as $key2 => $qty){
                    if ($key == $key2){
                        $productDetail->qty = $productDetail_qty + $qty;
                        $productDetail->sold = $productDetail_sold - $qty;
                        $productDetail->save();
                    }
                }
            }
        }
    }


    public function getDelete($id){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id', $id);
        $orderDetails->delete();
        $order->delete();
        // dd($productCategory);
        return redirect('dashboard/order/list')->with('message', 'Delete Order Success !');
    }



    public function getPrint($id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }

    public function print_order_convert($id){
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id', $id)->first();
        $coupon = Coupon::where('code', $order->coupon_code)->first();

        $output = '';
        $output =  '<style> 
                    body{
                        font-family: Dejavu Sans;
                        font-size: 10px;
                        text-transform: capitalize;
                    }
                    .product{
                        border: 1px solid #000;
                    }

                    .product thead tr th{
                        border: 1px solid #000;
                    }

                    .product tbody tr td{
                        border: 1px solid #000;
                        padding: 10px 30px;
                        text-align: center;

                    }

                    .header tbody tr td{
                        border: 1px solid #fff;
                        padding: 0px 30px 10px 0;
                    }
                    </style>
                    <table class="header">
                        <tbody>
                            <tr>
                                <td>SHOP4MEN<td>   
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>
                                Công ty cổ phần BSBP Toàn Cầu.<br>
                                Địa chỉ: Số 27, Ngách 1/42 Âu Cơ, Quảng An, Q.Tây Hồ, TP Hà Nội , VN.
                                </td>
                            </tr>
                            <tr>
                                
                                <td colspan="7" style="text-align: center;font-size: 18px;font-weight: bolder;"> ORDER </td>
                                
                                
                            </tr>

                            <tr>
                                <td>Name: '.$orderDetails->order->last_name.' '.$orderDetails->order->first_name.'<td>   
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>
                                    Order ID: '.$orderDetails->order_id.'
                                </td>
                            </tr>
                            <tr>
                                <td>Company Name: '.$orderDetails->order->company_name.'<td>   
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Payment: '.$orderDetails->order->payment_type.'
                                </td>
                            </tr>
                            <tr>
                                <td>Address: '.$orderDetails->order->street_address.' ,'.$orderDetails->order->country.','.$orderDetails->order->town_city.' <td>   
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>Currency: 
                                    $
                                
                                </td>
                            </tr>
                            <tr>
                                <td>Phone: '.$orderDetails->order->phone.'<td>   
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>
                                
                                </td>
                            </tr>
                            <tr>
                                <td>Email: '.$orderDetails->order->email.'<td>   
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>
                                
                                </td>
                            </tr>
                            <tr>
                                
                                <td colspan="7" style="text-align: center;font-size: 13px;font-weight: bolder;">
                                    Thank you to trust Shop4Men , We sent you the order as follow.
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>


                    <table class="product">
                        <thead>                                   
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($order->orderDetails as $orderDetail){
        $output.='          <tr>
                                <td>'.$orderDetail->id.'</td>
                                <td>
                                    '.$orderDetail->productDetail->product->name.'
                                <td>
                                    '.$orderDetail->color.'
                                </td>
                                <td>'.$orderDetail->size.'</td>
                                <td>x'.$orderDetail->qty.'</td>
                                <td style="text-align: right;">'.number_format($orderDetail->amount, 2).'</td>
                                <td style="text-align: right;">'.number_format($orderDetail->amount * $orderDetail->qty, 2).'</td>
                            </tr>';
                            }
                            if($coupon){
                                if($coupon->condition == 1){
        $output.='              <tr>
                                    <td> Coupon Code </td>
                                    <td colspan="5"></td>
                                    <td style="text-align: right;">-'.$coupon->number.'%</td>
                                </tr>';
                                }
                                if($coupon->condition == 2){
        $output.='              <tr>
                                    <td> Coupon Code </td>
                                    <td colspan="5"></td>
                                    <td style="text-align: right;">-'.number_format($coupon->number, 2).'</td>
                                </tr>';
                                }
                            }
        $output.='                
                            <tr>
                                <td style="font-weight: bolder;"> Total Payment </td>
                                <td colspan="5"></td>
                                <td style="font-weight: bolder;">$'.number_format($orderDetails->order->total, 2).'</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="footer" style="margin-top: 20px;">
                        <tbody>
                            <tr>
                                <td>POLICY FROM SHOP4MEN<td>
                            </tr>
                            <tr>  
Receiver                        <td>► Exchange goods within 3 days.</td>
                            </tr>
                            <tr>    
                                <td>► 10% off total bill when buying (at the store) on your birthday week (before and 3 days after your birthday).</td>
                            </tr>
                            <tr> 
                                <td>► Delivery within Hanoi city only from 15,000 VND within 24 hours.</td>
                            </tr>
                            <tr> 
                                <td>► Accumulate points 3-10% of the order value for each purchase and deduct money on the next purchase.</td> 
                            </tr>

                            <tr>
                                <td>
                                    <span style="margin-left: 50px;">SHOP4MEN</span>
                                <td>
                                <td>
                                    WE HOPE TO SEE YOU AGAIN !<br>
                                    <span style="margin-left: 20px;">Hà Nội, Ngày 1/1/2022</span><br>
                                    <span style="margin-left: 50px;">Receiver</span>
                                <td>        
                            </tr>
                        </tbody>
                    </table>';
        return $output;
    }
}
