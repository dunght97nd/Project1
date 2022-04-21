
@extends('front.layout.master')

@section('title','Home')

@section('body')
    <!-- Hero Section Start -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div data-setbg="https://storage.googleapis.com/cdn.nhanh.vn/store/662/album/alb_1635950737_585.jpg" class="single-hero-items set-bg">
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
            <div data-setbg="https://storage.googleapis.com/cdn.nhanh.vn/store/662/album/alb_1620441668_192.jpg" class="single-hero-items set-bg">
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
            <div data-setbg="https://storage.googleapis.com/cdn.nhanh.vn/store/662/album/alb_1608429652_330.jpg" class="single-hero-items set-bg">
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
                        <img src="front/img/{{$category->img}}" alt="">
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
                    <div class="product-large set-bg" data-setbg="https://scontent.fhan5-11.fna.fbcdn.net/v/t1.6435-9/p960x960/171394890_3420296951403544_8387342342880878707_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=36a2c1&_nc_ohc=FkccQP_lFK4AX_T6jQ5&_nc_ht=scontent.fhan5-11.fna&oh=3c1c72b2148b69ca5f941ee0f9b4c611&oe=61BC5ECA">
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
    <section class="deal-of-week set-bg spad" data-setbg="https://storage.googleapis.com/cdn.nhanh.vn/store/662/album/alb_1611409187_31.jpg">
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
                    <div class="product-large set-bg" data-setbg="https://storage.googleapis.com/cdn.nhanh.vn/store/2071/pc/ps_cate_1635751380_438.jpg">
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
        <div class="insta-item set-bg" data-setbg="https://scontent.fhan5-11.fna.fbcdn.net/v/t1.6435-9/103194158_2608052425961338_8807687416605644298_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=973b4a&_nc_ohc=OrsN6rrKBiYAX9ivHU_&_nc_ht=scontent.fhan5-11.fna&oh=9070ed63dd8f80c5d5e1e501e111fb86&oe=61B8BAEA">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="https://scontent.fhan5-3.fna.fbcdn.net/v/t1.6435-9/102773532_2608054115961169_8102812009379211488_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=730e14&_nc_ohc=lCjI4Gr8PRMAX_PeM1s&_nc_ht=scontent.fhan5-3.fna&oh=26cdaf804764aaa5fa0ec012b075c9cb&oe=61BBB079">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="https://scontent.fhan5-2.fna.fbcdn.net/v/t1.6435-9/121177556_2953320634767847_4311617537122558369_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=730e14&_nc_ohc=UjQdR8rdOwgAX-coJ1x&tn=tMnJKodBwyXOGMiR&_nc_ht=scontent.fhan5-2.fna&oh=84fa7820a31701e3c317db644622194b&oe=61B912F2">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="https://scontent.fhan5-6.fna.fbcdn.net/v/t1.6435-9/120017380_2900046933428551_3981469909916346026_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=730e14&_nc_ohc=5A0A0f66e-YAX_4L722&_nc_oc=AQn1FJA4soeINNSsCItEknr4zdT3ma-tVUo2AOv0ksZaM_oEL_xKH4S8gkg8j3ud4wo&tn=tMnJKodBwyXOGMiR&_nc_ht=scontent.fhan5-6.fna&oh=d395d4fe2daf0552387d3e0a24dad7b3&oe=61B9A90E">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="https://scontent.fhan5-8.fna.fbcdn.net/v/t1.6435-9/118472141_2835550039878241_484266464988459188_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=730e14&_nc_ohc=Cu6tm2VKZLoAX-5tPjs&tn=tMnJKodBwyXOGMiR&_nc_ht=scontent.fhan5-8.fna&oh=3e8e155797013e7a307879fa0fbbe2a2&oe=61B99F03">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">Start</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="https://scontent.fhan5-8.fna.fbcdn.net/v/t1.6435-9/118176301_2823218834444695_1916112523933878769_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=730e14&_nc_ohc=gVDeGnP-xdwAX-SVkOc&tn=tMnJKodBwyXOGMiR&_nc_ht=scontent.fhan5-8.fna&oh=95d9a10c29399637d096a467cf04427c&oe=61B8D942">
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
                        <img src="front/img/blog/{{$blog->image}}" alt="">
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
                                <img src="front/img/icon-1.png" alt="">
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
                                <img src="front/img/icon-2.png" alt="">
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
                                <img src="front/img/icon-3.png" alt="">
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

    