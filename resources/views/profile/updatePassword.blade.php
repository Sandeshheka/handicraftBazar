@include('layouts.landing_header')
@include('layouts.landing_nav')


<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Password Settings</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>Password Settings</h2>

                {!! Form::open(['url' => 'updatePassword',  'method' => 'post']) !!}

                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="example-text-input">Old Password</label>
                        <input id="oldPassword" class="form-control" type="password" name="oldPassword" required>
                        <span style="color:red">{{ $errors->first('oldPassword') }}</span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="example-text-input">New Password</label>
                        <input class="form-control" type="password" name="newPassword" id="newPassword" required>
                        <span style="color:red">{{ $errors->first('newPassword') }}</span>
                    </div>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="show-pass-checkbox">
                    <label class="custom-control-label" for="show-pass-checkbox">Change Password</label>
                </div><!-- End .custom-checkbox -->

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Update Password">
                </div>

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
                        <li class=""><a href="{{'/address'}}">My Address Book</a></li>
                        <li class="active"><a href="{{'/password'}}">Change Password</a></li>
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

{{-- Show Password Script --}}
<script>

    const togglePassword = document.getElementById('show-pass-checkbox');

    const showOrHidePassword = () => {
        const oldPassword = document.getElementById('oldPassword');
        const newPassword = document.getElementById('newPassword');
        if(oldPassword.type === 'password' && newPassword.type === 'password') {
            oldPassword.type = 'text';
            newPassword.type = 'text';
        } else {
            oldPassword.type = 'password';
            newPassword.type = 'password';
        }
    };

    togglePassword.addEventListener('change', showOrHidePassword);

</script>

{{-- // Show Password Script --}}