@include('layouts.landing_header')
@include('layouts.landing_nav')


<main class="main">
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout Success</li>
          </ol>
      </div><!-- End .container -->
  </nav>

  <div class="container">
      <ul class="checkout-progress-bar">
          <li class="">
              <span>Shipping & Payments</span>
          </li>
          <li class="active">
              <span>Checkout Success</span>
          </li>
      </ul>

      <div class="row">
          <div class="col-lg-12">
                <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Order Successfully Done.</h3>
          </div>
      </div>
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