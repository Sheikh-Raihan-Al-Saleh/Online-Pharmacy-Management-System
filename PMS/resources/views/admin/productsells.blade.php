@extends('layouts.app')
@section('content')
<a class="btn btn-light" href="{{route('admin.home')}}">Home</a>
<center>
    @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span><br></br>@endif
    <h1>Sells Revenue List</h1>
</center>

<table class="table">
    <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Payment Status</th>
</tr>
@foreach($se as $se)
<tr>
{{csrf_field()}} 
    <td>{{$se->p_id}}</td>
    <td>{{$se->p_name}}</td>
    <td>{{$se->quantity}}</td>
    <td>{{$se->price}}</td>
    <td>{{$se->payment}}</td>
    <td><a class="btn btn-danger" href="/admin/productsells/{{$se->p_id}}">Delete</a></td>
   
    </tr>
@endforeach
<tr>
    <td></td><td></td>
    <td><input readonly value="Total: {{$totalquantity}}"></td>
    <td><input readonly value="Total: {{$totalsell}} tk"></td>
</tr>
</tr>
</table>
@endsection