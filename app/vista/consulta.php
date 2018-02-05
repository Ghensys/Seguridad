<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['id_perfil']) && $_SESSION['estatus_dato'] == 0)
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

          <h2 class="my-4">Menú Principal</h2>
          <div class="list-group">
            <a href="registrar.php" class="list-group-item">Registrar Visitante</a>
            <a href="consulta.php" class="list-group-item active">Consultar Registro</a>
            <a href="herramienta.php" class="list-group-item">Herramientas</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

	    <div class="tab-content">

       	  <div id="busqueda" class="my-5">
            <div class="form-group">

              <br/>
              <br/>
              <table>
                <tbody>
                  <tr>
                    <td><a href="consulta_visitante.php" title="Consultar Visitante" class="btn btn-outline-info">Consultar Visitante</a></td>
                    <td><a href="consulta_general.php" title="Consulta General" class="btn btn-outline-info">Consulta General</a></td>
                  </tr>
                </tbody>
              </table>
              
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
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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