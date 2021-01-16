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
                                   
                              <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Salary
                                        <a href="{{ route('add.salary')}}" class="btn btn-sm btn-info pull-right">Add New</a>
                                        </h3>
                                        
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Salary</th>
                                                            <th>Month</th>
                                                            <th>Year</th>
                                                            <th>Paid</th>
                                                            <th>Due</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                    @foreach($salary as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td><img src="{{$row->photo}}" style="height: 60px; width: 60px;"></td>
                                                            <td>{{ $row->salary }}</td>
                                                            <td>{{ $row->month }}</td>
                                                            <td>{{ $row->year }}</td>
                                                            <td>{{ $row->advanced_salary }}</td>
                                                            <td>{{ $row->salary-$row->advanced_salary }}</td>
                                                            <td>
                                                            @if($row->salary-$row->advanced_salary == '0')
                                                            <a href="#" class="btn btn-success" disabled >Paid</a>
                                                            @else
                                                            <a href="{{ URL::to('pay-salary/'.$row->id)}}" class="btn btn-info">Pay Now</a>
                                                            @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>

@endsection