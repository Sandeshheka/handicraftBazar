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
                                <th>Name</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Category</th>
                                <!-- <th>Sales</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count =1;?>
                          @foreach($Products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="50px" alt="Card image cap"></td>
                                <td>{{$product->pro_name}}</td>
                                <td>{{$product->pro_code}}</td>
                                <td>{{$product->pro_price}}</td>
                                <td>{{$product->category_id}}</td>
                                <!-- <td>
                                <div id="checkSale<?php echo $count;?>"> 
                                  <input type="checkbox" id="onSale<?php echo $count;?>"> Yes 
                                </div>
                                <div id="amountDiv<?php echo $count;?>"> 
                                  <input type="hidden" id="pro_id<?php echo $count;?>" value="{{$product->id}}"/> 
                                  <input type="checkbox" id="noSale<?php echo $count;?>"> No
                                  <br>
                                  <input type="text" class="form-control" id="spl_price<?php echo $count;?>" size="12" placeholder="Sale Price"/>
                                  <button id="saveAmount<?php echo $count;?>" class="btn btn-success btn-xs">Save Amount</button> 
                                </div>
                                </td> -->
                                <td>
                                  <a href="{{route('ProductEditForm',$product->id)}}" class="btn btn-success btn-xs">Edit</a>
                                  <a href="/deletepro/{{$product->id}}" class="btn btn-xs btn-danger"> Delete</a>
                                </td>
                                
                            </tr>
                            <?php $count++;?> 
                          @endforeach 
                    </table>

                    <!-- // Datatables Here -->
                </div>
            </div>
            <!--End .articles-->
        </div>
        <script>
                      $(document).ready(function () {


                        <?php for($i=1;$i<60;$i++){?>
                        // start loop
                        $('#amountDiv<?php echo $i;?>').hide();
                        $('#checkSale<?php echo $i;?>').show();
                        $('#onSale<?php echo $i;?>').click(
                          function () { // run when admin need to add amount for sale
                            $('#amountDiv<?php echo $i;?>').show();
                            $('#checkSale<?php echo $i;?>').hide();
                            $('#saveAmount<?php echo $i;?>').click(function () {
                              var salePrice<?php echo $i;?> = $('#spl_price<?php echo $i;?>')
                                .val();
                              var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
                              $.ajax({
                                type: 'get',
                                dataType: 'html',
                                url: '<?php echo url('/admin/addSale');?>',
                                data: "salePrice=" + salePrice<?php echo $i;?> +
                                  "& pro_id=" + pro_id<?php echo $i;?>,
                                success: function (response) {
                                  console.log(response);
                                }
                              });
                            });
                          });
                        $('#noSale<?php echo $i;?>').click(function () { // this when admin dnt need sale
                          $('#amountDiv<?php echo $i;?>').hide();
                          $('#checkSale<?php echo $i;?>').show();

                        });
                        //end loop
                        <?php }?>
                      }); 
                    </script>


        @include('admin.includes/adminfooter')