@include('layouts.landing_header')
@include('layouts.landing_nav')

<main class="main">
  <div class="page-header align-items-end" style="background-image: url(../landing/assets/images/page-header-bg-2.jpg)">
    <div class="container">
      <img src="{{ asset('landing/assets/images/page-header-img.png') }}" alt="image">
    </div><!-- End .container -->
  </div><!-- End .page-header -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav mb-4">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Items</li>
      </ol>
    </div><!-- End .container -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <nav class="toolbox">
          <div class="toolbox-left">
            <div class="toolbox-item toolbox-sort">
              <label>Sort By:</label>

              <div class="select-custom">
                <select name="orderby" class="form-control">
                  <option value="menu_order" selected="selected">Default sorting</option>
                  <option value="popularity">Sort by popularity</option>
                  <option value="rating">Sort by average rating</option>
                  <option value="date">Sort by newness</option>
                  <option value="price">Sort by price: low to high</option>
                  <option value="price-desc">Sort by price: high to low</option>
                </select>
              </div><!-- End .select-custom -->

              <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending
                  Direction</span></a>
            </div><!-- End .toolbox-item -->
          </div><!-- End .toolbox-left -->
        </nav>

        <div class="row row-sm">

          @foreach($products as $product)
          <div class="col-6 col-md-4">
            <div class="product">
              <figure class="product-image-container">
                <a href="{{url('/product_details')}}/{{$product->id}}" class="product-image">
                  <img src="{{url('images',$product->image)}}" alt="product">
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
                  <a href="{{url('/product_details')}}/{{$product->id}}">{{$product->pro_name}}</a>
                </h2>
                <div class="price-box">
                  <span class="old-price">Rs. {{ $product->spl_price }}</span>
                  <span class="product-price">Rs. {{ $product->pro_price }}</span>
                </div><!-- End .price-box -->

                <div class="product-details-inner">
                  <div class="product-action">
                    <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="paction add-cart"
                      title="Add to Cart">
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
          </div><!-- End .col-md-4 -->
          @endforeach


        </div><!-- End .row -->
      </div><!-- End .col-lg-9 -->

      <aside class="sidebar-shop col-lg-3 order-lg-first">
        <div class="sidebar-wrapper">

          <div class="widget">
            <h3 class="widget-title">
              <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true"
                aria-controls="widget-body-4">Categories</a>
            </h3>

            <div class="collapse show" id="widget-body-4">
              <div class="widget-body">
                <ul class="cat-list">
                  <?php  $cats = DB::table('categories')->get(); ?>
                  @foreach($cats as $cat)
                  <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}<span></span></a></li>
                  @endforeach
                </ul>
              </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
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
                        <a href="{{url('/product_details')}}/{{$p->pro_id}}">{{$p->pro_name}}</a>
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
                        <a href="{{url('/product_details')}}/{{$p->pro_id}}">{{$p->pro_name}}</a>
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

        </div><!-- End .sidebar-wrapper -->
      </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->
  </div><!-- End .container -->

  <div class="mb-3"></div><!-- margin -->
</main><!-- End .main -->

@include('layouts.landing_footer')