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
                                    <li><a href="#">Norshindi Medicine Corner</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                    <div class="row">
                        
                        <!-- toggle message -->
                        @if(session()->has('message'))
                                    <p class="alert alert-success">{{session()->get('message')}}</p>
                                    @endif

                                    @if($errors->any())
                                    @foreach($errors->all() as $er)
                                    <p class="alert alert-danger">{{$er}}</p>
                                @endforeach
                              @endif

                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info"><i class="ion-ios7-cart"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{$product}}</span>
                                        Total Products
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Total Products <span class="pull-right"></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-purple"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{$order}}</span>
                                        Total Sales
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Total Sales <span class="pull-right"></span></h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-success"><i class="ion-social-usd"></i></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{$total}}</span>
                                        Total Expense
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Total Expense <span class="pull-right"></span></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{$customer}}</span>
                                        Total Users
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Total Users<span class="pull-right"></span></h5>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--2nd row-->
                            <div class="col-md-6 col-sm-6 col-lg-1">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{$employee}}</span>
                                        Total Employee
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Total Employees <span class="pull-right"></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-purple"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{$supplier}}</span>
                                        Total Supplier
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Total Supplier <span class="pull-right"></span></h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-success"><i class="ion-ios7-cart"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                       
                                    @php
                                        $cat=DB::table('orders')->where('order_status','=','pending')->count();
                                    @endphp
                                        <span class="counter">{{$cat}}</span>

                                        Pending Orders
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Pending Orders <span class="pull-right"></span></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                         
                        <!-- End row-->

                        
                      </div>


                    </div> <!-- container -->
                               
                </div> <!-- content -->
@endsection
