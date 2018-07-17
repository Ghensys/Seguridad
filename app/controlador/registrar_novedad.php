<?php

require_once '../modelo/novedad.php';

$tipo_novedad = $_POST['tipo_novedad'];
$descripcion_novedad = $_POST['descripcion_novedad'];

$novedad = new Novedad();
$data = $novedad->tipoNovedad($tipo_novedad);

$fetch_tipo_novedad = pg_fetch_array($data);

if ($fetch_tipo_novedad['id_seguimiento'] == 1)
{
	$estatus = 1;
}
elseif ($fetch_tipo_novedad['id_seguimiento'] == 0)
{
	$estatus = 0;
}

$data = array(
	'tipo_novedad' => $tipo_novedad,
	'descripcion_novedad' => $descripcion_novedad,
	'estatus_novedad' => $estatus,
	 );

$novedad = new Novedad();
$registro = $novedad->registrarNovedad($data);

$mensaje = "Novedad registrada satisfactoriamente.";
$error = "Error al registrar la novedad, verifique los datos ingresados ó comuniquese con su administrador de sistemas.";

if ($registro)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../vista/novedad.php');</script>"; 
}
else
{
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../vista/novedad.php');</script>";
}