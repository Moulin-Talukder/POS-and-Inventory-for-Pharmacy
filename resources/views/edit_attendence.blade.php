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
                                   
                              <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Update Attendence <a href="{{ route('all.attendence')}}" class="btn btn-sm btn-info pull-right">All Attendences</a></h3>
                                    </div>
                                    <h3 class="text-success" align="center">Update Attendence</h3>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Attendence</th>
 
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                    <form action="{{ url('/insert-attendence')}}" method="post">
                                                    @csrf
                                                    @foreach($data as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td><img src="{{ URL::to($row->photo)}}" style="height: 60px; width: 60px;"></td>
                                                            <input type="hidden" name="user_id[]" value="{{$row->id}}">
                                                            <td>
                                                            <input type="radio" name="attendence[{{$row->id}}]" value="Present" required <?php if($row->attendence == 'Present'){
                                                                echo "checked";
                                                            } ?>> Present
                                                            <input type="radio" name="attendence[{{$row->id}}]" value="Absent" <?php if($row->attendence == 'Absent'){
                                                                echo "checked";
                                                            } ?>> Absent
                                                            </td>
                                                            <input type="hidden" name="att_date" value="{{ date("d/m/y")}}">
                                                            <input type="hidden" name="att_year" value="{{ date("Y")}}">
                                                        </tr>
                                                    @endforeach
                                                    
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-success">Update Attendence</button>
                                                  </form>
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