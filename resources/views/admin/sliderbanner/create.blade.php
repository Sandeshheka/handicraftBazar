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
            {!! Form::open(['route' => 'createBanner', 'method' => 'post', 'files' => true, 'class' =>
            'form-horizontal']) !!}
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default articles">
                        <div class="panel-heading">
                            Add Slider Image 1
                            <style>
                                .ml-15 {
                                    margin-left: 15px !important;
                                }
                            </style>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                    class="fa fa-toggle-up"></em></span></div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="form col-md-6">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                                </div>
                                <div class="form col-md-6">
                                    {{ Form::label('discount', 'Discount') }}
                                    {{ Form::text('discount', null, array('class' => 'form-control')) }}
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                {{ Form::label('image', 'Image') }}
                                {{ Form::file('image',array('class' => 'btn-primary')) }}
                            </div>

                        </div>
                    </div>
                </div> <!-- COl ENDS HERE -->


                <div class="col-lg-6">
                    <div class="panel panel-default articles">
                        <div class="panel-heading">
                            Add Slider Image 2
                            <style>
                                .ml-15 {
                                    margin-left: 15px !important;
                                }
                            </style>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                    class="fa fa-toggle-up"></em></span></div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="form col-md-6">
                                    {{ Form::label('name2', 'Name') }}
                                    {{ Form::text('name2', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                                </div>
                                <div class="form col-md-6">
                                    {{ Form::label('discount2', 'Discount') }}
                                    {{ Form::text('discount2', null, array('class' => 'form-control')) }}
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                {{ Form::label('image2', 'Image') }}
                                {{ Form::file('image2',array('class' => 'btn-primary')) }}
                            </div>
                        </div>
                        
                    </div>
                </div> <!-- COl ENDS HERE -->
                <div class="col-lg-12">
                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                </div>
            </div> <!-- // ROW ENDS HERE -->
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!--End .articles-->

@include('admin.includes/adminfooter')