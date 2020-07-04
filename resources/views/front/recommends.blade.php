<?php
$products1 = DB::table('recommends')
        ->leftJoin('products','recommends.pro_id','products.id')
        ->select('pro_id','pro_name','image','pro_price', DB::raw('count(*) as total'))
        ->groupBy('pro_id','pro_name','image','pro_price')
        ->orderby('total','DESC')
        ->take(3)
        ->get();
if(Auth::check()){
 $products2 = DB::table('recommends')
         ->leftJoin('products','recommends.pro_id','products.id')     
         ->where('uid',Auth::user()->id)
         ->inRandomOrder()
        ->take(3)
        ->get();
}else{
 $products2 = DB::table('recommends')
         ->leftJoin('products','recommends.pro_id','products.id')
         ->inRandomOrder()
        ->take(3)
        ->get();
}    
?>
<div class="featured-products owl-carousel owl-theme owl-dots-top">

    @foreach($products1 as $p)

    <div class="product">
        <figure class="product-image-container">
            <a href="{{url('/product_details')}}/{{$p->pro_id}}" class="product-image">
                <img src="{{url('images',$p->image)}}" alt="product">
            </a>
        </figure>
        <div class="product-details">
            <h2 class="product-title">
                <a href="{{url('/product_details')}}/{{$p->pro_id}}">{{$p->pro_name}}</a>
            </h2>
            <div class="price-box">
                <span class="product-price">Rs. {{$p->pro_price}}</span>
            </div><!-- End .price-box -->

            <div class="product-details-inner">
                <div class="product-action">
                    <a href="{{url('/cart/addItem')}}/{{$p->pro_id}}" class="paction add-cart" title="Add to Cart">
                        <span>Add to Cart</span>
                    </a>

                    <style>
                    @media screen and (min-width: 992px) {

                        #myfrom,
                        .form-footer {
                        margin-bottom: 0 !important;
                        }

                        .paction {
                        background: transparent;
                        margin-left: 5px;
                        }

                        .paction.added{
                        background: red;
                        }
                    }
                    </style>

                    <?php
                    $wishData = DB::table('wishlist')->rightJoin('products','wishlist.pro_id', '=', 'products.id')->where('wishlist.pro_id', '=', $product->id)->get();
                    $count = App\wishlist::where(['pro_id' => $product->id])->count();
                    ?>

                    <?php if($count=="0"){?>

                    {!! Form::open(['route' => 'addToWishList', 'method' => 'post', 'id' => 'myfrom'])
                    !!}

                    <input type="hidden" value="{{$product->id}}" name="pro_id" />
                    <button type="submit" class="paction add-wishlist" title="Add to Wishlist">
                    <span>Add to Wishlist</span>
                    </button>

                    {!! Form::close() !!}

                    <?php } else {?>
                    <button disabled type="submit" class="paction added add-wishlist" title="Already added to Wishlist">
                        <span>Already Added to Wishlists</span>
                    </button>
                    <?php }?>

                </div><!-- End .product-action -->
            </div><!-- End .product-details-inner -->
        </div><!-- End .product-details -->
    </div><!-- End .product -->

    @endforeach

    @foreach($products2 as $p)

    <div class="product">
        <figure class="product-image-container">
            <a href="{{url('/product_details')}}/{{$p->pro_id}}" class="product-image">
                <img src="{{url('images',$p->image)}}" alt="product">
            </a>
        </figure>
        <div class="product-details">
            <h2 class="product-title">
                <a href="{{url('/product_details')}}/{{$p->pro_id}}">{{$p->pro_name}}</a>
            </h2>
            <div class="price-box">
                <span class="product-price">Rs. {{$p->pro_price}}</span>
            </div><!-- End .price-box -->

            <div class="product-details-inner">
                <div class="product-action">
                    <a href="{{url('/cart/addItem')}}/{{$p->pro_id}}" class="paction add-cart" title="Add to Cart">
                        <span>Add to Cart</span>
                    </a>

                    <?php
                    $wishData = DB::table('wishlist')->rightJoin('products','wishlist.pro_id', '=', 'products.id')->where('wishlist.pro_id', '=', $product->id)->get();
                    $count = App\wishlist::where(['pro_id' => $product->id])->count();
                    ?>

                    <?php if($count=="0"){?>

                    {!! Form::open(['route' => 'addToWishList', 'method' => 'post', 'id' => 'myfrom'])
                    !!}

                    <input type="hidden" value="{{$product->id}}" name="pro_id" />
                    <button type="submit" class="paction add-wishlist" title="Add to Wishlist">
                    <span>Add to Wishlist</span>
                    </button>

                    {!! Form::close() !!}

                    <?php } else {?>
                    <button disabled type="submit" class="paction added add-wishlist" title="Already added to Wishlist">
                        <span>Already Added to Wishlists</span>
                    </button>
                    <?php }?>
                </div><!-- End .product-action -->
            </div><!-- End .product-details-inner -->
        </div><!-- End .product-details -->
    </div><!-- End .product -->

    @endforeach




</div><!-- End .featured-proucts -->