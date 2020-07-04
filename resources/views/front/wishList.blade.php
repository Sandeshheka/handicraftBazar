@include('layouts.landing_header')
@include('layouts.landing_nav')


<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Wishlist</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">Product</th>
                                <th class="price-col">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                        <h2 class="title text-center">
                                <?php if (isset($msg)) {
                                    echo $msg;
                                } else { ?> WishList Item <?php } ?>
                        </h2>

                        <?php if ($Products->isEmpty()) { ?>
                            Sorry, Wishlist empty!!!
                        <?php } else { ?>
                            {{-- yaha bata suru --}}

                            @foreach($Products as $product)

                            <tr class="product-row">
                                <td class="product-col">
                                    <figure class="product-image-container">
                                        <a href="/product_details/{{ $product->id }}" class="product-image">
                                            <img src="{{url('images',$product->image)}}" alt="product">
                                        </a>
                                    </figure>
                                    <h2 class="product-title">
                                        <a href="/product_details/{{ $product->id }}"><?php echo $product->pro_name; ?></a>
                                    </h2>
                                </td>
                                <td>Rs. <?php echo $product->pro_price; ?></td>
                            </tr>
                            <tr class="product-action-row">
                                <td colspan="4" class="clearfix">
                                    <div class="float-left">
                                        <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="paction add-cart" title="Add to Cart">
                                            <span>Add to Cart</span>
                                        </a>
                                    </div><!-- End .float-left -->

                                    <div class="float-right">
                                        <a href="{{url('/')}}/removeWishList/{{$product->id}}" title="Remove product" class="btn-remove"><span
                                                class="sr-only">Remove</span></a>
                                    </div><!-- End .float-right -->
                                </td>
                            </tr>
                            @endforeach
                            <?php } ?>

                            {{-- // yaha ma end --}}

                        </tbody>


                    </table>
                </div><!-- End .cart-table-container -->


            </div><!-- End .col-lg-8 -->

        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->






@include('layouts.landing_footer')

<!-- This jQuery to remove transparent nav as the layout has transparent background -->
<script>
    $(document).ready(function () {
        $('header.header.header-transparent').removeClass('header-transparent');
    });
</script>