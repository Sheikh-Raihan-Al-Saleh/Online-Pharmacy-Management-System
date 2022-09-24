@extends('layouts.slogged')
@section('content')
<br></br>
<center>
    <h1>Seller Profile</h1>
<img src="{{asset($s->image)}}" width="200px" height="200px">
    <table class="table">
    <tr>
     <td><b>Name: </b><input type="text" name="name" value="{{$s->name}}" class="form-control"></td>
     <td><b>UserName: </b><input type="text" name="username" value="{{$s->username}}" class="form-control"></td>
</tr>

<tr>
     <td><b>Id: </b><input type="text" name="s_id" value="{{$s->s_id}}" class="form-control"></td>
     <td><b>Role: </b><input type="text" name="role" value="{{$s->role}}" class="form-control"></td>
</tr>
<tr>
<td><b>Present Address: </b><input type="text" name="address" value="{{$s->address}}" class="form-control"></td>
     <td><b>Email: </b><input type="text" name="email" value="{{$s->email}}" class="form-control"></td>
</tr>
</table>
</center>

@endsection