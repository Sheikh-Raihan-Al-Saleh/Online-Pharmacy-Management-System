@extends('layouts.app')
@section('content')
<a class="btn btn-light" href="{{route('admin.home')}}">Home</a>
<h1>Seller List</h1>
<table class="table">
    <tr>
        <th>Seller Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Role</th>
        <th>Action</th>


</tr>
@foreach($s as $s)
<tr>
{{csrf_field()}} 
    <td>{{$s->s_id}}</a></td>
    <td>{{$s->name}}</td>
    <td>{{$s->username}}</td>
    <td>{{$s->email}}</td>
    <td>{{$s->address}}</td>
    <td>{{$s->role}}</td>
    <td><a class="btn btn-success" href="/admin/editseller/{{$s->s_id}}">Edit</a></td>
    <td><a class="btn btn-danger" href="/admin/sellerlist/{{$s->s_id}}">Delete</a></td>
   
    </tr>
@endforeach
</table>

@endsection