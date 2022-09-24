@extends('layouts.app')
@section('content')
<center>
    <div class="col-md-4">
        <br></br>
        <h3>Update Product</h3>
        <form action="{{route('admin.editproduct')}}" method="post">
            {{@csrf_field()}}
            <input type="hidden" name="p_id" id="p_id" value="{{$p->p_id}}" />
            <input type="text" name="p_id" value="{{$p->p_id}}" class="form-control" placeholder="Product Id">
            @error('p_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="p_name" value="{{$p->p_name}}" class="form-control" placeholder="Product Name">
            @error('p_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="description" value="{{$p->description}}" class="form-control" placeholder="product Description">
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="quantity" value="{{$p->quantity}}" class="form-control" placeholder="Quantity of a product">
            @error('quantity')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="price" value="{{$p->price}}" class="form-control" placeholder="Price of a product">
            @error('price')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br></br>
            <input type="submit" class="btn btn-success" value="Edit">
            <br></br>
            <b>Return to </b><a href="{{route('admin.productlist')}}">Product List</a>
</center>
@endsection