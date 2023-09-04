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
    .table-secondary{
            background-color: #a5a2a2;
        }

        .div_details{
            background-color: #a5a2a2;
        }
    </style>
</head>
<body>
    <header>
        <nav class=" p-3 mb-2 bg-dark text-emphasis-primary"  >
            <div class="container-md d-flex ">
                <img src="{{asset('/images/Capture.PNG')}}" alt="img" style="width: 60px" >
            <div class="container">
                <a class=" text-white bold text-decoration-none fs-3 " href="#">Ecole 229</a>
                <a class="btn btn-danger p-2 float-end btn-sm fs-6 mt-3 float-end " href="{{route('logout')}}">Déconnexion</a>
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