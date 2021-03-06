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

                                        <form role="form" action="{{ route('insert.salary') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label for="exampleInputPassword1">Employee</label>
                                                @php
                                                $emp=DB::table('employees')->get();
                                                @endphp
                                                <select name="emp_id" class="form-control">
                                                <option disabled="" selected=""></option>
                                                @foreach($emp as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Month</label>
                                                <select name="month" class="form-control">
                                                <option disabled="" selected=""></option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                                
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Salary</label>
                                                <input type="text" class="form-control" name="advanced_salary" placeholder="Salary" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Year</label>
                                                <input type="text" class="form-control" name="year" placeholder="Year" required>
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