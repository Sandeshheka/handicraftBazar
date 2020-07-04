@include('layouts.landing_header')
@include('layouts.landing_nav')


<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Electronics</a></li>
                <li class="breadcrumb-item active" aria-current="page">Headsets</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="product-single-container product-single-default">
                    <div class="row">
                        @foreach ($Products as $product)

                        <div class="col-lg-7 col-md-6 product-single-gallery">
                            <div class="product-slider-container product-item">
                                <div class="product-single-carousel owl-carousel owl-theme">
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{ url('images',$product->image) }}"
                                            data-zoom-image="{{ url('images',$product->image) }}" />
                                    </div>
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>
                        </div><!-- End .col-lg-7 -->


                        <div class="col-lg-5 col-md-6">
                            <div class="product-single-details">
                                <h1 class="product-title">{{ ucwords($product->pro_name) }}</h1>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->

                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    {{-- Check wheter the selling price is available or not --}}
                                    @if ($product->spl_price == 0 || $product->spl_price == null)
                                    <span class="product-price">Rs.{{ $product->spl_price }}</span>
                                    @else
                                    <span class="old-price">Rs.{{ $product->pro_price }}</span>
                                    <span class="product-price">Rs.{{ $product->spl_price }}</span>
                                    @endif

                                </div><!-- End .price-box -->

                                <div class="product-desc">
                                    <p>{{ $product->pro_info }}</p>
                                </div><!-- End .product-desc -->

                                <div class="product-filters-container">
                                    <div class="product-single-filter">
                                        <label>Colors:</label>
                                        <ul class="config-swatch-list">
                                            <li class="active">
                                                <a href="#" style="background-color: #6085a5;"></a>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #ab6e6e;"></a>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #b19970;"></a>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #11426b;"></a>
                                            </li>
                                        </ul>
                                    </div><!-- End .product-single-filter -->
                                </div><!-- End .product-filters-container -->

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

                                <div class="product-action product-all-icons">
                                    <div class="product-single-qty">
                                        <input class="horizontal-quantity form-control" type="text">
                                    </div><!-- End .product-single-qty -->

                                    <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="paction add-cart" title="Add to Cart">
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

                            </div><!-- End .product-single-details -->
                        </div><!-- End .col-lg-5 -->

                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .product-single-container -->

                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                                href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                                role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab"
                                href="#product-reviews-content" role="tab" aria-controls="product-reviews-content"
                                aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                            aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                {{ $product->pro_info }}
                            </div><!-- End .product-desc-content -->
                        </div><!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-tags-content" role="tabpanel"
                            aria-labelledby="product-tab-tags">
                            <div class="product-tags-content">
                                <form action="#">
                                    <h4>Add Your Tags:</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" required>
                                        <input type="submit" class="btn btn-primary" value="Add Tags">
                                    </div><!-- End .form-group -->
                                </form>
                                <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                            </div><!-- End .product-tags-content -->
                        </div><!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                            aria-labelledby="product-tab-reviews">
                            <div class="product-reviews-content">


                                <div class="add-product-review">
                                    <?php $reviews = DB::table('reviews')->get(); ?>
                                    @foreach($reviews as $review)
                                    <ul>
                                        <li><a><i class="fa fa-user"> : </i>{{$review->person_name}}</a></li>
                                        <li><a><i class="fa fa-clock-o"> :
                                                </i>{{date('H: i', strtotime($review->created_at))}}</a></li>
                                        <li><a><i class="fa fa-calendar-o"> :
                                                </i>{{date('F j, Y', strtotime($review->created_at))}}</a></li>
                                        <li><a><i class="fa fa-envelope"></i>
                                                {{$review->review_content}}
                                            </a></li>
                                    </ul>
                                    <hr>
                                    @endforeach
                                    <h3 class="text-uppercase heading-text-color font-weight-semibold">WRITE YOUR OWN
                                        REVIEW</h3>

                                    <form action="{{url('/addReview')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Nickname <span class="required">*</span></label>
                                            <input type="text" name="person_name" class="form-control form-control-sm"
                                                required>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" name="person_email" class="form-control form-control-sm"
                                                required>
                                        </div><!-- End .form-group -->
                                        <div class="form-group mb-2">
                                            <label>Review <span class="required">*</span></label>
                                            <textarea cols="5" name="review_content" rows="6"
                                                class="form-control form-control-sm"></textarea>
                                        </div><!-- End .form-group -->

                                        <input type="submit" class="btn btn-primary" value="Submit Review">
                                    </form>
                                </div><!-- End .add-product-review -->
                            </div><!-- End .product-reviews-content -->
                        </div><!-- End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-single-tabs -->

            </div><!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
            <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget widget-info">
                        <ul>
                            <li>
                                <i class="icon-shipping"></i>
                                <h4>FREE<br>SHIPPING</h4>
                            </li>
                            <li>
                                <i class="icon-us-dollar"></i>
                                <h4>100% MONEY<br>BACK GUARANTEE</h4>
                            </li>
                            <li>
                                <i class="icon-online-support"></i>
                                <h4>ONLINE<br>SUPPORT 24/7</h4>
                            </li>
                        </ul>
                    </div><!-- End .widget -->

                    <div class="widget widget-featured">
                        <h3 class="widget-title">Recommended Products</h3>
                        
{{-- Do not touch this Hekka Pekka --}}
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
                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                                <div class="featured-col">
                                    @foreach ($products1 as $p)
                                    <div class="product product-sm">
                                        <figure class="product-image-container">
                                            <a href="{{url('/product_details')}}/{{$p->pro_id}}" class="product-image">
                                                <img src="{{url('images',$p->image)}}" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a
                                                    href="{{url('/product_details')}}/{{$p->pro_id}}">{{$p->pro_name}}</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">Rs. {{$p->pro_price}}</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div><!-- End .product -->
                                    @endforeach


                                </div><!-- End .featured-col -->

                                <div class="featured-col">

                                    @foreach ($products2 as $p)
                                    <div class="product product-sm">
                                        <figure class="product-image-container">
                                            <a href="{{url('/product_details')}}/{{$p->pro_id}}" class="product-image">
                                                <img src="{{url('images',$p->image)}}" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a
                                                    href="{{url('/product_details')}}/{{$p->pro_id}}">{{$p->pro_name}}</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">Rs. {{$p->pro_price}}</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div><!-- End .product -->
                                    @endforeach

                                </div><!-- End .featured-col -->
                            </div><!-- End .widget-featured-slider -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .widget -->
                </div>
            </aside><!-- End .col-md-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="featured-section">
        <div class="container">
            <h2 class="carousel-title">Featured Products</h2>

            @include('front.recommends')
        </div><!-- End .container -->
    </div><!-- End .featured-section -->
</main><!-- End .main -->



@include('layouts.landing_footer')

<!-- This jQuery to remove transparent nav as the layout has transparent background -->
<script>
    $(document).ready(function () {
        $('header.header.header-transparent').removeClass('header-transparent');
    });
</script>