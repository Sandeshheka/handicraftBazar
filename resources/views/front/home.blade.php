@include('layouts.landing_header')
@include('layouts.landing_nav')

<main class="main">
    <div class="home-slider-container">
        <div class="home-slider owl-carousel owl-theme owl-theme-light">

            @foreach ($banners->take(2) as $banner)
            <div class="home-slide">
                <div class="slide-bg owl-lazy" data-src="{{ url($banner->image) }}"
                    style="background-position:32% center;"></div><!-- End .slide-bg -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 offset-md-7">
                            <div class="home-slide-content slide-content-big">
                                <h1>{{ $banner->name }}</h1>
                                <h3>
                                    <span>up to </span>
                                    <strong>{{ $banner->discount }}%</strong>
                                    <span>OFF in the<br>collection</span>
                                </h3>
                                <a href="{{url('/shop')}}" class="btn btn-primary">Shop Now</a>
                            </div><!-- End .home-slide-content -->
                        </div><!-- End .col-lg-5 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .home-slide -->
            @endforeach

        </div><!-- End .home-slider -->
    </div><!-- End .home-slider-container -->

    <div class="banners-container mb-4 mb-lg-6 mb-xl-8">
        <div class="">
            <div class="row no-gutters">

                @foreach ($categories as $category)

                <div class="col-md-4">
                    <div class="banner">
                        <div class="banner-content">
                            <h3 class="banner-title">{{ $category->name }}</h3>

                            <a href="category.html" class="btn">Shop now</a>
                        </div><!-- End .banner-content -->
                        <a href="#">
                            <img src="{{ url('category_img/'.$category->image) }}" alt="banner">
                        </a>
                    </div><!-- End .banner -->
                </div><!-- End .col-md-4 -->

                @endforeach
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .banners-container -->

    <div class="container mb-2 mb-lg-4 mb-xl-5">
        <h2 class="title text-center mb-3">New Arrivals</h2>
        <div class="owl-carousel owl-theme featured-products">

            @foreach ($products->take(6) as $product)
            <div class="product">
                <figure class="product-image-container">
                    <a href="/product_details/{{ $product->id }}" class="product-image">
                        <img src="{{ url('images',$product->image) }}" alt="product">
                    </a>

                    {{-- Calculation for Discount Percentage --}}
                    <?php
                                    $spl = $product->spl_price;
                                    $pro = $product->pro_price;
                                    $discount_percent = 100 - (($pro/$spl) * 100)
                            ?>

                    {{-- round() function of PHP to round off the decimal values --}}
                    <span class="product-label label-sale">{{ round($discount_percent)  }}% OFF</span>
                </figure>
                <div class="product-details">
                    <h2 class="product-title">
                        <a href="/product_details/{{ $product->id }}">{{ $product->pro_name }}</a>
                    </h2>
                    <div class="price-box">
                        <span class="old-price">Rs. {{ $product->spl_price }}</span>
                        <span class="product-price">Rs. {{ $product->pro_price }}</span>
                    </div><!-- End .price-box -->

                    <div class="product-details-inner">
                        <div class="product-action">
                            <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="paction add-cart" title="Add to Cart">
                                <span>Add to Cart</span>
                            </a>
                            
                            <style>
                            @media screen and (min-width: 992px) {
                                #myfrom,
                                .form-footer {
                                    margin-bottom: 0 !important;
                                }
                            }
                            </style>
                            {!! Form::open(['route' => 'addToWishList', 'method' => 'post', 'id' => 'myfrom'])
                            !!}

                            <input type="hidden" value="{{$product->id}}" name="pro_id" />
                            <button type="submit" class="paction add-wishlist" title="Add to Wishlist">
                                <span>Add to Wishlist</span>
                            </button>

                            {!! Form::close() !!}
                        </div><!-- End .product-action -->
                    </div><!-- End .product-details-inner -->
                </div><!-- End .product-details -->
            </div><!-- End .product -->

            @endforeach
        </div><!-- End .featured-products -->
    </div><!-- End .container -->

    <div class="promo-section" style="background-image: url(../landing/assets/images/promo-bg.jpg)">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="promo-slider owl-carousel owl-theme owl-theme-light">
                            <div class="promo-content">
                                <h3>Up to <span>40%</span> Off<br> <strong>Special Promo</strong></h3>
                                <a href="#" class="btn btn-primary">Purchase Now</a>
                            </div><!-- Endd .promo-content -->

                            <div class="promo-content">
                                <h3>Up to <span>58%</span> Off<br> <strong>Holiday Promo</strong></h3>
                                <a href="#" class="btn btn-primary">Purchase Now</a>
                            </div><!-- Endd .promo-content -->
                        </div><!-- End .promo-slider -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .container -->
    </div><!-- End .promo-section -->

    <div class="container mb-2 mb-lg-4 mb-xl-5">
        <h2 class="title text-center mb-3">Most Viewed Products</h2>
        <div class="owl-carousel owl-theme new-products">

            <div class="product">
                <figure class="product-image-container">
                    <a href="product.html" class="product-image">
                        <img src="{{asset('landing/assets/images/products/sunglasses/product-1.jpg')}}" alt="product">
                        <img src="{{asset('landing/assets/images/products/sunglasses/product-1-2.jpg')}}"
                            class="hover-image" alt="product">
                    </a>
                </figure>
                <div class="product-details">
                    <h2 class="product-title">
                        <a href="product.html">Mens sunglss-yellow</a>
                    </h2>
                    <div class="price-box">
                        <span class="old-price">$90</span>
                        <span class="product-price">$70</span>
                    </div><!-- End .price-box -->

                    <div class="product-details-inner">
                        <div class="product-action">
                            <a href="product.html" class="paction add-cart" title="Add to Cart">
                                <span>Add to Cart</span>
                            </a>

                            <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                <span>Add to Wishlist</span>
                            </a>

                        </div><!-- End .product-action -->
                    </div><!-- End .product-details-inner -->
                </div><!-- End .product-details -->
            </div><!-- End .product -->

        </div><!-- End .featured-products -->
    </div><!-- End .container -->


    <div class="container mb-2 mb-lg-3 mb-xl-5">
        <div class="row">
            {{-- Shoes Starts Here --}}
            <div class="col-lg-6">
                <h2 class="title text-center mb-3">Shoes</h2>
                <div class="owl-carousel owl-theme new-products">

                    <div class="product">
                        <figure class="product-image-container">
                            <a href="product.html" class="product-image">
                                <img src="{{asset('landing/assets/images/products/sunglasses/product-5.jpg')}}"
                                    alt="product">
                                <img src="{{asset('landing/assets/images/products/sunglasses/product-5-2.jpg')}}"
                                    class="hover-image" alt="product">
                            </a>

                        </figure>
                        <div class="product-details">
                            <h2 class="product-title">
                                <a href="product.html">Mens sunglss</a>
                            </h2>
                            <div class="price-box">
                                <span class="product-price">$80</span>
                            </div><!-- End .price-box -->

                            <div class="product-details-inner">
                                <div class="product-action">
                                    <a href="product.html" class="paction add-cart" title="Add to Cart">
                                        <span style="padding-left: .3rem;
                                        padding-right: .3rem;
                                        font-size: 1rem;">Add to Cart</span>
                                    </a>

                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>

                                </div><!-- End .product-action -->
                            </div><!-- End .product-details-inner -->
                        </div><!-- End .product-details -->
                    </div><!-- End .product -->

                </div><!-- End .featured-products -->
            </div>
            {{-- // SHoes Ends HEre --}}

            {{-- Bags Starts Here --}}

            <div class="col-lg-6">
                <h2 class="title text-center mb-3">Bags</h2>
                <div class="owl-carousel owl-theme new-products">
                    <div class="product">
                        <figure class="product-image-container">
                            <a href="product.html" class="product-image">
                                <img src="{{asset('landing/assets/images/products/sunglasses/product-1.jpg')}}"
                                    alt="product">
                                <img src="{{asset('landing/assets/images/products/sunglasses/product-1-2.jpg')}}"
                                    class="hover-image" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h2 class="product-title">
                                <a href="product.html">Mens sunglss-yellow</a>
                            </h2>
                            <div class="price-box">
                                <span class="old-price">$90</span>
                                <span class="product-price">$70</span>
                            </div><!-- End .price-box -->

                            <div class="product-details-inner">
                                <div class="product-action">
                                    <a href="product.html" class="paction add-cart" title="Add to Cart">
                                        <span style="padding-left: .3rem;
                                        padding-right: .3rem;
                                        font-size: 1rem;">Add to Cart</span>
                                    </a>

                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span style="">Add to Wishlist</span>
                                    </a>

                                </div><!-- End .product-action -->
                            </div><!-- End .product-details-inner -->
                        </div><!-- End .product-details -->
                    </div><!-- End .product -->

                </div><!-- End .featured-products -->
            </div>
            {{-- // Ends HEre --}}
        </div>
    </div><!-- End .container -->


</main><!-- End .main -->

@include('layouts.landing_footer')