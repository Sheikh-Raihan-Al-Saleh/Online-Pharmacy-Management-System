@extends('layouts.clogged')
@section('content')
<br></br>

<center>
<div>
        <br></br>
     <h1>Profile Update</h1>
     <form action="{{route('customer.edit')}}" method="post"enctype="multipart/form-data">
     {{@csrf_field()}}
     <img src="{{asset($c->image)}}" width="200px" height="200px">
    <table class="table">
    <tr>
     <td><b>Name: </b><input type="text" name="name" value="{{$c->name}}" class="form-control"></td>
     <td><b>username: </b><input type="text" name="username" value="{{$c->username}}" class="form-control"></td>
</tr>
<tr>
     <td><b>Id: </b><input type="text" name="c_id" value="{{$c->c_id}}" class="form-control"></td>
     <td><b>Role: </b><input type="text" name="role" value="{{$c->role}}" class="form-control"></td>
</tr>
<tr>
<td><b>Present Address: </b><input type="text" name="address" value="{{$c->address}}" class="form-control"></td>
     <td><b>Email: </b><input type="text" name="email" value="{{$c->email}}" class="form-control"></td>
</tr>

</table>

<input class= "btn1" type="Submit"  name="update" value="Update">
</form>
</div>
</center>
@endsection