@include('layouts.landing_header')
@include('layouts.landing_nav')

<main class="main">
  <div class="page-header" style="background-image: url(../../../landing/assets/images/page-header-bg.jpg)">
    <div class="container">
      <h1>About Us</h1>
    </div><!-- End .container -->
  </div><!-- End .page-header -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
      </ol>
    </div><!-- End .container -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="heading text-center mb-4">
          <h2 class="title mb-3">Who we are</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat.</p>
        </div><!-- End .heading -->
      </div><!-- End .col-lg-8 -->
    </div><!-- End .row -->

    <img src="{{ asset('landing/assets/images/about/img-1.jpg') }}" alt="about image" width="1170" height="413">

    <div class="mb-4 mb-md-5"></div><!-- margin -->

    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
        <div class="row">
          <div class="col-sm-4 count-container text-center">
            <div class="count-wrapper">
              <span class="count" data-from="0" data-to="50" data-speed="2000" data-refresh-interval="50">50</span>+
            </div><!-- End .count-wrapper -->
            <h4 class="count-title">Handicraft Brands</h4>
          </div><!-- End .col-sm-4 -->
          <div class="col-sm-4 count-container text-center">
            <div class="count-wrapper">
              <span class="count" data-from="0" data-to="150" data-speed="2000" data-refresh-interval="50">150</span>K+
            </div><!-- End .count-wrapper -->
            <h4 class="count-title">Handicraft Products</h4>
          </div><!-- End .col-sm-4 -->
          <div class="col-sm-4 count-container text-center">
            <div class="count-wrapper">
              <span class="count" data-from="0" data-to="250" data-speed="2000" data-refresh-interval="50">250</span>K+
            </div><!-- End .count-wrapper -->
            <h4 class="count-title">Regular Buyers</h4>
          </div><!-- End .col-sm-4 -->
        </div><!-- End .row -->
      </div><!-- End .col-lg-6 -->
    </div><!-- End .row -->

    <div class="mb-2 mb-lg-5"></div><!-- margin -->
  </div><!-- End .container -->

  <div class="history-section">
    <div class="container">
      <h2 class="title text-center mb-3">Our History</h2>

      <div class="row align-items-md-stretch">
        <div class="col-lg-2 order-lg-2">
          <ul class="nav nav-history" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="2016-tab" data-toggle="tab" href="#date-2016" role="tab"
                aria-controls="date-2016" aria-selected="true">2016</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="2014-tab" data-toggle="tab" href="#date-2014" role="tab" aria-controls="date-2014"
                aria-selected="false">2014</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="2012-tab" data-toggle="tab" href="#date-2012" role="tab" aria-controls="date-2012"
                aria-selected="false">2012</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="2010-tab" data-toggle="tab" href="#date-2010" role="tab" aria-controls="date-2010"
                aria-selected="false">2010</a>
            </li>
          </ul>
        </div><!-- End .col-lg-2 -->

        <div class="col-lg-10">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="date-2016" role="tabpanel" aria-labelledby="2016-tab">
              <div class="row align-items-md-center">
                <div class="col-md-4">
                  <img src="{{ asset('landing/assets/images/about/img-2.jpg') }}" alt="image">
                </div><!-- End .col-md-4 -->

                <div class="col-md-8">
                  <h3>2016</h3>
                  <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat.</p>
                </div><!-- End .col-md-8 -->
              </div><!-- End .row -->
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="date-2014" role="tabpanel" aria-labelledby="2014-tab">
              <div class="row align-items-md-center">
                <div class="col-md-8">
                  <h3>2014</h3>
                  <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat.</p>
                </div><!-- End .col-md-8 -->

                <div class="col-md-4">
                  <img src="{{ asset('landing/assets/images/about/img-2.jpg') }}" alt="image">
                </div><!-- End .col-md-4 -->
              </div><!-- End .row -->
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="date-2012" role="tabpanel" aria-labelledby="2012-tab">
              <div class="row align-items-md-center">
                <div class="col-md-4">
                  <img src="{{ asset('landing/assets/images/about/img-2.jpg') }}" alt="image">
                </div><!-- End .col-md-4 -->

                <div class="col-md-8">
                  <h3>2012</h3>
                  <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat.</p>
                </div><!-- End .col-md-8 -->
              </div><!-- End .row -->
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="date-2010" role="tabpanel" aria-labelledby="2010-tab">
              <div class="row align-items-md-center">
                <div class="col-md-8">
                  <h3>2014</h3>
                  <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat.</p>
                </div><!-- End .col-md-8 -->

                <div class="col-md-4">
                  <img src="{{ asset('landing/assets/images/about/img-2.jpg') }}" alt="image">
                </div><!-- End .col-md-4 -->
              </div><!-- End .row -->
            </div><!-- End .tab-pane -->
          </div><!-- End .tab-content -->
        </div><!-- End .col-lg-10 -->
      </div><!-- End .row -->
    </div><!-- End .container -->
  </div><!-- End .history-section -->
</main><!-- End .main -->
@include('layouts.landing_footer')