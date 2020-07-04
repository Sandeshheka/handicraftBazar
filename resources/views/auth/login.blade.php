@include('layouts.landing_header')
@include('layouts.landing_nav')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <h2 class="light-title">Log <strong>In</strong></h2>

                <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="form-group required-field">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                            required autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div><!-- End .form-group -->

                    <div class="form-group required-field">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div><!-- End .form-group -->

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div><!-- End .form-footer -->
                </form>
            </div><!-- End .col-md-8 -->

            <div class="col-md-4">
                <h2 class="light-title">Contact <strong>Details</strong></h2>

                <div class="contact-info">
                    <div>
                        <i class="icon-phone"></i>
                        <p><a href="tel:+9779860330364">+977 9860 330 364</a></p>
                        <p><a href="tel:+9779860330364">+977 9860 330 364</a></p>
                    </div>
                    <div>
                        <i class="icon-mobile"></i>
                        <p><a href="tel:+977 9860 330 364">+977 9860 330 364></a></p>
                        <p><a href="tel:+977 9860 330 364">+977 9860 330 364</a></p>
                    </div>
                    <div>
                        <i class="icon-mail-alt"></i>
                        <p><a href="mailto:#">sandesh@gmail.com</a></p>
                        <p><a href="mailto:#">sandesh@stylustechnepal.com</a></p>
                    </div>
                    <div>
                        <i class="icon-skype"></i>
                        <p>hekka_sandesh</p>
                        <p>sandesh_hekka</p>
                    </div>
                </div><!-- End .contact-info -->
            </div><!-- End .col-md-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-8"></div><!-- margin -->
</main><!-- End .main -->
@include('layouts.landing_footer')

<!-- This jQuery to remove transparent nav as the layout has transparent background -->
<script>
    $(document).ready(function () {
        $('header.header.header-transparent').removeClass('header-transparent');
    });
</script>