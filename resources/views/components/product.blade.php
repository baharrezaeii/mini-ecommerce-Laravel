<!-- PRODUCT ITEM -->
<div class="swiper-slide product-card group">
    <!-- product header -->
    <div class="product-card_header">
        <div class="flex items-center gap-x-2">
            <form action="http://127.0.0.1:8000/cart/add"
                  method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}"/>
                <input type="hidden" name="qty" value="1"/>

                <div class="tooltip">
                    <button
                        type="submit"
                        class="rounded-full p-1.5 app-border app-hover"
                    >
                        <svg class="size-4">
                            <use href="#shopping-cart"></use>
                        </svg>
                    </button>
                    <div class="tooltiptext">
                        سبد خرید
                    </div>
                </div>
            </form>
        </div>
        @if($product->discount>0)
            <!-- badge offer -->
            <span class="product-card_badge">
            {{calcPercent($product->price ,$product->discount)}}
                %
                تخفیف‌
            </span>
         @endif
    </div>
    <!-- product img -->
    <a href="{{route('products.show',$product->id)}}">
        <img
            class="product-card_img group-hover:opacity-0 absolute"
            src="{{asset('assets/images/products/1.png')}}"
            alt=""
        >
        <img
            class="product-card_img opacity-0 group-hover:opacity-100"
             src="{{asset('assets/images/products/1.png')}}"
            alt="">
    </a>
    <!--  product footer -->
    <div class="space-y-2">
        <a href="{{route('products.show',$product->id)}}" class="product-card_link">
            {{$product->name}}
            |
            {{$product->en_name}}

        </a>
        <!-- Rate and Price -->
        <div class="product-card_price-wrapper">
            <!-- Price -->
         @if($product->discount)
                <div class="product-card_price-wrapper">
                    <del>{{number_format($product->price)}} <h6>تومان</h6></del>
                    <p>{{number_format($product->price - $product->discount)}}</p>
                    <span>تومان</span>
                </div>
            @else
                <div class="product-card_price">
                    <p>{{number_format($product->price)}}</p>
                    <span>تومان</span>
                </div>
         @endif
            </div>
        </div>
    </div>
