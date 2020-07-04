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
        <div class="col-md-12">
            <div class="panel panel-default articles">
                <div class="panel-heading">
                    Add Product
                    <style>
                        .ml-15{
                            margin-left:15px !important;
                        }
                    </style>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
                    <div class="row">
                    <div class="form col-md-6">
                        {{ Form::label('Proname', 'Name') }}
                        {{ Form::text('pro_name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                    </div>

                    <div class="form col-md-6">
                        {{ Form::label('Code', 'Code') }}
                        {{ Form::text('pro_code', null, array('class' => 'form-control')) }}
                    </div>
                    </div>

                    <div class="row">
                    <div class="form col-md-6">
                        {{ Form::label('stock', 'stock') }}
                        {{ Form::text('stock', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form col-md-6">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('pro_price', null, array('class' => 'form-control')) }}
                    </div>
                    </div>

                    <div class="row">
                    <div class="form col-md-6">
                        {{ Form::label('Description', 'Description') }}
                        {{ Form::text('pro_info', null, array('class' => 'form-control')) }}
                    </div>
                        
                    <div class="form col-md-6">
                        {{ Form::label('Sale Price', 'Sale Price') }}
                        {{ Form::text('spl_price', null, array('class' => 'form-control')) }}
                    </div>
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::label('category_id', 'Categories') }}
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
                    </div>
                
                    <div class="form-group col-md-12">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image',array('class' => 'btn-primary')) }}
                    </div>

             
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
             
   {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!--End .articles-->

    @include('admin.includes/adminfooter')