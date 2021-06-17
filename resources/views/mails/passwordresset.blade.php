<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Simple Transactional Email</title>
  </head>
  <body>
    <span class="preheader"></span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
            <td>&nbsp;</td>
            <td class="container">
                <div class="content">
    
                    <!-- START CENTERED WHITE CONTAINER -->
                    <table role="presentation" class="main">
    
                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
    
                                            <img src="{{url("/")}}/img/logo1.png" style="max-width: 100%">
    
                                            <br/>
                                            <hr/>
    
                                            <p>Para resetear su clave pinche en el siguiente link</p>
                                            <p><div class="btn btn-primary"><a href="{{url('/resetpassword/'.$user->id.'/token/'.$token)}}">Reiniciar Clave</a></div></p>
    
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
    
                        <!-- END MAIN CONTENT AREA -->
                    </table>
                    <!-- END CENTERED WHITE CONTAINER -->
                    <!-- START FOOTER -->
                    <div class="footer">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-block">
                                    <span class="apple-link">Correo Generado desde nuestro Sistema</span>
                                    <br><a href="http://www.codigominga.cl">www.codigominga.cl</a>.
                                </td>
                            </tr>
                            <tr>
                                <td class="content-block powered-by">
                                    Contacto: <a href="mailto:contacto@codigominga.cl">contacto@codigominga.cl</a>.
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- END FOOTER -->
    
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>