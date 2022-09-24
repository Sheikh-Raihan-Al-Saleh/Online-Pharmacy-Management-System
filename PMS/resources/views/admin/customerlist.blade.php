@extends('layouts.app')
@section('content')
<a class="btn btn-light" href="{{route('admin.home')}}">Home</a>
<h1>Customer List</h1>
<table class="table">
    <tr>
        <th>Customer Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Role</th>
        <th>Action</th>


</tr>
@foreach($c as $c)
<tr>
{{csrf_field()}} 
    <td>{{$c->c_id}}</a></td>
    <td>{{$c->name}}</td>
    <td>{{$c->username}}</td>
    <td>{{$c->email}}</td>
    <td>{{$c->address}}</td>
    <td>{{$c->role}}</td>
    <td><a class="btn btn-danger" href="/admin/customerlist/{{$c->c_id}}">Delete</a></td>
   
    </tr>
@endforeach
</table>

@endsection