
<!doctype html>
<html lang="en">
  <head>
  

    <title>Flight Attendant </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="/css/album.css" rel="stylesheet">

   <style> body {background-color: #D9D8D8;} </style>
 </head>

  <body>

    <header>
  
    
    </header>

    @include('layouts.navbar')

    <div class="container">

    @yield('content')

    </div>


   @include('layouts.footer')

    
  </body>
</html>
