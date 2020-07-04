@include('layouts.landing_header')
@include('layouts.landing_nav')


<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>Account Information</h2>
                


                  <div class="form-group required-field">
                        <label for="acc-email">Name</label>
                        <input disabled type="text" class="form-control" value="{{ucwords(Auth::user()->name)}}" id="acc-email" name="acc-email" required>
                    </div><!-- End .form-group -->

                  <div class="form-group required-field">
                        <label for="acc-email">Email</label>
                        <input type="email" disabled class="form-control" value="{{ucwords(Auth::user()->email)}}" id="acc-email" name="acc-email" required>
                    </div><!-- End .form-group -->


                    <div class="mb-2"></div><!-- margin -->

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="change-pass-checkbox" value="1">
                        <label class="custom-control-label" for="change-pass-checkbox">Change Password</label>
                    </div><!-- End .custom-checkbox -->

                    <div id="account-chage-pass">
                        <h3 class="mb-2">Change Password</h3>
                        {!! Form::open(['url' => 'updatePassword',  'method' => 'post']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-pass2">Current Password</label>
                                    <input type="password" class="form-control" id="acc-pass2"  name="oldPassword">
                                    <span style="color:red">{{ $errors->first('old_password') }}</span>
                                </div><!-- End .form-group -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-pass3">New Password</label>
                                    <input type="password" class="form-control" id="acc-pass3" name="newPassword">
                                    <span style="color:red">{{ $errors->first('newPassword') }}</span>
                                </div><!-- End .form-group -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                        <div class="form-footer-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        {!! Form::close() !!}
                    </div><!-- End #account-chage-pass -->

                    <div class="required text-right">* Required Field</div>
                    <div class="form-footer">
                        <a href="/"><i class="icon-angle-double-left"></i>Back To Shopping</a>

                        
                    </div><!-- End .form-footer -->
           
            </div><!-- End .col-lg-9 -->

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">My Account</h3>

                    <ul class="list">
                        <li class="active"><a href="{{ '/profile' }}">Account Dashboard</a></li>
                        <li class=""><a href="{{'/orders'}}">My Orders</a></li>
                        <li><a href="{{'/address'}}">My Address Book</a></li>
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