@include('admin.includes/adminheader')
@include('admin.includes/admintopnav')
@include('admin.includes/sidenav')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Add Category</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add/View Category</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default articles">
                <div class="panel-heading">
                    Latest News

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body articles-container" style="display: block;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="/catupdate/{{$category->id}}" class="btn btn-xs btn-warning"> Update</a>
                                    <a href="/delete/{{$category->id}}" class="btn btn-xs btn-danger"> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--End .articles-->
        </div>

        <div class="col-md-6">
            <div class="panel panel-default articles">
                <div class="panel-heading">
                    Add Category

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'category.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) !!}
                    
                    <div class="form-group col-md-12">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image',array('class' => 'btn-primary')) }}
                    </div>

                    <button type="submit" class="btn btn-primary">Add Category</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!--End .articles-->

    @include('admin.includes/adminfooter')