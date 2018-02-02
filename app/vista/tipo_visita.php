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

    <title>Administración de Tipo de Visitas</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/shop-homepage.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <script language="JavaScript">
      function Desactivar()
      {
          if (confirm('¿Desea Desactivar este Tipo de Visitas?'))
          {
             document.Desactivar.submit()
          }
      }
    </script>

    <script language="JavaScript">
      function Activar()
      {
          if (confirm('¿Desea Activar este Tipo de Visitas?'))
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

          <h2 class="my-4">Visitas</h2>
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
                      <th>Tipo de Visitas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while ($row = pg_fetch_array($tipo_visitas))
                    {
                    ?>
                    <tr>
                      <td><a href="../controlador/datos_tipo_visita.php?id_tipo_visita=<?php echo $row['id'];?>">Modificar</a></td>
                      <?php
                        if ($row['estatus_dato'] == 0)
                        {
                      ?>
                          <td><a onclick="Desactivar()" href="../controlador/desactivar_tipo_visita.php?id_tipo_visita=<?php echo $row['id'];?>">Desactivar</a></td>
                      <?php
                        }
                        else
                        {
                      ?>
                          <td><a onclick="Activar()" href="../controlador/activar_tipo_visita.php?id_tipo_visita=<?php echo $row['id'];?>">Activar</a></td>
                      <?php
                        }
                      ?>

                      <td><?php echo $row['descripcion_tipo_visita'];?></td>
                      <td><td><?php echo $row['descripcion_estatus_dato'];?></td></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <a href="../vista/registrar_tipo_visita.php" class="btn btn-primary">Nuevo Tipo de Visita</a>
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
  header("Location:../../");
}