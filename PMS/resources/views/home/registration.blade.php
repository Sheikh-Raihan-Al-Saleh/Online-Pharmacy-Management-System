@extends('layouts.app')
@section('content')
<center>
    <div class="col-md-4">
        <br></br>
        <h3>Registration</h3>
        <form action="{{route('registration')}}" method="post"enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="UserName">
            @error('username')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="id" value="{{old('id')}}" class="form-control" placeholder="User id">
            @error('c_id')
            <span class="text-danger">{{$message}}</span>
            @enderror

<table class="form-control">
    <tr>
        <td>
            <text>User Role:   </text>
        </td>
        <td> </td>
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
           <input type="text" name="address" value="{{old('address')}}"class="form-control" placeholder="Present Address">
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="email" value="{{old('email')}}"class="form-control" placeholder="Email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="password" name="password" class="form-control" placeholder="Password">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="password" name="conf_password" class="form-control" placeholder="Confirm Password">
            @error('conf_password')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="file" name="pro_image" class="form-control">
            @error('pro_image')
            <span class="text-danger">{{$message}}</span>
            @enderror</tr>

</table>
            <br></br>
            <input type="submit" class="btn btn-secondary" value="register">
            <br></br>
            <b>Already have an account? Click </b><a class="btn btn-info" href="{{route('login')}}">Login</a><br></br>
            <b>Return to </b><a class="btn btn-light" href="{{route('home')}}">Homepage</a>
            
       </form>
</div>
</center>
@endsection