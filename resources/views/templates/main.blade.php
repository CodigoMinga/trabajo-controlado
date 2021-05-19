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
            <a class="navbar-brand d-flex align-items-center" href="{{url('/')}}">
                <svg class="inline" width="90" height="77" viewBox="0 0 296 266" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M292.236 255C292.236 255 70.2363 256 34.2363 255C-1.76371 254 3.23629 218 3.23629 218V36.5C3.23629 36.5 4.2363 3 34.2363 3C64.2363 3 64.2363 36.5 64.2363 36.5H292.236V255Z" fill="#001561"/>
                    <path d="M3.23629 218C3.23629 218 -1.76371 254 34.2363 255C70.2363 256 292.236 255 292.236 255V36.5H64.2363M3.23629 218C3.23629 218 4.23629 189 34.2363 189C64.2363 189 64.2363 218 64.2363 218V36.5M3.23629 218V36.5C3.23629 36.5 4.2363 3 34.2363 3C64.2363 3 64.2363 36.5 64.2363 36.5" stroke="white" stroke-width="6"/>
                    <path d="M80 75H112V195H80V75Z" fill="white"/>
                    <path d="M80 57C80 52.5817 83.5817 49 88 49H104C108.418 49 112 52.5817 112 57V71H80V57Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M120 49H137V49.0076C143.013 49.1145 148.955 50.3505 154.515 52.6538C160.339 55.066 165.63 58.6017 170.088 63.0589C174.545 67.5161 178.081 72.8076 180.493 78.6312C182.905 84.4548 184.147 90.6966 184.147 97C184.147 103.303 182.905 109.545 180.493 115.369C178.081 121.192 174.545 126.484 170.088 130.941C165.63 135.398 160.339 138.934 154.515 141.346C148.955 143.65 143.013 144.885 137 144.992V145H136.147H120V135H130V133H120V117H125V115H120V99H130V97H120V81H125V79H120V63H130V61H120V49ZM147.808 125.154C144.374 126.577 140.711 127.358 137 127.462V66.5379C140.711 66.6419 144.374 67.4232 147.808 68.8457C151.506 70.3771 154.865 72.6218 157.695 75.4516C160.525 78.2814 162.769 81.6408 164.301 85.3381C165.832 89.0354 166.621 92.9981 166.621 97C166.621 101.002 165.832 104.965 164.301 108.662C162.769 112.359 160.525 115.719 157.695 118.548C154.865 121.378 151.506 123.623 147.808 125.154Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M191.727 124.885L213.466 117.575L220.778 129.355C224.946 129.156 229.077 129.45 233.096 130.202L241.947 119.524L262.489 129.727L259.328 143.232C262.165 145.808 264.742 148.706 266.997 151.893L250.668 163.239C242.287 151.524 226.949 146.111 212.587 150.941C194.977 156.862 185.502 175.938 191.423 193.547C197.344 211.157 216.419 220.632 234.029 214.711C239.382 212.911 243.983 209.896 247.629 206.076L262.065 219.747C259.526 222.417 256.695 224.84 253.598 226.963L254.889 240.768L233.149 248.078L225.838 236.297C221.67 236.497 217.539 236.202 213.519 235.451L204.669 246.128L184.127 235.925L187.288 222.421C184.261 219.672 181.53 216.558 179.171 213.116L165.366 214.408L158.056 192.668L169.837 185.356C169.637 181.188 169.932 177.057 170.684 173.038L160.006 164.187L170.209 143.645L183.714 146.806C186.462 143.779 189.576 141.048 193.018 138.689L191.727 124.885Z" fill="white"/>
                    <g filter="url(#filter0_d)">
                    <path d="M99.3322 228.046C98.2787 230.428 94.8983 230.428 93.8448 228.046L81 199L112.177 199L99.3322 228.046Z" fill="white"/>
                    </g>
                    <defs>
                    <filter id="filter0_d" x="77" y="199" width="39.1769" height="38.8324" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                    </defs>
                </svg>
                <b class="d-none d-md-block" style="font-size: 1.8rem;line-height:0.9">
                    Proyecto<br>
                    Controlado
                </b>
            </a>
                    
                

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/clients')}}"><span class="material-icons">people</span>Clientes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-icons">settings</span>Configurar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
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