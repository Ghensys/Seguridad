<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['id_perfil']) && $_SESSION['estatus_dato'] == 0)
{
  
  $cedula = $_POST['cedula'];

  require_once '../modelo/conexion.php';


  function Gerencia()
  {
    $con = new Conexion();
    $con->Conectar();

    $sql = "SELECT id, descripcion_gerencia FROM gerencias WHERE estatus_dato = 0;";

    $query = pg_query($sql);

    echo "<select name='gerencia' class='form-control' required>";
    echo "<option value='' disabled selected>Seleccionar</option>";
    while ($gerencia = pg_fetch_row($query))
    {
      echo "<option value='".$gerencia[0]."'>".$gerencia[1]."</option>";
    }
    echo "</select><br/>";
  }

  function TipoVisita()
  {
    $con = new Conexion();
    $con->Conectar();

    $sql = "SELECT id, descripcion_tipo_visita FROM tipo_visitas WHERE estatus_dato = 0;";

    $query = pg_query($sql);

    echo "<select name='tipo_visita' class='form-control' required>";
    echo "<option value='' disabled selected>Seleccionar</option>";
    while ($tipo_visita = pg_fetch_row($query))
    {
      echo "<option value='".$tipo_visita[0]."'>".$tipo_visita[1]."</option>";
    }
    echo "</select><br/>";
  }



  //include '../controlador/datos_lista.php';

  /*
  $explode = explode("-", $row['fecha_nacimiento']);
  $fecha_nacimiento = $explode[2]."/".$explode[1]."/".$explode[0];
  */
?>
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
          	<a href="../controlador/visitante.php?cedula=<?php echo $cedula;?>&token=1" class="list-group-item active">Volver</a>
            <a href="../vista/novedad.php" class="list-group-item">Novedades</a>
      			<?php
            if ($_SESSION['id_perfil'] <= 1) 
            {
            ?>
              <a href="../vista/consulta.php" class="list-group-item">Consultar Registro</a>
              <a href="../vista/herramienta.php" class="list-group-item">Herramientas</a>
            <?php
            }
            elseif ($_SESSION['id_perfil'] == 2)
            {
            ?>
              <a href="../vista/consulta.php" class="list-group-item">Consultar Registro</a>
            <?php
            }
            ?>
          </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

	    <div class="tab-content">

          <div class="my-5">

          	<h4 class="my-1" ">Registrar Visita: <?php echo "C.I: ".$cedula;?></h4>

            <div class="form-group">
              <form action="../controlador/registrar_visita.php" method="post" accept-charset="utf-8">

                <input type="hidden" name="cedula" value="<?php echo $cedula;?>">
                <label for="gerencia">Gerencia a la que se Dirige:</label> 
                <?php
                  Gerencia();
                ?>
                <label for="tipo_visita">Tipo de Visita</label>
                <?php
                  TipoVisita();
                ?>
                <label for="responsable">Responsable:</label> 
                <input type="text" class="form-control" name="responsable" placeholder="Ingrese el nombre del responsable de la visita" required><br/>
                <input type="hidden" name="usuario" value="<?php echo $_SESSION['id'];?>">
                <label for="observacion">Observación</label>
                <textarea class="form-control" rows="5" name="observacion"></textarea><br/>
                <label for="n_pase">Número de Pase</label>
                <input  class="form-control" type="text" name="n_pase" placeholder="Ejemplo. 01,02,03...10,11,12." maxlength="3" pattern="[0-9]{2}"><br/>
                
                <button type="submit" class="btn btn-primary my-4">Registrar Entrada</button>
            
              </form>

              
            </div>

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
  $mensaje = "Por favor, inicie sesión para ingresar al sistema";

  echo "<script>alert('$mensaje')</script>";
  echo "<script>window.location.replace('../../');</script>";
}