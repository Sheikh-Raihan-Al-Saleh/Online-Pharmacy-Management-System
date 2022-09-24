@extends('layouts.logged')
@section('content')
<br></br>

<center>
<div>
        <br></br>
     <h3>Profile Update</h3>
     <form action="{{route('admin.edit')}}" method="post"enctype="multipart/form-data">
     {{@csrf_field()}}
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

<input class= "btn1" type="Submit"  name="update" value="Update">
</form>
</div>
</center>
@endsection