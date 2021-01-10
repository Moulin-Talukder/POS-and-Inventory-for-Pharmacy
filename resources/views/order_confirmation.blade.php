@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default"></div>
                                    <div class="panel-body">
                                        <div class="clearfix">    
                                         <div class="pull-right">
                                                <h4>Order Date <br>
                                                    <strong>{{$order->order_date}}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name: {{$order->name}}</strong><br>
                                                      Address: {{$order->address}}<br>
                                                      City: {{$order->city}}<br>
                                                      Phone: {{$order->phone}}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Today: </strong> {{date("l jS \of F Y")}}</p>
                                                    
                                                    @if($order->order_status == 'success')
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-success">{{$order->order_status}}</span></p>
                                                    @else
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{$order->order_status}}</span></p>
                                                    @endif
                                                    <p class="m-t-10"><strong>Order ID: </strong>{{$order->id}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php 
                                                            $sl=1;
                                                            @endphp
                                                            @foreach($order_details as $cont)
                                                            <tr>
                                                                <td>{{$sl++}}</td>
                                                                <td>{{$cont->product_name}}</td>
                                                                <td>{{$cont->product_code}}</td>
                                                                <td>{{$cont->quantity}}</td>
                                                                <td>{{$cont->unitcost}}</td>
                                                                <td>{{$cont->unitcost*$cont->quantity}}</td>
                                                            </tr>
                                                           @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;"><br>
                                        <div class="col-md-9">
                                        <h3>Payment By: {{ $order->payment_status}}</h3>
                                        <h4>Pay: {{ $order->pay}}</h4>
                                        <h4>Due: {{ $order->due}}</h4>
                                        </div>
                                            <div class="col-md-3">
                                                <p class="text-right"><b>Sub-total: {{ $order->sub_total}}</b></p>
                                                <p class="text-right">VAT: {{ $order->vat}}</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{ $order->total}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($order->order_status == 'success')
                                        @else
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="{{ URL::to('/POS-done/'.$order->id) }}" class="btn btn-primary waves-effect waves-light">Done</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>



            </div> <!-- container -->
                               
                </div> <!-- content -->

@endsection