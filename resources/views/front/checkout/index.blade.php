@extends('front.layout.master')
@section('title','Check Out')
@section('body')

    <!-- Breadcrumb section start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop">Shop</a>
                        <span>Check out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb section end -->

    <!-- Checkout Section start -->
    <div class="checkout-section spad">
        <div class="container">
           
            <form action="checkout" method="post" class="checkout-form">
                @csrf
                <div class="row">

                    @if(Cart::count() > 0)
                    <div class="col-lg-6">
                        {{-- <div class="checkout-content">
                            <a href="login.html" class="content-btn">Click here to login</a>
                        </div> --}}
                        <h4>Billing details</h4>
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id ?? null}}">
                            <div class="col-lg-6">
                                <label for="fir">First Name <span>*</span></label>
                                <input type="text" name="first_name" id="fir" class="fir" required value="{{Auth::user()->first_name ?? null}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name</label>
                                <input type="text" name="last_name" id="last" class="last" required value="@if(Auth::check()){{Auth::user()->last_name}}@endif">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input type="text" name="company_name" id="cun-name" class="cun-name" required value="@if(Auth::check()){{Auth::user()->company_name}}@endif">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country <span>*</span></label>
                                <input type="text" name="country" id="cun" class="cun" required value="@if(Auth::check()){{Auth::user()->country}}@endif">
                            </div>
                            <div class="col-lg-6">
                                <label for="street">Street Address <span>*</span></label>
                                <input type="text" name="street_address" id="street" class="street" required value="@if(Auth::check()){{Auth::user()->street_address}}@endif">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">PostCode / ZIP(optional)</label>
                                <input type="text" name="postcode_zip" id="zip" class="zip" required value="@if(Auth::check()){{Auth::user()->postcode_zip}}@endif">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town /City <span>*</span></label>
                                <input type="text" name="town_city" id="town" class="town" required value="@if(Auth::check()){{Auth::user()->town_city}}@endif">
                            </div>
                            <div class="col-lg-12">
                                <label for="email">Email Address <span>*</span></label>
                                <input type="email" name="email" id="email" class="email" placeholder="abc@gmail.com" required value="@if(Auth::check()){{Auth::user()->email}}@endif">
                            </div>
                            <div class="col-lg-12">
                                <label for="phone">Phone <span>*</span></label>
                                <input type="tel" name="phone" id="phone" class="phone" placeholder="0123456789" pattern="[0-9]{10}" required value="@if(Auth::check()){{Auth::user()->phone}}@endif">
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account ?
                                        <input type="checkbox" name="" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div> --}}
                        </div>               
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="checkout-content">
                            <input type="text" placeholder="enter your code" name="" id="">
                        </div> --}}
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>

                                    @foreach($carts as $cart)
                                    <li class="fw-normal">
                                        {{$cart->name}}-{{$cart->options->color}}-{{$cart->options->size}}(x {{$cart->qty}})
                                        <span>${{number_format($cart->price * $cart->qty, 2)}}</span>
                                    </li>
                                    @endforeach

                                    <li class="fw-normal">Subtotal <span>${{number_format($subtotal, 2)}}</span></li>

                                    @if(Session::get('coupon'))
                                        @foreach(Session::get('coupon') as $key => $cou)
                                            {{-- Coupon theo phan tram --}}
                                            @if($cou['coupon_condition'] == 1)
                                                <li class="fw-normal">
                                                    Discount({{$cou['coupon_number']}}%):
                                                    <span>-${{number_format($subtotal * $cou['coupon_number'] / 100, 2)}}</span>

                                                    <input type="hidden" name="coupon_code" value="{{$cou['coupon_code']}}">
                                                </li>
                                                <li class="total-price">
                                                    Total: 
                                                    <span>${{number_format($subtotal - $subtotal * $cou['coupon_number'] / 100, 2)}}</span>

                                                    <input type="hidden" name="total" value="{{$subtotal - $subtotal * $cou['coupon_number'] / 100}}">
                                                </li>
                                            {{-- Coupon theo tien --}}                                                
                                            @elseif($cou['coupon_condition'] == 2)
                                                <li class="fw-normal">
                                                    Discount(${{$cou['coupon_number']}}):
                                                    <span>-${{number_format($cou['coupon_number'], 2)}}</span>

                                                    <input type="hidden" name="coupon_code" value="{{$cou['coupon_code']}}">
                                                </li>
                                                <li class="total-price">
                                                    Total: 
                                                    <span>${{number_format($subtotal - $cou['coupon_number'], 2)}} </span>

                                                    <input type="hidden" name="total" value="{{$subtotal - $cou['coupon_number']}}">
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li class="total-price">
                                            Total: 
                                            <span>${{number_format($subtotal, 2)}}</span>

                                            <input type="hidden" name="total" value="{{$subtotal}}">
                                        </li>
                                    @endif

                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Pay Later
                                            <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Online payment
                                            <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                        
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @else
                    <div class="col-lg-12">
                        <h4>Your cart is empty.</h4>
                    </div>
                    @endif
                </div>
            </form>
            
        </div>
    </div>
    <!-- Checkout Section end -->

@endsection



    