
@extends('front.layout.master')

@section('title','Home')

@section('body')
    <!-- Hero Section Start -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div data-setbg="./front/img/slide-1.jpg" class="single-hero-items set-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>New Colection | Fall'21</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, facere!</p>
                            <a href="shop" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div data-setbg="./front/img/slide-2.jpg" class="single-hero-items set-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Summer Shirt</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, facere!</p>
                            <a href="shop" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div data-setbg="./front/img/slide-3.jpg" class="single-hero-items set-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Couples Christmas</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, facere!</p>
                            <a href="shop" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Start -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="./front/img/{{$category->img}}" alt="">
                        <a href="shop/{{$category->name}}" class="inner-text">
                            <h4>{{$category->name}}</h4>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Start -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="./front/img/man-1.jpg">
                        <h2>{{$categories[0]->name}}</h2>
                        <a href="shop/{{$categories[0]->name}}">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Featured Products</li>
                            {{-- <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li> --}}
                        </ul>
                    </div>
                    <div {{-- style="margin-top: 77px" --}} class="product-slider owl-carousel">
                        
                    @foreach($shirtProducts as $shirtProduct)
                        @include('front.components.product-item',['product'=>$shirtProduct])
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Section Start -->
    <section class="deal-of-week set-bg spad" data-setbg="./front/img/deal-1.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of Week</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, quidem.</p>
                    <div class="product-price">
                        $35.00
                        <span>/ HandBag</span>
                    </div>   
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>30</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>88</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                       <span>88</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                       <span>88</span>
                        <p>Secs</p>
                    </div>
                </div>
            <a href="./shop" class="primary-btn">Shop Now</a>
            </div>
        </div>        
    </section>
    <!-- Deal Section End -->

    <!-- man Banner Section Start -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Featured Products</li>
                            {{-- <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li> --}}
                        </ul>
                    </div>
                    <div {{-- style="margin-top: 77px" --}} class="product-slider owl-carousel">
                    @foreach($pantProducts as $pantProduct)
                        @include('front.components.product-item',['product'=>$pantProduct])
                    @endforeach
                    </div>
                </div>

                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg" data-setbg="./front/img/man-2.png">
                        <h2>{{$categories[1]->name}}</h2>
                        <a href="shop/{{$categories[1]->name}}">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- man Banner Section End -->
    <!-- Soctial section start -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="./front/img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="./front/img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="./front/img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="./front/img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="./front/img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="./front/img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
    </div>
    <!-- Soctial section end -->
    <!-- Blog section start -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">

            @foreach($blogs as $blog)  
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="./front/img/blog/{{$blog->image}}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{date('M d,Y',strtotime($blog->created_at))}}
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    {{count($blog->blogComments)}}
                                </div>
                            </div>
                            <a href="">
                                <h4>{{$blog->title}}</h4>
                            </a>
                            <p>{{$blog->subtitle}}</p>
                        </div>
                    </div>
                </div>    
            @endforeach

            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="./front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For All Over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="./front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>delivery in time</h6>
                                <p>For All Over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="./front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>secure payment</h6>
                                <p>For All Over 99$</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section end -->

@endsection

    