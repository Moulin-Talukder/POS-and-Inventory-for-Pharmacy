@extends('layouts.app')

@section('content')

<h1>Add new product</h1>
    <form action="{{route('product.create')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="product_name">Enter Product Name</label>
            <input name="product_name" required placeholder="Enter product name" type="text" class="form-control" id="product_name" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" required placeholder="Enter Price" type="number" class="form-control" id="price">
        </div>
        <div class="form-group">
            <label for="price">Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection

