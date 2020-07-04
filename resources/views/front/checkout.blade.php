@include('layouts.landing_header')
@include('layouts.landing_nav')


<main class="main">
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
      </div><!-- End .container -->
  </nav>

  <div class="container">
      <ul class="checkout-progress-bar">
          <li class="active">
              <span>Shipping & Payments</span>
          </li>
          <li>
              <span>Review</span>
          </li>
      </ul>
      <div class="row">
          <div class="col-lg-8">
              <ul class="checkout-steps">
                  <li>
                      <h2 class="step-title">Shipping Address</h2>

                      <form action="{{url('/')}}/formvalidate" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group required-field">
                              <label>Display Name </label>
                              <input type="text" class="form-control" value="{{ old('firstname') }}" name="fullname" id="firstname" required>
                              <span style="color:red">{{ $errors->first('fullname') }}</span>
                          </div><!-- End .form-group -->

                          <div class="form-group required-field">
                              <label>State Name </label>
                              <input id="lastname" type="text" name="state" placeholder="State Name" value="{{ old('state') }}" class="form-control" required>
                              <span style="color:red">{{ $errors->first('state') }}</span>
                          </div><!-- End .form-group -->

                          <div class="form-group">
                              <label>Pincode </label>
                              <input id="lastname" type="text" name="pincode" placeholder="Pincode" value="{{ old('pincode') }}" class="form-control">
                              <span style="color:red">{{ $errors->first('pincode') }}</span>
                          </div><!-- End .form-group -->

                          <div class="form-group required-field">
                              <label>City  </label>
                              <input  id="lastname" type="text" name="city" placeholder="City Name" value="{{ old('city') }}" class="form-control" required>
                              <span style="color:red">{{ $errors->first('city') }}</span>
                          </div><!-- End .form-group -->

                          <div class="form-group">
                            <label>Country</label>
                            <div class="select-custom">
                                <select name="country" class="form-control">
                                    <option value="{{ old('country') }}" selected="selected">Select country</option>
                                    <option value="United States">Nepal</option>
                                    <option value="United States">United States</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="UK">UK</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Ucrane">Ucrane</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Dubai">Dubai</option>
                                </select>
                                <span style="color:red">{{ $errors->first('country') }}</span>
                            </div><!-- End .select-custom -->
                          </div><!-- End .form-group -->

                          <div class="form-group-custom-control">
                              <div class="custom-control custom-checkbox">
                                  <input required name="pay" type="checkbox" class="custom-control-input" id="Delivery-save">
                                  <label class="custom-control-label" for="Delivery-save">Cash on Delivery</label>
                              </div><!-- End .custom-checkbox -->
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="Paypal-save">
                                  @include('front.paypal')
                                  <label class="custom-control-label" for="Paypal-save"></label>
                              </div><!-- End .custom-checkbox -->
                          </div><!-- End .form-group -->
                          <button type="submit" class="btn btn-block btn-sm btn-warning">Finish</button>
                      </form>
                  </li>
              </ul>
          </div><!-- End .col-lg-8 -->

          <div class="col-lg-4">
              <div class="order-summary">
                  <h3>Summary</h3>

                  <h4>
                      <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">{{Cart::count()}} products in Cart</a>
                  </h4>

                  <div class="collapse" id="order-cart-section">
                      <table class="table table-mini-cart">
                          <tbody>
                              <?php $count =1;?>
                              @foreach($cartItems as $cartItem)
                              {!! Form::open(['url' => ['cart/update',$cartItem->rowId], 'method'=>'put']) !!}
                              <tr>
                                  <td class="product-col">
                                      <figure class="product-image-container">
                                          <a href="{{url('/product_details')}}/{{$cartItem->id}}" class="product-image">
                                              <img src="{{url('images',$cartItem->options->img)}}" alt="product">
                                          </a>
                                      </figure>
                                      <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                                      <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                                      <div>
                                          <h2 class="product-title">
                                              <a href="{{url('/product_details')}}/{{$cartItem->id}}">{{$cartItem->name}}</a>
                                          </h2>

                                          <span class="product-qty">Qty: {{$cartItem->qty}}</span>
                                      </div>
                                  </td>
                                  <td class="price-col">Rs. {{$cartItem->price}}</td>
                              </tr>
                              {!! Form::close() !!}
                              <?php $count++;?>
                              @endforeach

                          </tbody>    
                      </table>
                  </div><!-- End #order-cart-section -->
              </div><!-- End .order-summary -->

              <div class="cart-summary">
                  <h3>Summary</h3>

                  <table class="table table-totals">
                      <tbody>
                          <tr>
                              <td>Subtotal</td>
                              <td>{{Cart::subtotal()}}</td>
                          </tr>

                          <tr>
                              <td>Eco Tax</td>
                              <td>Rs. {{Cart::tax()}}</td>
                          </tr>
                      </tbody>
                      <tfoot>
                          <tr>
                              <td>Order Total</td>
                              <td>Rs. {{Cart::total()}}</td>
                          </tr>
                      </tfoot>
                  </table>

              </div><!-- End .cart-summary -->
          </div><!-- End .col-lg-4 --> 
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