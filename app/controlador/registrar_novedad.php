<?php

require_once '../modelo/novedad.php';

$tipo_novedad = $_POST['tipo_novedad'];
$descripcion_novedad = $_POST['descripcion_novedad'];

$novedad = new Novedad();
$registro = $novedad->registrarNovedad($tipo_novedad,$descripcion_novedad);

$mensaje = "Novedad registrada satisfactoriamente.";
$error = "Error al registrar la novedad, comuniquese con su administrador de sistemas.";

if ($registro)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../vista/index.php');</script>"; 
}
else
{
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../vista/index.php');</script>";
}