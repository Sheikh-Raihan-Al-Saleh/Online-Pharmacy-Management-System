@extends('layouts.logged')
@section('content')
<br></br>

<center>
     <h1>Admin profile</h1>
     <img src="{{asset($a->image)}}" width="200px" height="200px">
    <table class="table">
  
    <tr>
     <td><b>Name: </b><input type="text" name="name" value="{{$a->name}}" class="form-control"></td>
     <td><b>username: </b><input type="text" name="username" value="{{$a->username}}" class="form-control"></td>
</tr>
<tr>
     <td><b>Id: </b><input type="text" name="a_id" value="{{$a->a_id}}" class="form-control"></td>
     <td><b>Role: </b><input type="text" name="role" value="{{$a->role}}" class="form-control"></td>
</tr>
<tr>
     <td><b>Email: </b><input type="text" name="email" value="{{$a->email}}" class="form-control"></td>
</tr>

</table>

</center>
@endsection