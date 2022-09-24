<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
body {
  background-image: url("{{asset('storage/image/Pharmacy.jpg')}}");
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
</head>
    <body>
       <br></br>
       
       <nav class="navbar navbar-inverse navbar-fixed-top">
   
      <a class="navbar-brand" href="{{route('seller.sprofile')}}"><b> Welcome {{$s->name}} ({{Session::get('logged')}})</a>
    <div class="collapse navbar-collapse">
       <a class="btn btn-success" href="{{route('seller.home')}}">Home</a>
       <a class="btn btn-success" href="{{route('seller.edit')}}">UpdateProfile</a>
       <a class="btn btn-success" href="{{route('seller.productlist')}}">ProductList</a>
       <a class="btn btn-success" href="{{route('seller.order')}}">OrderList</a>
       <a class="btn btn-success" href="{{route('all.logout')}}">Logout</a>
    </div>
  </div>
</nav>

       

   @yield('content')
   
       

    </body>
    </html>