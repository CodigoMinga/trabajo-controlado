<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Boostrap Style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!--Iconos de Google Style-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
    <style>
        .material-icons{
            vertical-align: middle;
        }
        .navbar{
            background-color: #b71c1c;
            font-size: 1.5rem;
        }
        
        .navbar .material-icons{
            font-size: 1.8rem;
            margin-right:5px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar sticky-top navbar-dark navbar-expand-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ProjeCon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/clients/list')}}"><span class="material-icons">people</span>Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/proyects/list')}}"><span class="material-icons">description</span>Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/items/list')}}"><span class="material-icons">category</span>Items</a>
                </li>
                    <a class="nav-link" href="{{url('/users/list')}}"><span class="material-icons">account</span>Usuarios</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-icons">settings</span>Configurar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url('/logout')}}">Logout</a></li>
                    </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
<!--Boostrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>
