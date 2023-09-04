<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        body{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
    </style>
</head>
<body>
    <header>
        <nav class=" p-2 mb-2 bg-dark "  >
            <div class="container-md d-flex ">
                <img src="{{asset('/images/Capture.PNG')}}" alt="img" style="width: 60px" >
            <div class="container">
                <a class=" text-white bold text-decoration-none fs-3 " href="#">Ecole 229</a>
            </div>
            </div>
         
        </nav>
      
    </header>

    <div class="container">
        @yield('content')
       
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    
</body>
</html>