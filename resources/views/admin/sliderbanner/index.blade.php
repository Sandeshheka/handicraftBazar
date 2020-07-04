@include('admin.includes/adminheader')
@include('admin.includes/admintopnav')
@include('admin.includes/sidenav')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">View Product</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Product</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default articles">
                <div class="panel-heading">
                    View Product
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body articles-container" style="display: block;">
                    <!-- Datatables Here -->
                    <style>
                    #example.cell-border tr th,
                    #example.cell-border tr td {
                        padding: 10px;
                    }
                    </style>
                    
                    <table id="example" class="cell-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>DISCOUNT %</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($banners as $banner)
                            <tr>
                                <td>{{$banner->id}}</td>
                                <td><img class="card-img-top img-fluid" src="{{ url($banner->image) }}" width="50px" alt="Card image cap"></td>
                                <td>{{$banner->name}}</td>
                                <td>{{$banner->discount}}</td>
                              
                                <td>
                                  <a href="#" class="btn btn-success btn-xs">Edit</a>
                                  <a href="#" class="btn btn-xs btn-danger"> Delete</a>
                                </td>
                                
                            </tr>
                          
                          @endforeach 
                    </table>

                    <!-- // Datatables Here -->
                </div>
            </div>
            <!--End .articles-->
        </div>
      


        @include('admin.includes/adminfooter')