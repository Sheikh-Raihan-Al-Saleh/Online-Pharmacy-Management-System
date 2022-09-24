@extends('layouts.app')
@section('content')
<a class="btn btn-light" href="{{route('seller.home')}}">Home</a>

<h1>Product List</h1>
<center>
    
    <input type="text" name="search" placeholder="Search Product" required/>
    <button class="btn btn-info" type="submit">Search</button>

</center>
<table class="table">
    <tr>
        <th>Product Id</th>
        <th>product Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Action</th>


</tr>
@foreach($p as $p)
<tr>
{{csrf_field()}} 
    <td>{{$p->p_id}}</a></td>
    <td>{{$p->p_name}}</td>
    <td>{{$p->description}}</td>
    <td>{{$p->quantity}}</td>
    <td>{{$p->price}}</td>
    <td><a class="btn btn-success" href="/seller/editproduct/{{$p->p_id}}">Edit</a></td>
    </tr>
@endforeach

</table>



@endsection