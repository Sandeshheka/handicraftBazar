<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{auth::user()->name}}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <!-- Dashboard -->
        <li class="active"><a href="/home"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

        <!-- Category Mgmt -->
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Category <span data-toggle="collapse" href="#sub-item-1"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="{{ route('category.index')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span>View/Add Category
                    </a></li>
            </ul>
        </li>

        <!-- Products Mgmt -->
        <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-archive">&nbsp;</em> Product <span data-toggle="collapse" href="#sub-item-2"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li><a class="" href="{{route('product.create')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span>Add Product
                    </a></li>
                <li><a class="" href="{{route('product.index')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span>View Product
                    </a></li>
            </ul>
        </li>

        <!-- Media Mgmt -->
        <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
                <em class="fa fa-image">&nbsp;</em> Media <span data-toggle="collapse" href="#sub-item-4"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-4">
                <li><a class="" href="{{route('addBanner')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span>Add Slider Banner
                    </a></li>
                <li><a class="" href="{{route('showBanner')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span>View Slider Banner
                    </a></li>
            </ul>
        </li>



        <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
    </ul>
</div>
<!--/.sidebar-->