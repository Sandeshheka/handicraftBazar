@include('layouts.landing_header')
@include('layouts.landing_nav')

<script type="text/javascript">
    $(document).ready(function(){
        
        <?php for($i=1;$i<20;$i++) { ?>
            
            $('#upCart<?php echo $i;?>').on('change keyup', function(){
                var newqty = $('#upCart<?php echo $i;?>').val();
                var rowId = $('#rowId<?php echo $i;?>').val();
                var proId = $('#proId<?php echo $i;?>').val();

                if(newqty <=0){ 
                    alert('enter only valid quantity')
                } else {

                // start of ajax
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/cart/update');?>/'+proId,
                    data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                    success: function (response) {
                        console.log(response);
                        $('#updateDiv').html(response);
                    }
                });
                // End of Aajx
                }
            });

        <?php } ?>
    });
</script>



<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <?php if ($cartItems->isEmpty()) { ?>

<section id="cart_items">
    <div class="container">
        <div align="center" style="margin-bottom: 50px;"> <img src="{{asset('dist/img/empty-cart.png')}}" /></div>
    </div>
</section>

<?php } else { ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">Product</th>
                                <th class="price-col">Price</th>
                                <th class="qty-col">Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>



                            <?php $count =1;?>

                            @foreach($cartItems as $cartItem)

                            <tr class="product-row">
                                <td class="product-col">
                                    <figure class="product-image-container">
                                        <a href="{{url('/product_details')}}/{{$cartItem->id}}" class="product-image">
                                            <img src="{{url('images',$cartItem->options->img)}}" alt="product">
                                        </a>
                                    </figure>
                                    <h2 class="product-title">
                                        <a href="{{url('/product_details')}}/{{$cartItem->id}}">{{$cartItem->name}}</a>
                                    </h2>
                                </td>
                                <td>Rs. {{$cartItem->price}}</td>
                                <td>
                                    <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}" />
                                    <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}" />

                                    <input type="number" size="2" value="{{$cartItem->qty}}" name="qty"
                                        id="upCart<?php echo $count;?>" autocomplete="off"
                                        class="vertical-quantity form-control" MIN="1" MAX="1000">
                                </td>
                                <td>Rs. {{$cartItem->subtotal}}</td>
                            </tr>
                            <tr class="product-action-row">
                                <td colspan="4" class="clearfix">
                                    <div class="float-right">
                                        <a href="{{url('/cart/remove')}}/{{$cartItem->rowId}}" title="Remove product" class="btn-remove"><span
                                                class="sr-only">Remove</span></a>
                                    </div><!-- End .float-right -->
                                </td>
                            </tr>
                            <?php $count++;?>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- End .cart-table-container -->


            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>Summary</h3>

                    <h4>
                        <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button"
                            aria-expanded="false" aria-controls="total-estimate-section">Estimate Shipping and Tax</a>
                    </h4>

                    <div class="collapse" id="total-estimate-section">
                        <form action="#">
                            <div class="form-group form-group-sm">
                                <label>Country</label>
                                <div class="select-custom">
                                    <select class="form-control form-control-sm">
                                        <option value="USA">United States</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="China">China</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .form-group -->

                            <div class="form-group form-group-sm">
                                <label>State/Province</label>
                                <div class="select-custom">
                                    <select class="form-control form-control-sm">
                                        <option value="CA">California</option>
                                        <option value="TX">Texas</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .form-group -->

                            <div class="form-group form-group-sm">
                                <label>Zip/Postal Code</label>
                                <input type="text" class="form-control form-control-sm">
                            </div><!-- End .form-group -->
                            
                        </form>
                    </div><!-- End #total-estimate-section -->

                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>Rs. {{$cartItem->subtotal}}</td>
                            </tr>

                            <tr>
                                <td>Eco Tax</td>
                                <td>Rs. {{Cart::tax()}}</td>
                            </tr>

                            <tr>
                                <td>Shipping</td>
                                <td>FREE</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Order Total</td>
                                <td>Rs. {{$cartItem->total}}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        {{-- <a href="checkout-shipping.html" class="btn btn-block btn-sm btn-warning">UPDATE</a> --}}

                        <a href="{{url('/')}}/checkout" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>

                    </div><!-- End .checkout-methods -->
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->
<?php } ?>

@include('layouts.landing_footer')

<!-- This jQuery to remove transparent nav as the layout has transparent background -->
<script>
    $(document).ready(function () {
        $('header.header.header-transparent').removeClass('header-transparent');
    });
</script>