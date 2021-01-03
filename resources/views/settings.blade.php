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
                                    <div class="panel-heading"><h3 class="panel-title">Update Company Information</h3></div>
                                    <div class="panel-body">

                                    
                                        <form role="form" action="{{ url('/update-website/'.$settings->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <img src="{{ URL::to($settings->company_logo)}}" name="old_photo" style="height: 80px; width: 80px;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="{{$settings->company_name}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="company_email" value="{{$settings->company_email}}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Phone</label>
                                                <input type="text" class="form-control" name="company_phone" value="{{$settings->company_phone}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Mobile</label>
                                                <input type="text" class="form-control" name="company_mobile" value="{{$settings->company_mobile}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Address</label>
                                                <input type="text" class="form-control" name="company_address" value="{{$settings->company_address}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" name="company_city" value="{{$settings->company_city}}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Country</label>
                                                <input type="text" class="form-control" name="company_country" value="{{$settings->company_country}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Zip Code</label>
                                                <input type="text" class="form-control" name="company_zipcode" value="{{$settings->company_zipcode}}" required>
                                            </div>

                                            <div class="form-group">
                                            <!-- <img id="image" src="#" /> -->
                                                <label for="exampleInputPassword1">New Photo</label>
                                                <input type="file" name="company_logo" accept="image/*" class="upload" onchange="readURL(this);">
                                            </div>

                                            

                                            
                                            <div class="form-group">
                                                
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
            <script type="text/javascript">
            function readURL(input){
              if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                   $('#image')
                        .attr('src', e.target.result)
                        .width(80);
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
              }
            }
            </script>
@endsection