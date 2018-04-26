<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['id_perfil']) && $_SESSION['estatus_dato'] == 0 && $_SESSION['id_perfil'] <= 1)
{
  require_once '../modelo/select.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Perfil</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/shop-homepage.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="../../vendor/jquery/jquery.1.12.js"></script>
    <script src="../../vendor/jquery/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="../../css/datatable.min.css">
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
      $("#fecha").datepicker();
      });
    </script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Sistema de Seguridad - Conapdis</a>
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

          <h2 class="my-4">Registrar Perfil</h2>
          <div class="list-group">
          	<a href="#" onclick="javascript:history.go(-1)" class="list-group-item active">Volver</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

    	    <div class="tab-content">

            <div class="my-5">

              <h4 class="my-1" ">Registrar perfil</h4>

          		<form action="../controlador/registrar_usuario.php" method="post" accept-charset="utf-8">
                <table>
                  <tbody>
                    <tr>
                      <td>
                        <label>Nombre</label>
                      </td>
                      <td>
                        <input type="text" name="nombre" placeholder="Nombre" required>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Apellido</label>
                      </td>
                      <td>
                        <input type="text" name="apellido" placeholder="Apellido" required>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Correo Electrónico</label>
                      </td>
                      <td>
                        <input type="email" name="email" placeholder="Correo Electrónico" required>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Contraseña</label>
                      </td>
                      <td>
                        <input type="password" name="password" placeholder="Contraseña" required>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Tipo de Perfil</label>
                      </td>
                      <td>
                        <?php 
                        $obj_perfil = new Select();
                        $obj_perfil->TipoPerfil();?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        
                      </td>
                      <td>
                        
                      </td>
                    </tr>
                  </tbody>
                </table>

                
          			
                <label></label><button type="submit" class="btn btn-primary my-4">Registrar Perfil</button>

          		</form>

          	</div>
            <!-- /.my-5 -->

          </div>
          <!--/.tab-content -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!--script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script-->

  </body>

</html>
<?php
}
else
{
  $mensaje = "Por favor, inicie sesión para ingresar al sistema";

  echo "<script>alert('$mensaje')</script>";
  echo "<script>window.location.replace('../../');</script>";
}