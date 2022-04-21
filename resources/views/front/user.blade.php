@extends('front.layout.master')
@section('title','Profile')
@section('body')

    <!-- Breadcrumb section start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        
                        <span>Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb section end -->

    <!-- Checkout Section start -->
    <div class="checkout-section spad">
        <div class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">                                    
                    {{session('message')}}
                </div>
            @endif
            @if(Auth::check())
            <form action="user" method="post" class="checkout-form" enctype="multipart/form-data">
                @csrf
                <div  class="row justify-content-center">
                    <div class="col-lg-6">
                        {{-- <div class="checkout-content">
                            <a href="login.html" class="content-btn">Click here to login</a>
                        </div> --}}
                        <h4>Your Profile</h4>

                        <div class="row">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="col-lg-6">
                                <img style="width: 200px;border-radius: 50%;height: 200px;" src="front/img/product-single/{{Auth::user()->avatar}}" alt="">
                            </div>
                            <div class="col-lg-6">
                                <label style="margin-top: 57px;">Images</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="col-lg-6">
                                <label for="fir">First Name <span>*</span></label>
                                <input type="text" name="first_name" id="fir" class="fir" required value="{{Auth::user()->first_name}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name</label>
                                <input type="text" name="last_name" id="last" class="last" required value="{{Auth::user()->last_name}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input type="text" name="company_name" id="cun-name" class="cun-name" required value="{{Auth::user()->company_name}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country <span>*</span></label>
                                <input type="text" name="country" id="cun" class="cun" required value="{{Auth::user()->country}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address <span>*</span></label>
                                <input type="text" name="street_address" id="street" class="street" required value="{{Auth::user()->street_address}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">PostCode / ZIP(optional)</label>
                                <input type="text" name="postcode_zip" id="zip" class="zip" required value="{{Auth::user()->postcode_zip}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town /City <span>*</span></label>
                                <input type="text" name="town_city" id="town" class="town" required value="{{Auth::user()->town_city}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="email">Email Address <span>*</span></label>
                                <input type="email" name="email" id="email" class="email" placeholder="Email" required value="{{Auth::user()->email}}" readonly="">
                            </div>
                            <div class="col-lg-12">
                                <label for="phone">Phone <span>*</span></label>
                                <input type="tel" name="phone" id="phone" class="phone" placeholder="0123456789" pattern="[0-9]{10}" required value="{{Auth::user()->phone}}">
                            </div>
                            
                            <div class="col-lg-12" style="padding: 0 15px;display: flex;justify-content:space-between">
                                <a style="color:#e7ab3c;" href="user/editPassword" name="">Edit Password</a>
                                <button type="submit" class="site-btn" name="">Save</button>
                            </div>
                        </div>               
                    </div>
                    
                </div>
            </form>
            @endif
        </div>
    </div>
    <!-- Checkout Section end -->

@endsection



    