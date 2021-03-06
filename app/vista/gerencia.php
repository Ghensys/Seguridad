<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['id_perfil']) && $_SESSION['estatus_dato'] == 0 && $_SESSION['id_perfil'] <= 1)
{
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administración de Perfiles</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/shop-homepage.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="../../vendor/jquery/jquery.1.12.js"></script>
    <script src="../../vendor/jquery/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="../../css/datatable.min.css">

    <script language="JavaScript">
      function Desactivar()
      {
          if (confirm('¿Desea Desactivar esta Gerencia?'))
          {
             document.Desactivar.submit()
          }
      }
    </script>

    <script language="JavaScript">
      function Activar()
      {
          if (confirm('¿Desea Activar esta Gerencia?'))
          {
             document.Activar.submit()
          }
      }
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

          <h2 class="my-4">Gerencias</h2>
          <div class="list-group">
            <a href="../vista/herramienta.php" class="list-group-item active">Volver</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

          <div class="tab-content">
            <div class="my-5">
              <div class="table">
                <table id="myTable">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th>Nombre de Gerencia</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($row = pg_fetch_array($gerencias))
                    {
                    ?>
                    <tr>
                      <td><a href="../controlador/datos_gerencia.php?id_gerencia=<?php echo $row['id'];?>">Modificar</a></td>
                      <?php
                        if ($row['estatus_dato'] == 0)
                        {
                      ?>
                          <td><a onclick="Desactivar()" href="../controlador/desactivar_gerencia.php?id_gerencia=<?php echo $row['id'];?>">Desactivar</a></td>
                      <?php
                        }
                        else
                        {
                      ?>
                          <td><a onclick="Activar()" href="../controlador/activar_gerencia.php?id_gerencia=<?php echo $row['id'];?>">Activar</a></td>
                      <?php
                        }
                      ?>

                      <td><?php echo $row['descripcion_gerencia'];?></td>
                      <td><td><?php echo $row['descripcion_estatus_dato'];?></td></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <a href="../vista/registrar_gerencia.php" class="btn btn-primary">Nueva Gerencia</a>
            </div>
          </div>
        <!--/.tab-content -->

        <!-- /.col-lg-9 -->
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!--script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script-->
    <script src="../../vendor/jquery/datatable.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#myTable').DataTable();
      });
    </script>

    <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>

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