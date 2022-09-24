@extends('layouts.app')
@section('content')
<center>
    <div class="col-md-4">
        <br></br>
        <h3>Update Product</h3>
        <form action="{{route('admin.editseller')}}" method="post">
            {{@csrf_field()}}
            <input type="hidden" name="s_id" id="s_id" value="{{$s->s_id}}" />
            <input type="text" name="s_id" value="{{$s->s_id}}" class="form-control" placeholder="Seller Id">
            @error('s_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="name" value="{{$s->name}}" class="form-control" placeholder="Name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="username" value="{{$s->username}}" class="form-control" placeholder="Username">
            @error('username')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="email" value="{{$s->email}}" class="form-control" placeholder="Email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="address" value="{{$s->address}}" class="form-control" placeholder="Address">
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="role" value="{{$s->role}}" class="form-control" placeholder="Role">
            @error('role')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br></br>
            <input type="submit" class="btn btn-success" value="Edit">
            <br></br>
            <b>Return to </b><a href="{{route('admin.sellerlist')}}">Seller List</a>
</center>
@endsection