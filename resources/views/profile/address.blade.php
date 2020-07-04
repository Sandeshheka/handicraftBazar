@include('layouts.landing_header')
@include('layouts.landing_nav')


<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Address Book</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>My Address Book</h2>

                {!! Form::open(['url' => 'updateAddress', 'method' => 'post']) !!}
                @foreach($address_data as $value)

                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="example-text-input">Full Name</label>
                        <input class="form-control" type="text" name="fullname" value="{{$value->fullname}}">
                        <span style="color:red">{{ $errors->first('fullname') }}</span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="example-text-input">City</label>
                        <input class="form-control" type="text" name="city" value="{{$value->city}}">
                        <span style="color:red">{{ $errors->first('city') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="example-text-input">State</label>
                        <input class="form-control" type="text" name="state" value="{{$value->state}}">
                        <span style="color:red">{{ $errors->first('state') }}</span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="example-text-input">Pincode</label>
                        <input class="form-control" type="text" name="pincode" value="{{$value->pincode}}">
                        <span style="color:red">{{ $errors->first('pincode') }}</span>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="form-group col-md-12">
                        <label for="example-text-input">Country</label>
                        <input class="form-control" type="text" name="country" value="{{$value->country}}">
                        <span style="color:red">{{ $errors->first('country') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Update Address">
                </div>

                @endforeach
                {!! Form::close() !!}

                <div class="required text-right">* Required Field</div>
                <div class="form-footer">
                    <a href="/"><i class="icon-angle-double-left"></i>Back To Shopping</a>


                </div><!-- End .form-footer -->

            </div><!-- End .col-lg-9 -->

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">My Account</h3>

                    <ul class="list">
                        <li class=""><a href="{{ '/profile' }}">Account Dashboard</a></li>
                        <li class=""><a href="{{'/orders'}}">My Orders</a></li>
                        <li class="active"><a href="{{'/address'}}">My Address Book</a></li>
                        <li><a href="{{'/password'}}">Change Password</a></li>
                    </ul>
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->



@include('layouts.landing_footer')

<!-- This jQuery to remove transparent nav as the layout has transparent background -->
<script>
    $(document).ready(function () {
        $('header.header.header-transparent').removeClass('header-transparent');
    });
</script>