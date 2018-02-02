<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['id_perfil']))
{

$cedula = $_POST['cedula'];?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $cedula;?> - Información del Visitante</title>

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

          <h2 class="my-4">Menú</h2>
          <div class="list-group">
          	<a href="../controlador/visitante.php?cedula=<?php echo $cedula;?>" class="list-group-item active">Volver</a>
			<a href="../vista/consulta.php" class="list-group-item">Consultar Registro</a>
			<a data-toggle="tab" href="#eliminar" class="list-group-item">Herramientas</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

	    <div class="tab-content">
          <div class="my-5">

          	<h4 class="my-1" ">C.I. Del Visitante: <?php echo $cedula;?></h4>


            <?php

            $raw = pg_fetch_array($estatus);

            if ($raw) 
            {
            ?>
              <form action="informacion_visita.php" method="post" accept-charset="utf-8">

                <input type="hidden" name="cedula" value="<?php echo $cedula;?>">
                <input type="text" name="nombre" value="<?php echo $row['nombre'];?>" readonly>
                <input type="text" name="apellido" value="<?php echo $row['apellido'];?>" readonly>
                <input type="text" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento;?>" readonly>
                <input type="text" name="zona_residencia" value="<?php echo $row['zona_residencia'];?>" readonly>
                <input type="text" name="n_certificado" value="<?php echo $row['n_certificado'];?>" readonly>
                <!input type="text" name="urlImg" value="<?php echo $row['created_at'];?>" readonly>
                <!input type="text" name="urlImg" value="<?php echo $row['updated_at'];?>" readonly><br/>
                <button type="submit" class="btn btn-primary my-4">Marcar Salida</button>
            
              </form>


            <?php
            }
            else 
            {
            ?>
              <form action="informacion_visita.php" method="post" accept-charset="utf-8">

                <input type="hidden" name="cedula" value="<?php echo $cedula;?>">
                <input type="text" name="nombre" value="<?php echo $row['nombre'];?>" readonly>
                <input type="text" name="apellido" value="<?php echo $row['apellido'];?>" readonly>
                <input type="text" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento;?>" readonly>
                <input type="text" name="zona_residencia" value="<?php echo $row['zona_residencia'];?>" readonly>
                <input type="text" name="n_certificado" value="<?php echo $row['n_certificado'];?>" readonly>
                <!input type="text" name="urlImg" value="<?php echo $row['created_at'];?>" readonly>
                <!input type="text" name="urlImg" value="<?php echo $row['updated_at'];?>" readonly><br/>
                <button type="submit" class="btn btn-primary my-4">Registrar Visita</button>
            
              </form>

            <?php
            }
            ?>
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
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php
}
else
{
	header("Location:../../");
}