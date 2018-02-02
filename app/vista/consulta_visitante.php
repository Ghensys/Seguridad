<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['id_perfil']))
{
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Seguridad</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/shop-homepage.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <img src="https://pbs.twimg.com/profile_images/825851268656726018/-a2tx--h_400x400.jpg" alt="">
        <a class="navbar-brand" href="#"><!img src="../../images/icono.jpg" alt=""> Sistema de Seguridad - Conapdis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido'];?>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../controlador/cerrar_sesion.php">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h2 class="my-4">Menú</h2>
          <div class="list-group">
            <a href="#" onclick="javascript:history.go(-1)" class="list-group-item active">Volver</a>
            <a href="registrar.php" class="list-group-item">Validar Visitante</a>
            <a href="herramienta.php" class="list-group-item">Herramientas</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

	    <div class="tab-content">

       	  <div id="busqueda" class="my-5">
            <div class="form-group">
              <form action="../controlador/consulta_visitante.php" method="post" accept-charset="utf-8">
                <table>
                  <tbody>
                    <tr>
                      <td align="right">
                        <label for="cedula">Cedula: </label>
                      </td>
                      <td>
                        <input type="number" name="cedula" placeholder="Cedula" required>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Rango de Fechas</label>
                      </td>
                    </tr>
                      <td align="right">
                        <label for="fecha_inicio">Del: </label>
                      </td>
                      <td>
                        <input type="text" id="datepicker" name="fecha_inicio" placeholder="DD/MM/AA" required>
                      </td>
                    </tr>
                    <tr>
                      <td align="right">
                        <label for="fecha_fin">Al: </label>
                      </td>
                      <td>
                        <input type="text" id="datepicker2" name="fecha_fin" placeholder="DD/MM/AA" required>
                      </td>
                    </tr>
                  </tbody>
                </table>
                
                
                <br/>
                
                <br/>
                <button type="submit" class="btn btn-primary">Consultar</button>
              </form>
            </div>
       	  </div>

        </div>
        <!-- /.col-lg-9 -->
       </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!--script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script-->

    <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>

    <script>
       $.datepicker.regional['es'] = {
       closeText: 'Cerrar',
       prevText: '< Ant',
       nextText: 'Sig >',
       currentText: 'Hoy',
       monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
       dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
       dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
       dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
       weekHeader: 'Sm',
       dateFormat: 'dd/mm/yy',
       firstDay: 1,
       isRTL: false,
       showMonthAfterYear: false,
       yearSuffix: ''
       };
       $.datepicker.setDefaults($.datepicker.regional['es']);
      $(function () {
      $("#datepicker").datepicker();
      });
      $(function () {
      $("#datepicker2").datepicker();
      });

    </script>


  </body>

</html>
<?php
}
else
{
	header("Location:../../");
}