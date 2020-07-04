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
        <div class="col-md-12">
            <div class="panel panel-default articles">
                <div class="panel-heading">
                    Update Product

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                            class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    {!! Form::model($Products, ['method'=>'post', 'action'=> ['ProductsController@editProducts',
                $Products->id], 'files'=>true, 'class' => 'form-horizontal']) !!}

                <div class="form-group col-lg-12">
                    {!! Form::label('pro_name', 'Category:') !!}
                    <Select class="form-control" name="cat_id">
                    @foreach($categories as $cat)
                    Category: <option value="{{ $cat->id }}" <?php 
                            if($Products->cat_id==$cat->id) {?> selected="selected" <?php }?>>{{ ucwords($cat->name) }}
                    </option>
                    @endforeach
                </select>
                </div>
                <style>
                  .ml-15{
                    margin-left:15px !important;
                  }
                </style>


                <div class="form-group col-lg-6">
                    {!! Form::label('pro_name', 'Name:') !!}
                    {!! Form::text('pro_name', null, ['class'=>'form-control'])!!}
                </div>

                <div class="form-group col-lg-6 ml-15">
                    {!! Form::label('pro_price', 'Pro Price:') !!}
                    {!! Form::text('pro_price', null, ['class'=>'form-control'])!!}
                </div>

                <div class="form-group col-lg-6">
                    {!! Form::label('pro_code', 'Pro Code:') !!}
                    {!! Form::text('pro_code', null, ['class'=>'form-control'])!!}
                </div>

                <div class="form-group col-lg-6 ml-15">
                    {!! Form::label('spl_price', 'Spl Price:') !!}
                    {!! Form::text('spl_price', null, ['class'=>'form-control'])!!}
                </div>

                <div class="form-group col-lg-12">
                    {!! Form::label('pro_info', 'Pro Info:') !!}
                    {!! Form::text('pro_info', null, ['class'=>'form-control'])!!}
                </div>

                {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!--End .articles-->

    @include('admin.includes/adminfooter')