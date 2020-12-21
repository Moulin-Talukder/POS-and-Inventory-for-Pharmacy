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

                        <!-- toggle message -->
                        @if(session()->has('message'))
                                    <p class="alert alert-success">{{session()->get('message')}}</p>
                                    @endif

                                    @if($errors->any())
                                    @foreach($errors->all() as $er)
                                    <p class="alert alert-danger">{{$er}}</p>
                                @endforeach
                              @endif
                                                      <!-- Basic example -->
                                                      <div class="col-md-2"></div>
                                                      <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Expense
                                    <a href="{{ route('today.expense') }}" class="btn btn-sm btn-danger pull-right">Today</a>
                                    <a href="" class="btn btn-sm btn-info pull-right">This Month</a>
                                    </h3>
                                    
                                    </div>

                                 
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-today-expense/'.$tdy->id) }}" method="post">
                                        @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Expense Details</label>
                                                <textarea class="form-control" rows="4"  name="details">
                                                {{$tdy->details}}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Amount</label>
                                                <input type="text" class="form-control" name="amount" value="{{$tdy->amount}}" placeholder="Amount" required>
                                            </div>

                                            <div class="form-group">                                          
                                                <input type="hidden" class="form-control" name="date" value="{{date("d/m/y")}}">
                                            </div>
                                            <div class="form-group">                                          
                                                <input type="hidden" class="form-control" name="month" value="{{date("F")}}">
                                            </div>
                                            <div class="form-group">                                          
                                                <input type="hidden" class="form-control" name="year" value="{{date("Y")}}">
                                            </div>

                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->

                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>

@endsection