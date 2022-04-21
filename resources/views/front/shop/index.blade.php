@extends('front.layout.master')
@section('title','Shop')

@section('body')
    <!-- Beardcrumb Section Start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home </a>
                        @if(request()->segment(2))
                            <a href="./shop"> Shop </a>
                            <span>{{request()->segment(2)}}</span>
                        @else
                            <span>Shop</span>
                        @endif
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
                <div class="col-lg-3 col-md-8 col-sm-8 order-lg-1 produts-sidebar-filter">
                    <form action="">
                        <div class="filter-widget">
                            <h4 class="fw-title">Categories</h4>
                            <ul class="filter-catagories">

                            @foreach($categories as $category)
                                <li><a href="./shop/{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach

                            </ul>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Brand</h4>
                            <div class="fw-brand-check">

                            @foreach($brands as $brand)
                                <div class="bc-item">
                                    <label for="bc-{{$brand->id}}">
                                        {{$brand->name}}
                                        <input type="checkbox" {{(request("brand")[$brand->id] ?? '')== 'on'?'checked':''}} name="brand[{{$brand->id}}]" id="bc-{{$brand->id}}" onchange="this.form.submit();">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            @endforeach
                      
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Price</h4>
                            <div class="filter-range-wrap">
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" name="price_min" id="minamount">
                                        <input type="text" name="price_max" id="maxamount">
                                    </div>
                                </div>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" 
                                data-min="10" data-max="999" 
                                data-min-value="{{str_replace('$','',request('price_min'))}}" 
                                data-max-value="{{str_replace('$','',request('price_max'))}}">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                            </div>
                            <button type="submit" class="filter-btn">Filter</button>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Color</h4>
                            <div class="fw-color-choose">
                                <div class="cs-item">
                                    <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();" {{request('color')=='black' ? 'checked' : ''}}>
                                    <label class="{{request('color')=='black' ? 'font-weight-bold' : ''}} cs-black" for="cs-black">black</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit();" {{request('color')=='violet' ? 'checked' : ''}}>
                                    <label class="{{request('color')=='violet' ? 'font-weight-bold' : ''}} cs-violet" for="cs-violet">violet</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit();" {{request('color')=='blue' ? 'checked' : ''}}>
                                    <label class="{{request('color')=='blue' ? 'font-weight-bold' : ''}} cs-blue" for="cs-blue">blue</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-yellow" name="color" value="yellow" onchange="this.form.submit();" {{request('color')=='yellow' ? 'checked' : ''}}>
                                    <label class="{{request('color')=='yellow' ? 'font-weight-bold' : ''}} cs-yellow" for="cs-yellow">yellow</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-red" name="color" value="red" onchange="this.form.submit();" {{request('color')=='red' ? 'checked' : ''}}>
                                    <label class="{{request('color')=='red' ? 'font-weight-bold' : ''}} cs-red" for="cs-red">red</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-green" name="color" value="green" onchange="this.form.submit();" {{request('color')=='green' ? 'checked' : ''}}>
                                    <label class="{{request('color')=='green' ? 'font-weight-bold' : ''}} cs-green" for="cs-green">green</label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Size</h4>
                            <div class="fw-size-choose">
                                <div class="sc-item">
                                    <input type="radio" name="size" id="s-size" value="s" onchange="this.form.submit();" {{request('size')=='s' ? 'checked' : ''}}>
                                    <label for="s-size" class="{{request('size')=='s' ? 'active' : ''}}">s</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="size" id="m-size" value="m" onchange="this.form.submit();" {{request('size')=='m' ? 'checked' : ''}}>
                                    <label for="m-size" class="{{request('size')=='m' ? 'active' : ''}}">m</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="size" id="l-size" value="l" onchange="this.form.submit();" {{request('size')=='l' ? 'checked' : ''}}>
                                    <label for="l-size" class="{{request('size')=='l' ? 'active' : ''}}">l</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="size" id="xs-size" value="xs" onchange="this.form.submit();" {{request('size')=='xs' ? 'checked' : ''}}>
                                    <label for="xs-size" class="{{request('size')=='xs' ? 'active' : ''}}">xs</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="size" id="38-size" value="38" onchange="this.form.submit();" {{request('size')=='38' ? 'checked' : ''}}>
                                    <label for="38-size" class="{{request('size')=='38' ? 'active' : ''}}">38</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="size" id="39-size" value="39" onchange="this.form.submit();" {{request('size')=='39' ? 'checked' : ''}}>
                                    <label for="39-size" class="{{request('size')=='39' ? 'active' : ''}}">39</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="size" id="40-size" value="40" onchange="this.form.submit();" {{request('size')=='40' ? 'checked' : ''}}>
                                    <label for="40-size" class="{{request('size')=='40' ? 'active' : ''}}">40</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="size" id="41-size" value="41" onchange="this.form.submit();" {{request('size')=='41' ? 'checked' : ''}}>
                                    <label for="41-size" class="{{request('size')=='41' ? 'active' : ''}}">41</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" name="size" id="42-size" value="42" onchange="this.form.submit();" {{request('size')=='42' ? 'checked' : ''}}>
                                    <label for="42-size" class="{{request('size')=='42' ? 'active' : ''}}">42</label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Tags</h4>
                            <div class="fw-tags">
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="coat-tag" value="coat" onchange="this.form.submit();" {{request('tag')=='coat' ? 'checked' : ''}}>
                                    <label for="coat-tag" class="{{request('tag')=='coat' ? 'active' : ''}}">Coat</label>
                                </div>
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="shirt-tag" value="shirt" onchange="this.form.submit();" {{request('tag')=='shirt' ? 'checked' : ''}}>
                                    <label for="shirt-tag" class="{{request('tag')=='shirt' ? 'active' : ''}}">Shirt</label>
                                </div>
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="polo-tag" value="polo" onchange="this.form.submit();" {{request('tag')=='polo' ? 'checked' : ''}}>
                                    <label for="polo-tag" class="{{request('tag')=='polo' ? 'active' : ''}}">Polo Shirt</label>
                                </div>
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="jeans-tag" value="jean" onchange="this.form.submit();" {{request('tag')=='jeans' ? 'checked' : ''}}>
                                    <label for="jeans-tag" class="{{request('tag')=='jeans' ? 'active' : ''}}">Jeans</label>
                                </div>
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="shoes-tag" value="shoe" onchange="this.form.submit();" {{request('tag')=='shoes' ? 'checked' : ''}}>
                                    <label for="shoes-tag" class="{{request('tag')=='shoes' ? 'active' : ''}}">Shoes</label>
                                </div>
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="sweater-tag" value="sweater" onchange="this.form.submit();" {{request('tag')=='sweater' ? 'checked' : ''}}>
                                    <label for="sweater-tag" class="{{request('tag')=='sweater' ? 'active' : ''}}">Sweater</label>
                                </div>
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="short-tag" value="short" onchange="this.form.submit();" {{request('tag')=='short' ? 'checked' : ''}}>
                                    <label for="short-tag" class="{{request('tag')=='short' ? 'active' : ''}}">Short</label>
                                </div>
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="casual-tag" value="casual" onchange="this.form.submit();" {{request('tag')=='casual' ? 'checked' : ''}}>
                                    <label for="casual-tag" class="{{request('tag')=='casual' ? 'active' : ''}}">Casual Pants</label>
                                </div>
                                <div class="fw-item">
                                    <input type="radio" name="tag" id="jogger-tag" value="jogger" onchange="this.form.submit();" {{request('tag')=='jogger' ? 'checked' : ''}}>
                                    <label for="jogger-tag" class="{{request('tag')=='jogger' ? 'active' : ''}}">Jogger Pants</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" class="sorting" onchange="this.form.submit();">
                                            <option {{request('sort_by')=='latest' ? 'selected':''}} value="latest">Sorting: Latest</option>
                                            <option {{request('sort_by')=='oldest' ? 'selected':''}} value="oldest">Sorting: Oldest</option>
                                            <option {{request('sort_by')=='name-ascending' ? 'selected':''}} value="name-ascending">Sorting: Name A-Z</option>
                                            <option {{request('sort_by')=='name-descending' ? 'selected':''}} value="name-descending">Sorting: Name Z-A</option>
                                            <option {{request('sort_by')=='price-ascending' ? 'selected':''}} value="price-ascending">Sorting: Price Ascending</option>
                                            <option {{request('sort_by')=='price-descending' ? 'selected':''}} value="price-descending">Sorting: Price Descending</option>
                                        </select>
                                        <select name="show" class="p-show " onchange="this.form.submit();">
                                            <option {{request('show')=='6' ? 'selected':''}} value="6">Show: 6</option>
                                            <option {{request('show')=='9' ? 'selected':''}} value="9">Show: 9</option>
                                            <option {{request('show')=='12' ? 'selected':''}} value="12">Show: 12</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">

                            @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                @include('front.components.product-item')
                            </div>
                            @endforeach

                        </div>
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Product Shop Section End -->
@endsection



    