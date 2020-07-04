@include('admin.includes/adminheader')
@include('admin.includes/admintopnav')
@include('admin.includes/sidenav')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Update Category</li>
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
                    Update Category
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">


                    <form action="/updatecat/{{$categorydata->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">

                <div class="form-group col-md-12">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $categorydata->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-md-12">
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('image',array('class' => 'btn-primary')) }}
                            <img src="{{url('category_img',$categorydata->image)}}" alt="" width="200px">
                        </div>

  

                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>



                </div>

            </div>
        </div>
    </div>
    <!--End .articles-->

    @include('admin.includes/adminfooter')