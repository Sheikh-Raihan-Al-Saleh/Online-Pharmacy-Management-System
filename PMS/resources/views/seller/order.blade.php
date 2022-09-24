@extends('layouts.app')
@section('content')
<center>
    @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span><br></br>@endif
</center>
<a class="btn btn-light" href="{{route('seller.home')}}">Back</a>

<h1>OrderList</h1>
<table class="table">
    <tr>
        <th>Customer Id</th>
        <th>Product Id</th>
        <th>product Name</th>
        <th>Product Quantity</th>
        <th>Price</th>
        <th>Payment status</th>
        <th>Status</th>
        
        
</tr>
@foreach($o as $o)

<form action="{{route('sells')}}" method="post">
<tr>
{{csrf_field()}} 
    <td><input readonly name="c_id"value="{{$o->c_id}}"></td>
    <td><input readonly name="p_id"value="{{$o->p_id}}"></td>
    <td><input readonly name="p_name"value="{{$o->p_name}}"></td>
    <td><input readonly name="quantity"value="{{$o->quantity}}"></td>
    <td><input readonly name="price"value="{{$o->price}}"></td>
    <td><input readonly name="payment"value="{{$o->payment}}"></td>
    <td><input class= "btn btn-Info" type="Submit"  name="Submit" value="Accept for delivery"></td>

    
@endforeach
    

</tr>
</form>
</table>
@endsection