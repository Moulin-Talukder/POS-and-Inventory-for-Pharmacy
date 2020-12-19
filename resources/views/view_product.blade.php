@extends('layouts.app')

@section('content')

<!-- Start content -->
                <div class="content-page">
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">


                                                      <!-- Basic example -->
                                                      <div class="col-md-2"></div>
                                                      <div class="col-md-8">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title text-white">View Product</h3></div>
                                    <div class="panel-body">

                                    
                                            <div class="form-group">
                                            <img style="height: 80px; width: 80px;" src="{{ URL::to($single->product_image)}}" />
                                            <label for="exampleInputPassword1"></label>
                                            
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <p>{{$single->product_name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <p>{{$single->product_code}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                <p>{{$single->cat_name}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Supplier</label>
                                                <p>{{$single->name}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Godawn</label>
                                                <p>{{$single->product_garage}}</p>                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                <p>{{$single->product_route}}</p>                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Date</label>
                                                <p>{{$single->buy_date}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Expire Date</label>
                                                <p>{{$single->expire_date}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Price</label>
                                                <p>{{$single->buying_price}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Selling Price</label>
                                                <p>{{$single->selling_price}}</p>
                                            </div>

                                            

                                            
                                            
                                        
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->

                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
            
@endsection