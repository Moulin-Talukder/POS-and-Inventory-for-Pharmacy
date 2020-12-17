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
                                    <div class="panel-heading"><h3 class="panel-title">Update Supplier Information </h3></div>
                                    <div class="panel-body">

                                    
                                        <form role="form" action="{{ url('/update-supplier/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <img src="{{ URL::to($edit->photo)}}" name="old_photo" style="height: 80px; width: 80px;">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Supplier Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{$edit->name}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{$edit->email}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$edit->phone}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Address" value="{{$edit->address}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shop Name</label>
                                                <input type="text" class="form-control" name="shop" placeholder="Shop Name" value="{{$edit->shop}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Holder</label>
                                                <input type="text" class="form-control" name="accountholder" placeholder="Account Holder" value="{{$edit->accountholder}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Number</label>
                                                <input type="text" class="form-control" name="accountnumber" placeholder="Account Number" value="{{$edit->accountnumber}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bank Name</label>
                                                <input type="text" class="form-control" name="bankname" placeholder="Bank Name" value="{{$edit->bankname}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Branch Name</label>
                                                <input type="text" class="form-control" name="branchname" placeholder="Branch Name" value="{{$edit->branchname}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City" value="{{$edit->city}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Supplier Type</label>
                                                <select name="type" class="form-control">
                                                <option value="{{$edit->type}}">{{$edit->type}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                            <!-- <img id="image" src="#" /> -->
                                                <label for="exampleInputPassword1">New Photo</label>
                                                <input type="file" name="photo" accept="image/*" class="upload" onchange="readURL(this);">
                                            </div>

                                            
                                            <div class="form-group">
                                                
                                            </div>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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