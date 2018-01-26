<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['id_perfil']))
{
  //include 'pdf/pdf.php';
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

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    

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
              <a class="nav-link" href="#">Salir</a>
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
            <a href="registrar.php" class="list-group-item">Registrar</a>
            <a href="#" class="list-group-item">Herramientas</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

	    <div class="tab-content">

       	  <div id="busqueda" class="my-5">
            <div class="table">
              
              <table id="myTable">
                <thead>
                  <tr>
                    <th>Gerencia</th>
                    <th>Responsable</th>
                    <th>Tipo de Visita</th>
                    <th>N° Pase</th>
                    <th>Observación</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  while ($row = pg_fetch_array($resultado_consulta))
                  {
                  ?>
                  <tr>
                    <td><?php echo $row['descripcion_gerencia']; ?></td>
                    <td><?php echo $row['responsable']; ?></td>
                    <td><?php echo $row['descripcion_tipo_visita']; ?></td>
                    <td><?php echo $row['n_pase']; ?></td>
                    <td><?php echo $row['observacion']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['updated_at']; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <form action="../vista/pdf/exportar_tvisitante.php" method="post" accept-charset="utf-8" target="_blank">
                <input type="hidden" name="cedula" value="<?php echo $cedula;?>">
                <input type="hidden" name="fecha_inicio" value="<?php echo $fecha_inicio;?>">
                <input type="hidden" name="fecha_fin" value="<?php echo $fecha_fin;?>">
                <button type="submit" class="btn btn-primary">Exportar a PDF</button>
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

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

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