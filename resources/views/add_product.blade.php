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
                                    <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                                    <div class="panel-body">

                                    
                                        <form role="form" action="{{ route('insert.product') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <input type="text" class="form-control" name="product_code" placeholder="Product Code" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                @php
                                                $cat=DB::table('categories')->get();
                                                @endphp
                                                <select name="cat_id" class="form-control">
                                                <option disabled="" selected=""></option>
                                                @foreach($cat as $row)
                                                <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Supplier</label>
                                                @php
                                                $sup=DB::table('suppliers')->get();
                                                @endphp
                                                <select name="sup_id" class="form-control">
                                                <option disabled="" selected=""></option>
                                                @foreach($sup as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Godawn</label>
                                                <input type="text" class="form-control" name="product_garage" placeholder="Godawn Number" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                <input type="text" class="form-control" name="product_route" placeholder="Product Route" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Date</label>
                                                <input type="date" class="form-control" name="buy_date" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" placeholder="Buy Price"required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" placeholder="Sell Price"required>
                                            </div>

                                            <div class="form-group">
                                            <img id="image" src="#" />
                                                <label for="exampleInputPassword1">Photo</label>
                                                <input type="file" name="product_image" accept="image/*" class="upload" required onchange="readURL(this);">
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