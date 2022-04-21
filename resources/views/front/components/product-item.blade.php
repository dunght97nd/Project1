<div class="product-item">
    <div class="pi-pic">
        <img 
        @if(count($product->productImages) > 0) 
        src="front/img/products/{{ $product->productImages[0]->path }}"
        @endif alt="">
            @if($product->discount != null)
            <div class="sale">Sale</div> 
            @endif
            <div class="icon">
                <i class="icon_heart_alt"></i>
            </div>
            <ul>
                {{-- <li class="w-icon active"><a href="./cart/add/{{$product->id}}"><i class="icon_bag_alt"></i></a></li> --}}
                <li class="w-icon active"><a href="./shop/product/{{$product->id}}"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="./shop/product/{{$product->id}}">+Quick view</a></li>
                {{-- <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li> --}}
            </ul>
    </div>
    <div class="pi-text">
        <div class="category-name">{{ $product-> tag }}</div>
        <a href="shop/product/{{$product->id}}">
            <h5>{{ $product-> name }}</h5>
        </a>
        <div class="product-price">
            @if($product->discount != null)
                ${{ number_format($product-> discount, 0) }}
                <span>${{ $product-> price }}</span>
            @else
                ${{ number_format($product-> price, 0) }}
            @endif
        </div>
    </div>
</div>