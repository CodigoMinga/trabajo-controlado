
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Trabajocontrolado.cl</title>
  </head>
  <body>
    <div class="scaffold">
        <div class="barra" align="center">
            <div style="width:5rem" align="right">
                @yield('backbutton')
            </div>
            <div style="flex-grow:1">
                <img src="{{ url('/') }}/img/logo1.png">
            </div>
            <div style="width:5rem" align="left">
                @yield('menubutton')
            </div>
        </div>
        <div class="container scaffold-body">
            @yield('content')
        </div>

    </div>
    @if ($message = Session::get('noti-error'))
    <script>
        var notificacion = document.getElementById('notificacion');
        notificacion.innerText='{!! $message !!}';
        notificacion.style.backgroundColor='#ef5350';
        setTimeout(() => {  notificacion.style.bottom="0px"; }, 250);
        setTimeout(() => {  notificacion.style.bottom="-150px"; }, 4000);
    </script>
    @endif
    
    @if ($message = Session::get('noti-check'))
    <script>
        var notificacion = document.getElementById('notificacion');
        notificacion.innerText='{!! $message !!}';
        notificacion.style.backgroundColor='#388e3c';
        setTimeout(() => {  notificacion.style.bottom="0px"; }, 250);
        setTimeout(() => {  notificacion.style.bottom="-150px"; }, 4000);
    </script>
    @endif




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
