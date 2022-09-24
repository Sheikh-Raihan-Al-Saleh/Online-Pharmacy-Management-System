@extends('layouts.app')
@section('content')
<a class="btn btn-light" href="{{route('customer.cart')}}">Back</a>
<center>
    <div class="col-md-4">
        <br></br>
        <h3>Payment</h3>
            <form action="{{route('order')}}" method="post">
            {{@csrf_field()}}
            <input type="hidden" name="c_id" id="c_id" value="{{$p->c_id}}" />
            <b>Customer Id</b>
            <input readonly name="c_id"value="{{$p->c_id}}"class="form-control">
            <b>Product Id</b>
            <input readonly name="p_id" value="{{$p->p_id}}" class="form-control">
            <b>Product Name</b>
            <input readonly name="p_name" value="{{$p->p_name}}" class="form-control">
            <b>Quantity</b>
            <input readonly name="quantity" value="{{$p->quantity}}" class="form-control">
            <b>Total price</b>
            <input readonly name="price" value="{{$p->price*$p->quantity}}" class="form-control">
            <b>Payment Method</b>
            <select  name="payment" class="form-control">
                <option value="Paid by Cash">Paid by Cash</option>
                <option value="Paid by Bkash">paid by Bkash</option>
           </select>
            <br></br>
            <input type="submit" class="btn btn-success" value="Place Order">
            
</center>
@endsection