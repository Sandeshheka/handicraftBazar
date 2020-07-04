<header class="header header-transparent">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <a href="/" class="logo">
                            <img src="{{asset('landing/assets/images/logo.png')}}" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="row header-row header-row-top">
                            <div class="header-dropdown dropdown-expanded">
                                <a href="#">Links</a>
                                <div class="header-menu">
                                    <ul>
                                        @if (Auth::user())
                                            <li><a href="{{'/profile'}}">MY ACCOUNT </a></li>
                                            <li><a href="{{url('/WishList')}}">MY WISHLIST </a></li>
                                            <li><a href="{{url('/logout')}}">Logout </a></li>
                                        @endif
                                        @if (!Auth::user())
                                            <li><a href="{{ route('login') }}">SIGN IN</a></li>
                                            <li><a href="{{ route('register') }}">REGISTER</a></li>
                                        @endif
                                    </ul>
                                </div><!-- End .header-menu -->
                            </div><!-- End .header-dropown -->
                            <div class="header-search">
                                <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                                <div class="header-search-wrapper">
                                    <form action="{{('/search')}}" method="post">
                                        <input type="text" class="form-control" name="site_search" id="q" placeholder="Search..." required>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control mr-2" placeholder="Search">
                                        <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div><!-- End .header-search-wrapper -->
                            </div><!-- End .header-search -->
                        </div><!-- End .header-row -->

                        <div class="row header-row header-row-bottom">
                            <nav class="main-nav">
                                <ul class="menu sf-arrows">
                                    <li class="active"><a href="/">Home</a></li>
                                    <li ><a href="{{url('/shop')}}">Shop</a></li>
                                    <li ><a href="{{url('/contact')}}">Contact</a></li>
                                   
                                    <li class="megamenu-container">
                                        <a href="product.html" class="sf-with-ul">Products</a>
                                        <div class="megamenu">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="menu-title">
                                                                <a href="#">Variations</a>
                                                            </div>
                                                            <ul>
                                                                <li><a href="product.html">Horizontal Thumbnails</a></li>
                                                                <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                                                <li><a href="product.html">Inner Zoom</a></li>
                                                                <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                                                <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                                            </ul>
                                                        </div><!-- End .col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="menu-title">
                                                                <a href="#">Variations</a>
                                                            </div>
                                                            <ul>
                                                                <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                                                <li><a href="product-simple.html">Simple Product</a></li>
                                                                <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                                            </ul>
                                                        </div><!-- End .col-lg-4 -->
                                                        <div class="col-lg-4">
                                                            <div class="menu-title">
                                                                <a href="#">Product Layout Types</a>
                                                            </div>
                                                            <ul>
                                                                <li><a href="product.html">Default Layout</a></li>
                                                                <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                                                <li><a href="product-full-width.html">Full Width Layout</a></li>
                                                                <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                                                <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                                                <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                                            </ul>
                                                        </div><!-- End .col-lg-4 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .col-lg-8 -->
                                                <div class="col-lg-4">
                                                    <div class="banner">
                                                        <a href="#">
                                                            <img class="product-promo" src="{{asset('landing/assets/images/menu-banner.jpg')}}" alt="Menu banner">
                                                        </a>
                                                    </div><!-- End .banner -->
                                                </div><!-- End .col-lg-4 -->
                                            </div>
                                        </div><!-- End .megamenu -->
                                    </li>
                                    
                                    <li><a href="#" class="sf-with-ul">Categoris</a>
                                        <ul>
                                            <?php  $cats = DB::table('categories')->get(); ?>
                                            @foreach($cats as $cat)
                                            <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @if (Auth::user())
                                    <li><a href="#" class="sf-with-ul">My Orders Details</a>
                                        <ul>

                                            <li><a href="{{'/orders'}}">My Orders</a></li>
                                            <li><a href="{{'/address'}}">My Address</a></li>
                                            <li><a href="{{url('/password')}}">Change Password</a></li>

                                        </ul>
                                    </li>
                                    @else
                                        
                                    @endif
                                    
                                </ul>
                            </nav>
                        
                            <button class="mobile-menu-toggler" type="button">
                                <i class="icon-menu"></i>
                            </button>

                            <div class="header-dropdowns">
                                <div class="header-dropdown">
                                    <a href="#">NRS</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">AUS</a></li>
                                            <li><a href="#">USD</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropown -->
                            </div><!-- End .header-dropdowns -->

                            <div class="dropdown cart-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <span class="dropdown-cart-icon">
                                        <span class="cart-count">{{Cart::count()}}</span>
                                    </span>
                                    <span class="dropdown-cart-text">Items</span>
                                </a>

                                <div class="dropdown-menu" >
                                    <div class="dropdownmenu-wrapper">
                                        <div class="dropdown-cart-products">
                                            {{-- Cart ko kaam yaha bata suru bhayeko chha hai hekka pekka --}}
                                            <?php $cartItems = Cart::content();?>

                                            @foreach($cartItems as $cartItem)

                                            <div class="product">
                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="{{url('images',$cartItem->options->img)}}" alt="product">
                                                    </a>
                                                </figure>

                                                <div class="product-details">
                                                    <h4 class="product-title">
                                                        <a href="product.html">{{$cartItem->name}}</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty">{{$cartItem->qty}}</span>
                                                        x {{$cartItem->price}}
                                                    </span>
                                                </div><!-- End .product-details -->

                                                <a href="{{url('/cart/remove')}}/{{$cartItem->rowId}}" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                            </div><!-- End .product -->

                                            @endforeach

                                            {{-- // Cart ko kaam yaha sakkeko chha hai hekka pekka --}}

                                            
                                        </div><!-- End .cart-product -->

                                        <div class="dropdown-cart-total">
                                            <span>SubTotal:</span>

                                            <span class="cart-total-price">Rs. {{Cart::total()}}</span>
                                        </div><!-- End .dropdown-cart-total -->

                                        <div class="dropdown-cart-action">
                                            <a href="{{url('/cart')}}" class="btn btn-primary">View Cart</a>
                                            <a href="{{url('/')}}/checkout" class="btn btn-outline-primary">Checkout</a>
                                        </div><!-- End .dropdown-cart-total -->
                                    </div><!-- End .dropdownmenu-wrapper -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .dropdown -->
                        </div><!-- End .header-row -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->