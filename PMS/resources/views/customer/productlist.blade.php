@extends('layouts.app')
@section('content')
<a class="btn btn-light" href="{{route('customer.home')}}">Home</a>
<a class="btn btn-light" href="{{route('customer.cart')}}">Cart</a>

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
</tr>

@foreach($p as $p)
<form action="{{route('addtocart')}}" method="post">
<tr>
{{csrf_field()}} 
    <td><input readonly name="p_id"value="{{$p->p_id}}"></td>
    <td><input readonly name="p_name"value="{{$p->p_name}}"></td>
    <td>{{$p->description}}</td>
    <td><input readonly name="quantity"value="{{$p->quantity}}"></td>
    <td><input readonly name="price"value="{{$p->price}}"></td>
    <!-- <td><a class="btn btn-success" href="/customer/cart">Add_to_cart</a></td> -->
    <td><input class= "btn btn-success" type="Submit"  name="Submit" value="Addtocart"></td>
    </tr>
</form>
@endforeach

</table>



@endsection