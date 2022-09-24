@extends('layouts.app')
@section('content')
 <center>
 @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span><br></br>@endif
 <form action="{{route('login')}}"method="post">
 {{@csrf_field()}}  
 
 <div class="col-md-3"> 
 <br></br>
 <h3>Login</h3>   
 <input type="text" name="id" value="{{old('id')}}" class="form-control" placeholder="Userid">
 @error('id')
    <span class="text-danger">{{$message}}</span>
 @enderror
 <table class="form-control">
    <tr>
        <td>
            <text>User Role:   </text>
        </td>
        <td> </td>
        <td>
            <input type="radio" id="admin" name="role" value="admin">
               <label for="admin">Admin</label><br>
        </td>
        <td>
            <input type="radio" id="customer" name="role" value="customer">
               <label for="customer">Customer</label><br>
        </td>
         <td>
           <input type="radio" id="seller" name="role" value="seller">
               <label for="seller">Seller</label><br>
        </td>
    </tr>
</table>
@error('role')
    <span class="text-danger">{{$message}}</span>
 @enderror
 <input type="password" name="password" class="form-control" placeholder="password">
 @error('password')
    <span class="text-danger">{{$message}}</span>
 @enderror
 <br></br>
 <input type="submit" class="btn btn-primary" value="login">
 <br></br>
 <b>Create an account? Click </b> <a class="btn btn-success" href="{{route('registration')}}" >Registration</a><br></br>
 <b>Return to </b><a class="btn btn-info" href="{{route('home')}}">Homepage</a>
</div>
 </form>
</center>
@endsection