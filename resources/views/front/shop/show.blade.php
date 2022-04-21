@extends('front.layout.master')

@section('title','Product')

@section('body')

    <!-- Beardcrumb Section Start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop">Shop</a>
                        <a href="./shop/{{$product->productCategory->name}}">{{$product->productCategory->name}}</a>
                        <span>{{$product->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Beardcrumb Section End -->

    <!-- Product Shop Section Start -->
    <div class="product-shop spad">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Women</a></li>
                            <li><a href="#">Kids</a></li>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" name="" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-diesel">
                                    Diesel
                                    <input type="checkbox" name="" id="bc-diesel">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" name="" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy
                                    <input type="checkbox" name="" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" name="" id="minamount" class="">
                                    <input type="text" name="" id="maxamount" class="">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-black">
                                <label class="cs-black" for="cs-black">black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-red">
                                <label class="cs-red" for="cs-red">red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="" id="cs-green">
                                <label class="cs-green" for="cs-green">green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" name="" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" name="" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" name="" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" name="" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img 
                                @if(count($product->productImages) > 0) 
                                src="front/img/products/{{$product->productImages[0]->path}}"
                                @endif alt="" class="product-big-img">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                @foreach($product->productImages as $productImage)
                                    <div class="pt active" data-imgbigurl="front/img/products/{{$productImage->path}}">
                                        <img src="front/img/products/{{$productImage->path}}" alt="">
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{$product->tag}}</span>
                                    <h3>{{$product->name}}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                @for($i=1 ;$i<=5; $i++)
                                    @if($i<=$avgRating)
                                        <i class="fa fa-star"></i>
                                    @else    
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                                    <span>({{count($product->productComments)}})</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{$product->content}}</p>

                                    @if($product->discount!=null)
                                        <h4>
                                            ${{number_format($product->discount)}} 
                                            <span>${{number_format($product->price)}}</span>
                                        </h4>
                                    @else
                                        <h4>${{number_format($product->price)}}</h4>
                                    @endif

                                </div>
                                {{-- Thông báo lỗi --}}
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        {{$error}}<br>
                                    @endforeach
                                </div>
                                @endif
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
                                {{-- Thông báo lỗi --}}
                                {{-- ---------------------------------------- --}}
                                <form action="{{URL::to('/cart')}}" method="post" class="add-form">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                {{-- st --}}
                                <div class="pd-color">
                                    <h6>Color:</h6>
                                    <div class="pd-color-choose">
                                    
                                        @foreach(array_unique(array_column($productDetails->toArray(), 'color')) as $productColor)
                                        <div class="cc-item">
                                            <input type="radio" name="color" id="cc-{{$productColor}}" value="{{$productColor}}">
                                            <label class="cc-{{$productColor}}" for="cc-{{$productColor}}"></label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="pd-size-choose">

                                    @foreach(array_unique(array_column($productDetails->toArray(), 'size')) as $productSize)
                                    <div class="sc-item">
                                        <input type="radio" name="size" id="{{$productSize}}-size" value="{{$productSize}}">
                                        <label for="{{$productSize}}-size">{{$productSize}}</label>
                                    </div>
                                    @endforeach
                                    
                                </div>
                                <div class="quantity">       
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" name="qty" id="" value="1" min="1" max="{{array_sum(array_column($productDetails->toArray(), 'qty'))}}">
                                        </div>
                                        <button type="submit" class="primary-btn pd-cart">Add To Card</button>
                                        {{-- <a href="./cart" class="primary-btn" style="margin-left: 10px;">Check Card</a> --}}

                                    </div>
                                </div>

                                </form>
                                {{-- ------------------------------------- --}}

                                <div class="pd-tags">
                                    <li><span>Brand</span>: {{$product->brand->name}}</li>

                                    <li><span>CATEGORIES</span>: {{$product->productCategory->name}}</li>
                                    <li><span>TAGS</span>: {{$product->tag}}</li>
                                </div>
                                <div class="pd-share">
                                    <div class="p-code">Sku: {{$product->sku}}</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="pd-tags" style="margin-top: 120px">
                                    <li><span>POLICY FROM SHOP4MEN:</span></li>
                                    <li>► Exchange goods within 3 days.</li>
                                    <li>► 10% off total bill when buying (at the store) on your birthday week (before and 3 days after your birthday).</li>
                                    <li>► Delivery within Hanoi city only from 15,000 VND within 24 hours.</li>
                                    <li>► Accumulate points 3-10% of the order value for each purchase and deduct money on the next purchase.</li>
                                </div>

                            </div>
                        </div>  
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">DESCRIPTIONS</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">SPECIFCATIONS</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">Customer review({{count($product->productComments)}})</a></li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                {!!$product->description!!}
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="https://storage.googleapis.com/cdn.nhanh.vn/store/662/artCT/66073/600x400.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                    @for($i=1 ;$i<=5; $i++)
                                                    @if($i<=$avgRating)
                                                        <i class="fa fa-star"></i>
                                                    @else    
                                                        <i class="fa fa-star-o"></i>
                                                    @endif
                                                    @endfor
                                                        <span>({{count($product->productComments)}})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price"> 
                                                    @if($product->discount != null)
                                                        ${{$product->discount}}
                                                    @else
                                                        ${{$product->price}}
                                                    @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Quantity</td>
                                                <td>
                                                    <div class="cart-add">
                                                        {{array_sum(array_column($product->productDetails->toArray(), 'qty'))}}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability in stock</td>
                                                <td>
                                                    <div class="cart-add">
                                                        @foreach($product->productDetails as $productDetail)
                                                            @if($productDetail->qty > 0)
                                                                {{$productDetail->color}},
                                                                {{$productDetail->size}},
                                                                {{$productDetail->qty}}
                                                            @endif
                                                            <br>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">{{$product->weight}}kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td><div class="p-size">
                                                    @foreach(array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                                        {{$productSize}}.
                                                    @endforeach
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td>
                                                    @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)
                                                        <span class="cs-{{$productColor}}"></span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td><div class="p-code">{{$product->sku}}</div></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{count($product->productComments)}} Comments</h4>
                                        <div class="comment-option">
                                            @foreach($product->productComments as $productComment)
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="front/img/product-single/{{$productComment->user->avatar ?? 'default-avatar.png'}}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        @for($i=1 ;$i<=5; $i++)
                                                        @if($i<=$productComment->rating)
                                                            <i class="fa fa-star"></i>
                                                        @else    
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                        @endfor
                                                    </div>
                                                    <h5>{{$productComment->name}} <span>{{date('M d,Y',strtotime($productComment->created_at))}}</span></h5>
                                                    <div class="at-repdy">{{$productComment->messages}}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        
                                        <div class="leave-comment">
                                        <h4>Leave A Comment</h4>
                                        @if(Auth::check())

                                            <form action="shop/product/{{$product->id}}" method="post" class="comment-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id ?? null}}">
                                                <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                                <input type="hidden" name="email" value="{{Auth::user()->email}}">

                                                <div class="row">
                                                    {{-- <div class="col-lg-6">
                                                        <input type="text" placeholder="Name" name="name" id="">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name="email" id="">
                                                    </div> --}}
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages" name="messages"></textarea>
                                                        <div class="personal-rating">
                                                            <h6>Your Rating</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="site-btn" name="">Send message</button>
                                                    </div>
                                                </div>
                                            </form>

                                        @else

                                            <form action="shop/product/{{$product->id}}" method="post" class="comment-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id ?? null}}">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input required type="text" placeholder="Name" name="name" id="">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input required type="email" placeholder="Email" name="email" id="">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages" name="messages"></textarea>
                                                        <div class="personal-rating">
                                                            <h6>Your Rating</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="site-btn" name="">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Shop Section End -->
    <!-- Related products section start -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-sm-6">
                    @include('front.components.product-item',['product'=>$relatedProduct])
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Related products section end -->

@endsection
