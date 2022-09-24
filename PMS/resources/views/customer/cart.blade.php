@extends('layouts.app')
@section('content')
<a class="btn btn-light" href="{{route('customer.productlist')}}">Product List</a>

<center>
    @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span><br></br>@endif
</center>
<h1>Cart</h1>
<table class="table">
    <tr>
        <th>Customer Id</th>
        <th>Product Id</th>
        <th>product Name</th>
        <th>Product Quantity</th>
        <th>Price</th>
        <th>Cancel Order</th> 
        <th>Conform Order</th>
        



</tr>
@foreach($p as $p)

<form action="{{Route('customer.payment')}}" method="post">
<tr>
{{csrf_field()}} 
    <td><input readonly name="c_id"value="{{$p->c_id}}"></td>
    <td><input readonly name="p_id"value="{{$p->p_id}}"></td>
    <td><input readonly name="p_name"value="{{$p->p_name}}"></td>
    <td><input readonly name="quantity"value="{{$p->quantity}}"></td>
    <td><input readonly name="price"value="{{$p->price*$p->quantity}}"></td>
    <td><a class="btn btn-danger" href="/customer/cart/{{$p->p_id}}">cancel</a></td>
    <td><input class= "btn btn-success" type="Submit"  name="Submit" value="Conform Order"></td>
    
@endforeach
    <tr>
        <td></td><td></td><td></td><td></td>
        <td><input readonly name="totalprice" value="Total price: {{$totalprice}} tk"></td>
</tr>

</tr>
</form>
</table>
@endsection