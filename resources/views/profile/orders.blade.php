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
                <div class="cart-table-container">
                        <h3 class="widget-title">All Orders Lists</h3>
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">Date</th>
                                <th class="">Product</th>
                                <th class="">Product Code</th>
                                <th class="price-col">Order Total</th>
                                <th class="qty-col">Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($orders as $order)
                            <tr class="product-row">

                                <td>{{$order->created_at}}</td>
                                <td>{{ucwords($order->pro_name)}}</td>
                                <td>{{$order->pro_code}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->status}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- End .cart-table-container -->
            </div><!-- End .col-lg-9 -->

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">My Account</h3>

                    <ul class="list">
                        <li class=""><a href="{{ '/profile' }}">Account Dashboard</a></li>
                        <li class="active"><a href="{{'/orders'}}">My Orders</a></li>
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