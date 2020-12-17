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
                                
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Update Category</h3></div>
                                    

                                    <div class="panel-body">

                                        <form role="form" action="{{ url('/update-category/'.$edit->id) }}" method="post">
                                        @csrf

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category Name</label>
                                                <input type="text" class="form-control" name="cat_name" value="{{$edit->cat_name}}" placeholder="Category Name" required>
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