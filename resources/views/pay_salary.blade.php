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
                        @if(session()->has('error'))
                                    <p class="alert alert-danger">{{session()->get('error')}}</p>
                                    @endif

                                    @if($errors->any())
                                    @foreach($errors->all() as $er)
                                    <p class="alert alert-danger">{{$er}}</p>
                                @endforeach
                              @endif

                              
                                                      <!-- Basic example -->
                                                      <div class="col-md-2"></div>
                                                      <div class="col-md-8">
                                
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Salary Provide</h3></div>
                                    <a href="{{ route('all.salary')}}" class="pull-right btn btn-primary btn-sm">All Salary</a>

                                    <div class="panel-body">

                                        <form role="form" action="{{ route('update.salary') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Employee</label>
                                                <input type="text" class="form-control" name="name" value="{{$salary->employee->name}}" required>
                                            </div>
                                            <div>
                                            <input type="hidden" value="{{$salary->employee->id}}" name="id">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Month</label>
                                                <input type="text" class="form-control" name="month" value="{{$salary->month}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Due</label>
                                                <input type="text" class="form-control" name="advanced_salary" value="{{$salary->employee->salary - $salary->advanced_salary}}" placeholder="Salary" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Year</label>
                                                <input type="text" class="form-control" name="year" value="{{$salary->year}}" placeholder="Year" required>
                                            </div>

                                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->

                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>

@endsection