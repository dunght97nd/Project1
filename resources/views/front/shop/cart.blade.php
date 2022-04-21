@extends('front.layout.master')

@section('title','Product')

@section('body')

    <!-- Breadcrumb section start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop">Shop</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb section end -->

    <!-- Shopping cart start -->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
            @if (Cart::count()>0)
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><i onclick="window.location='./cart/destroy'" class="ti-close"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)  
                                <tr>
                                    <td class="cart-pic first-row"><img style="height: 200px;" src="front/img/products/{{$cart->options->images[0]->path}}" alt=""></td>

                                    <td class="cart-title first-row">
                                        <h5 style="cursor: pointer;" onclick="window.location='./shop/product/{{$cart->id}}'">   {{$cart->name}}-{{$cart->options->color}}-{{$cart->options->size}}
                                        </h5>
                                    </td>

                                    <td class="p-price first-row">
                                        ${{number_format($cart->price, 0)}}
                                    </td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$cart->qty}}" data-rowid="{{$cart->rowId}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">${{number_format($cart->price* $cart->qty, 0)}}</td>
                                    <td class="close-td first-row"><i onclick="window.location='./cart/delete/{{$cart->rowId}}'" class="ti-close"></i></a></td>
                                </tr>
                            @endforeach    

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="./shop" class="primary-btn continue-shop">Continue shopping</a>
                                {{-- <a href="#" class="primary-btn up-cart">Update cart</a> --}}
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>

                                <form action="{{URL('./cart/check-coupon')}}" method="POST" class="coupon-form">
                                    @csrf
                                    <input type="text" name="coupon" id="" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>         
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                @if (session('success'))
                                <div class="alert alert-success">                                    
                                    {{session('success')}}
                                </div>
                                @endif
                                @if (session('error'))
                                <div class="alert alert-danger">                                    
                                        {{session('error')}}
                                </div>
                                @endif
                                @if (session('message'))
                                <div class="alert alert-success">                                    
                                    {{session('message')}}
                                </div>
                                @endif
                                <ul>
                                    <li class="subtotal">Subtotal: 
                                        <span>${{number_format($subtotal,2)}}</span>
                                    </li>
                                    @if(Session::get('coupon'))
                                        @foreach(Session::get('coupon') as $key => $cou)
                                            @if($cou['coupon_condition'] == 1)
                                                <li class="subtotal">
                                                    Discount({{$cou['coupon_number']}}%):
                                                    <i style="cursor:pointer" onclick="window.location='./cart/uncheck-coupon'" class="ti-close" href=""></i>
                                                    <span>-${{number_format($subtotal * $cou['coupon_number'] / 100, 2)}} </span>
                                                </li>
                                                <li class="cart-total">Total </span> <span>${{number_format($subtotal - $subtotal * $cou['coupon_number'] / 100, 2)}}</span>
                                                </li>
                                            @elseif($cou['coupon_condition'] == 2)
                                                <li class="subtotal">
                                                    Discount(${{$cou['coupon_number']}}):
                                                    <i style="cursor:pointer" onclick="window.location='./cart/uncheck-coupon'" class="ti-close" href=""></i>
                                                    <span>-${{number_format($cou['coupon_number'], 2)}} </span>
                                                </li>
                                                <li class="cart-total">
                                                    Total:  
                                                    <span>${{number_format($subtotal - $cou['coupon_number'], 2)}} </span>
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li class="cart-total">Total:
                                          <span>${{number_format($subtotal, 2)}}</span>
                                        </li>
                                    @endif
                                </ul>
                                <a style="margin-bottom: 20px" href="./checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-12">
                    <h4>Your cart is empty...</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Shopping cart end -->

@endsection
    